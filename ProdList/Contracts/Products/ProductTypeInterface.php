<?php

namespace ProdList\Contracts\Products;

interface ProductTypeInterface
{
    public function setProductSpecific(array $spec): void;
    public function generateDiv();
    public function addToServerDB($db_s, $db_h, $db_p, $db_n): void;
}
