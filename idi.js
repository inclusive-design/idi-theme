/*
Copyright 2012 OCAD University

Licensed under the Educational Community License (ECL), Version 2.0 or the New
BSD license. You may not use this file except in compliance with one these
Licenses.

You may obtain a copy of the ECL 2.0 License and BSD License at
https://github.com/fluid-project/infusion/raw/master/Infusion-LICENSE.txt
*/

// Declare dependencies
/*global idi:true, fluid, jQuery, window*/

// JSLint options 
/*jslint white: true, funcinvoke: true, undef: true, newcap: true, nomen: true, regexp: true, bitwise: true, browser: true, forin: true, maxerr: 100, indent: 4 */
var idi = idi || {};

(function ($) {
    idi.makeTopNavSticky = function () {
        var theWindow = $(window);

        var topNavEl = $('.fl-site-nav-main');
        var aboutSectionNav = $('.idi-section-nav');
        var topNavHeight = topNavEl.css('height');
        var paddingString = $('.fl-site-nav-main ul').css('padding-top');
        var padding = parseInt(paddingString.substring(0, paddingString.length - 3));
        var topNavTop = topNavEl.offset().top - padding;
        var spacerEl = $("<div class='fl-spacer-el'></div>");
        spacerEl.css("height", topNavHeight);
        spacerEl.insertBefore(topNavEl);

        theWindow.scroll(function () {
            var windowTop = theWindow.scrollTop();
            spacerEl.toggle(windowTop > topNavTop);
            topNavEl.toggleClass('sticky', windowTop > topNavTop);
            aboutSectionNav.toggleClass('sticky', windowTop > topNavTop);
        });
    };

    idi.closeOpenedPanel = function (panel, toggleBtn) {
        if (panel.css("display") === "block") {
            toggleBtn.click();
        }
    };

    var selectorUIOContainer = selectorLoginContainer = ".flc-uiOptions-fatPanel";
    var selectorLoginPanel = ".idi-slidingPanel-panel";
    var selectorLoginToggleBtn = ".idi-slidingPanel-toggleButton";
    
    idi.setUpLoginOutPanel = function () {
        fluid.slidingPanel(selectorLoginContainer, {
            selectors: {
                panel: selectorLoginPanel,
                toggleButton: selectorLoginToggleBtn
            },
            strings: {
                showText: "Login",
                hideText: "Login"
            },
            listeners: {
                onPanelShow: function (slidingPanel) {
                    // close UIO panel if it was open
                    var uioPanel = $('.flc-slidingPanel-panel');
                    var uioToggleButton = $('.flc-slidingPanel-toggleButton');
                    
                    idi.closeOpenedPanel(uioPanel, uioToggleButton);
                }
            }
        });
        $(".idi-login-form").show();
    };

    $(document).ready(function () {
        idi.makeTopNavSticky();
        idi.setUpLoginOutPanel();
        
        fluid.demands("fluid.slidingPanel", ["fluid.uiOptions", "fluid.uiEnhancer"], {
            options: {
                listeners: {
                    afterPanelShow: function () {
                        // close login panel if it was open
                        var loginPanel = $(selectorLoginPanel);
                        var loginToggleButton = $(selectorLoginToggleBtn);
                        
                        idi.closeOpenedPanel(loginPanel, loginToggleButton);
                    }
                }
            }
        });
    });
})(jQuery);