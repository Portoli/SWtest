
console.log(skuList);

$(document).ready(function () {
    $('#productType').on('change', function () {
        let helpText;
        $(".typeInputs").css('display', 'none');
        switch ($('#productType').val()) {
            case "DVD":
                $(".typeInputs:nth-child(1)").css('display', 'block');
                helpText = "Please provide memory size of product.";
                $("#productTypeInfo h3").html(helpText);
                break;
            case "Furniture":
                $(".typeInputs:nth-child(2)").css('display', 'block');
                helpText = "Please provide dimension sizes of product in HxWxL format.";
                $("#productTypeInfo h3").html(helpText);
                break;
            case "Book":
                $(".typeInputs:nth-child(3)").css('display', 'block');
                helpText = "Please provide weight of product.";
                $("#productTypeInfo h3").html(helpText);
                break;
        }
    });

    $('.save-button').on('click', function () {
        let infoCheck = true;
        let price = $('#price').val();
        let sku = $('#sku').val();

        //check if SKU doesn't already exist
        if (skuList.includes(sku)) {
            infoCheck = false;
            alert('Provided SKU already exist.');
        }

        //check if price provided is valid
        if (!Number(price)) {
            infoCheck = false;
            alert('Unvalid price input, please provide numeric value in price input.');
        }


        //trigger and check html validation
        if (!document.getElementById('product_form').reportValidity()) {
            infoCheck = false;
        }

        //sending form
        if (infoCheck) {
            console.log('done');
            $('#product_form').submit();
        }
    });
});