<div id="container" class="container">
    <div id="menu">
        <h1 id="menu-text">Product list</h1>
        <div id="menu-buttons">
            <form action="index.php" method="GET">
                <input name="action" value="adding" type="hidden">
                <input type="submit" value="ADD">
            </form>
            <input id="delete-product-bin" type="button" value="MASS DELETE">
        </div>
    </div>
    <div id="product-list">
        __listOfDivs__
        <div id="list-control">
            <button id="button-left" class="lc-control">
                < </button>
                    <div id="currentPageDisplay"> 1/2 </div>
                    <button id="button-right" class="lc-control"> >
                    </button>
        </div>
    </div>
</div>