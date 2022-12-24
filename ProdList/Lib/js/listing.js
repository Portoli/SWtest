$(document).ready(function () {
    let currentPage = 1;
    let pageCount = $('.product-sub-list').length;

    $("#currentPageDisplay").html(currentPage + '/' + pageCount);
    $('.product-sub-list:nth-child(' + currentPage + ')').toggleClass('active-page');
    if (pageCount == 1) $('#list-control').css('display', 'none');

    $("#button-left").on('click', function () {
        if (currentPage > 1) {
            $('.product-sub-list:nth-child(' + currentPage + ')').toggleClass('active-page');
            currentPage--;
            $('.product-sub-list:nth-child(' + currentPage + ')').toggleClass('active-page');
            if (currentPage == pageCount) $("#button-left").toggleClass('disable');
            $("#button-right").toggleClass('disable');

            $("#currentPageDisplay").html(currentPage + '/' + pageCount);
        }
    });

    $("#button-right").on('click', function () {
        if (currentPage < pageCount) {
            $('.product-sub-list:nth-child(' + currentPage + ')').toggleClass('active-page');
            currentPage++;
            $('.product-sub-list:nth-child(' + currentPage + ')').toggleClass('active-page');
            $("#button-left").toggleClass('disable');
            if (currentPage == 0) $("#button-right").toggleClass('disable');

            $("#currentPageDisplay").html(currentPage + '/' + pageCount);
        }
    });

    $("#delete-product-bin").on('click', function () {
        console.log($('.delete-checkbox:checkbox:checked').map(function () {
            return this.value;
        }).get().join(','));

        let delArr = $('.delete-checkbox:checkbox:checked').map(function () {
            return this.value;
        }).get().join('","');
        window.location.replace(hostlink + '/ProdList/Initiate/initiate-back.php?delArr=' + delArr);
    });
});