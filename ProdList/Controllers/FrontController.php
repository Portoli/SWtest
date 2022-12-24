<?php

namespace ProdList\Controllers;

use ProdList\Data\{Database, HostLink};
use ProdList\Classes\Products\ServerProductList;
use ProdList\View\Listing;

class FrontController
{
    protected $action;
    protected $actionClass;

    function __construct($action)
    {
        if (!isset($action)) {
            $action = "listing";
        }
        $this->action = $action;
        $this->actionClass = "\ProdList\View\\" . ucfirst($action);
    }

    public function getHeader()
    {
        $this->actionClass::writeHeader($this->action);
    }

    public function getContent()
    {
        $productList = new ServerProductList(Database::DB_S, Database::DB_H, Database::DB_P, Database::DB_N);
        $productList->downloadList();

        $listing = new $this->actionClass($this->action, $productList->getList());
        $listing->writeContent();
    }

    public function getLibraries()
    {
        $this->actionClass::writeLibaries();
    }

    public function getScript()
    {
        $productList = new ServerProductList(Database::DB_S, Database::DB_H, Database::DB_P, Database::DB_N);
        $productList->downloadList();

        $skulistForJS = implode('", "', $productList->getSkuList());

        $listing = new $this->actionClass($this->action, $productList->getList());
        $listing->writeScript($skulistForJS, HostLink::LINK);
    }
}
