/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
(function (window, document) {

    var layout   = document.getElementById('page'),
        menu     = document.getElementById('menu-primary'),
        header   = document.getElementById('header'),
        menuLink = document.getElementById('menu-toggle');

    function toggleClass(element, className) {
        var classes = element.className.split(/\s+/),
            length = classes.length,
            i = 0;

        for(; i < length; i++) {
          if (classes[i] === className) {
            classes.splice(i, 1);
            break;
          }
        }
        // The className is not found
        if (length === classes.length) {
            classes.push(className);
        }

        element.className = classes.join(' ');
    }

    menuLink.onclick = function (e) {
        var active = 'active';

        e.preventDefault();
        toggleClass(layout, active);
        toggleClass(menu, active);
        toggleClass(header, active);
        toggleClass(menuLink, active);
    };

}(this, this.document));
