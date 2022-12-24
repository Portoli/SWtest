<?php

namespace ProdList\View;

use ProdList\View\abstractView;

class Adding extends abstractView
{
    protected $action;
    protected $argArr;


    public static function writeHeader($action): void
    {
        require_once 'ProdList/Template/' . $action . 'Header.php';
    }

    public function writeContent(): void
    {
        require_once 'ProdList/Template/' . $this->action . 'Content.php';
    }

    public function writeScript($skulistForJS, $hostLink): void
    {
        echo 'let skuList = ["' . $skulistForJS . '"];';
        echo 'let hostlink = "' . $hostLink . '";';
        require_once 'ProdList/Lib/js/' . $this->action . '.js';
    }
}
