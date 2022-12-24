<div id="container" class="container">
    <div id="menu">
        <h1 id="menu-text">Product add</h1>
        <div id="menu-buttons">
            <input class="save-button" type="button" value="Save">
            <form action="index.php">
                <input name="action" value="listing" type="hidden">
                <input type="submit" value="CANCEL">
            </form>
        </div>
    </div>
    <div id="product-form-div" class="row col-md-12">
        <form id="product_form" method="POST" action="ProdList/Initiate/initiate-back.php">
            <div id="product-base-info">
                <label for="input">SKU</label>
                <input id="sku" name="IN-sku" type="text" maxlength="25" pattern="[A-Za-z0-9]*" title="No special characters in SKU" required>
                <h4 id="skuErr"></h4>
                <br>
                <label for="input" maxlength="50">Name</label>
                <input id="name" name="IN-name" type="text" required>
                <h4 id="skuErr"></h4>
                <br>
                <label for="input" maxlength="20">Price</label>
                <input id="price" name="IN-price" type="text" required>
                <h4 id="skuErr"></h4>
            </div>

            <div id="productTypeDiv">
                <label for="input">Type Switcher</label>
                <select id="productType" name="IN-type" required>
                    <option value="DVD">DVD</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Book">Book</option>
                </select>
                <div id="productTypeInfo">
                    <div class="typeInputs">
                        <label for="input"> Size(MB) </label> <input id="size" name="IN-size" type="text" maxlength="25" pattern="[0-9]*"> <br>
                    </div>
                    <div class="typeInputs" style="display:none;">
                        <label for="input"> Height(CM) </label> <input id="height" name="IN-height" type="text" maxlength="15" pattern="[0-9\.]*"> <br>
                        <label for="input"> Width(CM) </label> <input id="width" name="IN-width" type="text" maxlength="15" pattern="[0-9\.]*"> <br>
                        <label for="input"> Length(CM) </label> <input id="length" name="IN-lenght" type="text" maxlength="15" pattern="[0-9\.]*"> <br>
                    </div>
                    <div class="typeInputs" style="display:none;">
                        <label for="input"> Weight(KG) </label> <input id="weight" name="IN-weight" type="text" maxlength="15" pattern="[0-9\.]*">
                    </div>
                    <h3>Please provide memory size of product.</h3>
                </div>
            </div>

        </form>
    </div>
</div>