<?php

namespace ProdList\Classes\Products;

use ProdList\Classes\Products\DVD;
use ProdList\Classes\Products\Furniture;
use ProdList\Classes\Products\Book;

class ServerProductList
{
    protected $list = array();
    protected $skuList = array();
    protected $db_s;
    protected $db_h;
    protected $db_p;
    protected $db_n;

    function __construct($db_s, $db_h, $db_p, $db_n)
    {
        $this->db_s = $db_s;
        $this->db_h = $db_h;
        $this->db_p = $db_p;
        $this->db_n = $db_n;
    }

    public function downloadList(): void
    {
        $connection = mysqli_connect($this->db_s, $this->db_h, $this->db_p, $this->db_n);
        if (mysqli_connect_errno()) {
            echo "Failed to connect: " . mysqli_connect_error();
        }
        $query = "SELECT SKU, Name, Price, Type, Size, Height, Width, Length, Weight FROM productlist;";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            echo 'no result!';
            exit();
        };
        if (@mysqli_num_rows($result) == 0) {
            //echo 'Empty database!';
        }
        while ($resultRow = @mysqli_fetch_assoc($result)) {

            $dimensions = [$resultRow['Height'], $resultRow['Width'], $resultRow['Length']];
            $spec = ["DVD" => $resultRow['Size'], "Furniture" => $dimensions, "Book" => $resultRow['Weight']];

            $productType = "\ProdList\Classes\Products\\" . $resultRow['Type'];

            $product = new $productType($resultRow['SKU'], $resultRow['Name'], $resultRow['Price'], $resultRow['Type']);
            $product->setProductSpecific($spec);
            $this->list[] = $product;

            $this->skuList[] = $resultRow['SKU'];
        }

        $connection->close();
    }

    /**
     * @param string $productsSKU
     */
    public function deleteProducts(string $productsSKU): void
    {
        $connection = mysqli_connect($this->db_s, $this->db_h, $this->db_p, $this->db_n);
        $query = 'DELETE FROM productlist WHERE SKU IN("' . $productsSKU . '");';
        $result = mysqli_query($connection, $query);
        $connection->close();
    }

    public function dumpList(): void
    {
        var_dump($this->list);
    }

    public function generateDivs(): void
    {
        $shift = 0;
        $listSize = count($this->list);

        while ($shift < $listSize) {
            echo '<div class="product-sub-list row g-0">';
            for ($i = 0; $i < 12 && $i + $shift < count($this->list); $i++) {
                echo $this->list[$i + $shift]->generateDiv();
            }
            $shift += 12;
            echo '</div>';
        }
    }

    public function getList(): array
    {
        return $this->list;
    }

    public function getSkuList(): array
    {
        return $this->skuList;
    }
}
