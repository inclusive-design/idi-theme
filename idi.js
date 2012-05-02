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
        var aboutSectionNav = $('.idi-about-nav');
        var topNavHeight = topNavEl.css('height');
        var paddingString = $('.fl-site-nav-main ul').css('padding-top');
        var padding = parseInt(paddingString.substring(0, paddingString.length - 3), 10);
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

    idi.selectors = {
        UIOContainer:  ".flc-uiOptions-fatPanel",
        loginContainer: ".flc-uiOptions-fatPanel",
        loginPanel: ".idi-slidingPanel-panel",
        loginToggleBtn: ".idi-slidingPanel-toggleButton",
        UIOPanel: '.flc-slidingPanel-panel',
        UIOToggleButton: '.flc-slidingPanel-toggleButton',
        loginForm: ".idi-login-form",
        mailingList: {
            form: ".idi-mailing-list-signup",
            loading: ".idi-loading",
            listForm: "#idiMailingListSignup",
            listEmail: "#listEmail",
            success: ".idi-signup-success",
            emailed: ".idi-email-signedup",
            error: ".idi-signup-error",
            warning: ".idi-invalid-email-warning"
        }
    };

    idi.setUpLoginOutPanel = function () {
        fluid.slidingPanel(idi.selectors.loginContainer, {
            selectors: {
                panel: idi.selectors.loginPanel,
                toggleButton: idi.selectors.loginToggleBtn
            },
            strings: {
                showText: "Login",
                hideText: "Login"
            },
            listeners: {
                onPanelShow: function () {
                    // close UIO panel if it was open
                    idi.closeOpenedPanel($(idi.selectors.UIOPanel), $(idi.selectors.UIOToggleButton));
                }
            }
        });
        $(idi.selectors.loginForm).show();
    };

    idi.mailingListSignup = function () {
        var form = $(idi.selectors.mailingList.form);
        var loading = $(idi.selectors.mailingList.loading);
        form.hide();
        loading.show();

        var listForm = $(idi.selectors.mailingList.listForm);
        var listEmail = $(idi.selectors.mailingList.listEmail).val();
        var success = $(idi.selectors.mailingList.success);
        var emailed = $(idi.selectors.mailingList.emailed);
        var error = $(idi.selectors.mailingList.error);
        var warning = $(idi.selectors.mailingList.warning);
        warning.hide();

        //validate for non-html5 browsers
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (reg.test(listEmail) === false) {
            warning.show();
        } else {
            $.ajax({
                url: listForm.attr('action'),
                type: listForm.attr('method'),
                data: {email: listEmail},
                success: function (email) {
                    loading.hide();
                    emailed.text(listEmail);
                    success.show();
                },
                error: function () {
                    loading.hide();
                    error.show();
                }
            });
        }
        return false;
    };

    $(document).ready(function () {
        idi.setUpLoginOutPanel();
        idi.makeTopNavSticky();
    });

    fluid.demands("fluid.slidingPanel", ["fluid.uiOptions", "fluid.uiEnhancer"], {
        options: {
            listeners: {
                afterPanelShow: function () {
                    // close login panel if it was open
                    idi.closeOpenedPanel($(idi.selectors.loginPanel), $(idi.selectors.loginToggleBtn));
                }
            }
        }
    });
})(jQuery);