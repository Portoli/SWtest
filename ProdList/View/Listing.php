<?php

namespace ProdList\View;

use ProdList\View\abstractView;

class Listing extends abstractView
{
    protected $action;
    protected $argArr;

    /**
     * @param string $acton
     */
    public static function writeHeader($action): void
    {
        require_once 'ProdList/Template/' . $action . 'Header.php';
    }

    public function writeContent(): void
    {
        $shift = 0;
        $listSize = count($this->argArr);
        $divsString = "";

        while ($shift < $listSize) {
            $divsString .= '<div class="product-sub-list row g-0">';
            for ($i = 0; $i < 12 && $i + $shift < count($this->argArr); $i++) {
                $divsString .= $this->argArr[$i + $shift]->generateDiv();
            }
            $shift += 12;
            $divsString .= '</div>';
        }
        $contentString = file_get_contents('ProdList/Template/listingContent.php');
        $contentString = str_replace('__listOfDivs__', $divsString, $contentString);
        echo $contentString;
    }

    /**
     * @param string $skuListForJS
     * @param string $hostLink
     */
    public function writeScript($skulistForJS, $hostLink): void
    {

        echo 'let skuList = ["' . $skulistForJS . '"];';
        echo 'let hostlink = "' . $hostLink . '";';
        require_once 'ProdList/Lib/js/' . $this->action . '.js';
    }
}
