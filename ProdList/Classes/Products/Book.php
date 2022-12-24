<?php

namespace ProdList\Classes\Products;

use ProdList\Contracts\Products\ProductTypeInterface;

class Book extends Product implements ProductTypeInterface
{
    protected $weight;

    /**
     * @param array $spec Specific information of this Type of product
     */
    public function setProductSpecific(array $spec): void
    {
        $this->weight = $spec["Book"];
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
                    <div class="product-info-specific">Weight: ' . $this->weight . 'kg</div>
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
        $query = "INSERT INTO productlist (ID, SKU, Name, Price, Type, Weight) VALUES ( NULL, '{$this->sku}', '{$this->name}', '{$this->price}', '{$this->type}', '{$this->weight}');";
        $result = mysqli_query($connection, $query);

        $connection->close();
    }
}
