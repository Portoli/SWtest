<?php

require_once "ProdList/autoloader.php";

use ProdList\Controllers\FrontController;

$FrontController = new FrontController(@$_GET['action']);
