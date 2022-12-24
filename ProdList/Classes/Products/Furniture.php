<?php

namespace ProdList\Classes\Products;

use ProdList\Contracts\Products\ProductTypeInterface;

class Furniture extends Product implements ProductTypeInterface
{
    protected $height;
    protected $width;
    protected $length;

    /**
     * @param array $spec Specific information of this Type of product
     */
    public function setProductSpecific(array $spec): void
    {
        $this->height = $spec["Furniture"][0];
        $this->width = $spec["Furniture"][1];
        $this->length = $spec["Furniture"][2];
    }

    /**
     * @return string
     */
    public function generateDiv(): string
    {
        $stringDiv = '
                <div class="product-space col-md-3">
                <div class="product-div">
                    <input type="checkbox" class="delete-checkbox" value="' . $this->sku . '">
                    <div class="product-info">
                    <div class="product-info-sku">' . $this->sku . '</div>
                    <div class="product-info-name">' . $this->name . '</div>
                    <div class="product-info-price">$' . $this->price . '</div>
                    <div class="product-info-specific">Dimensions: ' . $this->height . 'x' . $this->width . 'x' . $this->length . '</div>
                    </div>
                </div>
                </div>';
        return $stringDiv;
    }

    /**
     * @param string $db_s data base server
     * @param string $db_h data base host
     * @param string $db_p data base password
     * @param string $db_n data base table name
     */
    public function addToServerDB($db_s, $db_h, $db_p, $db_n): void
    {
        $connection = mysqli_connect($db_s, $db_h, $db_p, $db_n);
        $query = "INSERT INTO productlist (ID, SKU, Name, Price, Type, Height, Width, Length) VALUES ( NULL, '{$this->sku}', '{$this->name}', '{$this->price}', '{$this->type}', '{$this->height}', '{$this->width}', '{$this->length}');";
        $result = mysqli_query($connection, $query);

        $connection->close();
    }
}
