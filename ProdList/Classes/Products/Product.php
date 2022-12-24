<?php

namespace ProdList\Classes\Products;

abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    function __construct($s, $n, $p, $t)
    {
        $this->sku = $s;
        $this->name = $n;
        $this->price = $p;
        $this->type = $t;
    }

    /**
     * @return array
     */
    public function getProductInfo(): array
    {
        return [$this->sku, $this->name, $this->price, $this->type];
    }

    public abstract function generateDiv(): string;

    public abstract function addToServerDB($db_s, $db_h, $db_p, $db_n): void;
}
