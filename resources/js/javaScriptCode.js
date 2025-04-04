







/* 10. Hide Dropdown When Clicking Elsewhere */
$(document).click(function (e) {
    if (!$(e.target).closest('.dropdown').length) {
        $('.dropdown-menu').hide();
    }
});

$('.dropdown-toggle').click(function (e) {
    e.stopPropagation(); // prevent doc click
    $('.dropdown-menu').toggle();
});
