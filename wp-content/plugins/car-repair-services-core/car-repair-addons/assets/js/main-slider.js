(function ($) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var MainSliderHandler = function ($scope, $) {
            $(".main-slider").length > 0 && $(".main-slider").each(function() {
            $(".main-slider").slick();
        });
    };
    // Make sure you run this code under Elementor.
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/main-slider.default', MainSliderHandler);
    });
})(jQuery);