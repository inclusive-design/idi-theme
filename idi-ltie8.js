(function ($) {
    $(document).ready( function () {
        $("*").focus(function () {
            $(this).css("border", "5px solid #FFCC00");
        });

        $("*").blur(function () {
            // TODO: This removes previously existing borders on blur. What we actually want is to put the borders back to what they were. 
            $(this).css("border", "none");
        });

    });

})(jQuery);