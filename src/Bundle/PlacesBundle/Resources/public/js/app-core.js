function getCurrentPageName() {
    //method to get Current page name from url addr.
    var PageURL = document.location.href;
    var PageName = PageURL.substring(PageURL.lastIndexOf('/') + 1);
    return PageName.toLowerCase();
}

$(document).ready(function() {
    /* tooptip */
    //$(document).tooltip();

    $('.typeahead').typeahead({
        limit: 10,
        minLength: 2,
        name: 'Places',
        remote: '/PlacesProject/web/bundles/bundleproject/libs/suggestPlace.php?term=%QUERY',
        highlightSuggestion: true
    });

    /* Dropdown navbar */
    $('.dropdown-toggle').dropdown();

    /* Carousel */
    $('.carousel').carousel({
        interval: 5000
    });

    /* Homepage Navigation menu links - stay active */
    var currPage = getCurrentPageName();
    switch (currPage) {
        case 'home':
            $('#li-home').addClass('active');
            break;

        case 'about':
            $('#li-about').addClass('active');
            $('#li-dropdown').addClass('active');
            break;

        case 'login':
            $('#li-login').addClass('active');
            $('#li-dropdown').addClass('active');
            break;

        case 'start':
            $('#li-admin').addClass('active');
            $('#li-dropdown').addClass('active');
            break;

        default:
            $('#li-home').addClass('active');
            break;
    }
});
            