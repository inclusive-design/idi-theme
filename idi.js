/*
Copyright 2012 OCAD University

Licensed under the Educational Community License (ECL), Version 2.0 or the New
BSD license. You may not use this file except in compliance with one these
Licenses.

You may obtain a copy of the ECL 2.0 License and BSD License at
https://github.com/fluid-project/infusion/raw/master/Infusion-LICENSE.txt
*/

// Declare dependencies
/*global idi:true, fluid, jQuery*/

// JSLint options 
/*jslint white: true, funcinvoke: true, undef: true, newcap: true, nomen: true, regexp: true, bitwise: true, browser: true, forin: true, maxerr: 100, indent: 4 */
var idi = idi || {};

(function ($) {
    idi.makeTopNavSticky = function () {
        var theWindow = $(window);

        var topNavEl = $('.fl-site-nav-main');
        var topNavHeight = topNavEl.css('height');

        var topNavTop = topNavEl.offset().top;
        var spacerEl = $("<div class='fl-spacer-el'></div>");
        spacerEl.css("height", topNavHeight);
        spacerEl.insertBefore(topNavEl);

        theWindow.scroll(function () {
            var windowTop = theWindow.scrollTop();
            spacerEl.toggle(windowTop > topNavTop);
            topNavEl.toggleClass('sticky', windowTop > topNavTop);
        });
    };

    $(document).ready(function () {
        idi.makeTopNavSticky();
    });
})(jQuery);