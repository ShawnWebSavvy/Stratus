document.addEventListener('swiped', function (e) {
    if ($('#sidebarHiddSwip').hasClass('showSidebar')) {
        $('#sidebarHiddSwip').removeClass('showSidebar');
    }
});
