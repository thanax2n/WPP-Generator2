const mxsfwnContentSlider = window.mxsfwnContentSlider || {

    container: '.wp-block-mxsfwn-content-slider',

    bindSlider: function () {

        if (jQuery(this.container).length === 0) return;

        const _this = this;

        jQuery(this.container).each(function () {

            const data = jQuery(this).data();

            const autoplay = data.autoplay === 0 ? false : true;;
            const autoplayTimeout = data.autoplaySpeed === 0 ? 5000 : data.autoplaySpeed + '000';
            const nav = data.nav === 0 ? false : true;
            const dots = data.dots === 0 ? false : true;
            const loop = data.loop === 0 ? false : true;

            jQuery(this).owlCarousel({
                loop: loop,
                margin: 10,
                items: 1,
                autoplay: autoplay,
                nav: nav,
                dots: dots,
                autoplayTimeout: autoplayTimeout,
                autoHeight: true
            });

        });

    },

    init: function () {

        this.bindSlider();

    }

};

jQuery(document).ready(function () {
    mxsfwnContentSlider.init();
});