document.addEventListener('swiped-left', function (e) {
    if ($('#sidebarHiddSwip').hasClass('showSidebar')) {
        $('#sidebarHiddSwip').removeClass('showSidebar');
    }
});