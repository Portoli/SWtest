<?php

namespace ProdList\View;

abstract class abstractView
{
    protected $action;
    protected $argArr;

    function __construct($action, $argArr)
    {
        $this->action = $action;
        $this->argArr = $argArr;
    }

    /**
     * @param string $action
     */
    public abstract static function writeHeader($action): void;

    public abstract function writeContent(): void;

    public static function writeLibaries(): void
    {
        echo '
            <script language="JavaScript" type="text/javascript" src="ProdList/Lib/jQuery/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
            <script src="ProdList/Lib/bootstrap/js/bootstrap.min.js"></script>
        ';
    }


    /**
     * @param string $skuListForJS
     * @param string $hostLink
     */
    public abstract function writeScript($skulistForJS, $hostLink): void;
}
