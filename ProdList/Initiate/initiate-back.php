<?php

require_once "../autoloader.php";

use ProdList\Data\HostLink;
use ProdList\Controllers\BackController;

$incBackController = new BackController();

header('Location: ' . HostLink::LINK . '/index.php?action=listing');
