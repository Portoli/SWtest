<?php

namespace ProdList\Controllers;

use ProdList\Data\{Database, HostLink};
use ProdList\Classes\Products\ServerProductList;

use ProdList\Classes\Products\DVD;
use ProdList\Classes\Products\Furniture;
use ProdList\Classes\Products\Book;

class BackController
{
    protected $skuListStr;
    protected $sku;
    protected $name;
    protected $price;
    protected $type;
    protected $extra;

    function __construct()
    {
        if (isset($_GET['delArr'])) {
            $this->callDelate();
        }
        if (isset($_POST['IN-sku'])) {
            $this->callAdd();
        }
    }

    private function callDelate(): void
    {
        $serverProductList = new ServerProductList(Database::DB_S, Database::DB_H, Database::DB_P, Database::DB_N);

        if (!preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/', $_GET['delArr'])) {
            $serverProductList->deleteProducts($_GET['delArr']);
        };
    }

    private function callAdd(): void
    {
        $sku = $_POST['IN-sku'];
        $name = $_POST['IN-name'];
        $price = $_POST['IN-price'];
        $type = $_POST['IN-type'];
        $size = $_POST['IN-size']; //DVD specific informaction 
        $dimensions = [$_POST["IN-height"], $_POST["IN-width"], $_POST["IN-lenght"]]; //Furniture specific informaction 
        $weight = $_POST['IN-weight']; //Book specific informaction 

        $specific = ["DVD" => $size, "Furniture" => $dimensions, "Book" => $weight]; //All Products specific information

        $productType = "\ProdList\Classes\Products\\" . $type;

        $product = new $productType($sku, $name, $price, $type);
        $product->setProductSpecific($specific);

        $product->addToServerDB(Database::DB_S, Database::DB_H, Database::DB_P, Database::DB_N);
    }
}
