$(document).ready(function() {

    function initSingleServiceSlider() {
        const info = new Swiper(".testimonials_js", {
            slidesPerView: 1,
            allowTouchMove: false,
            clickable: false,
            loop: true,
            speed: 2000,

            autoHeight: true,

            // autoplay: {
            //   delay: 5000,
            // },


            navigation: {
                nextEl: '.testimonials__control .icon_arrow_right',
                prevEl: '.testimonials__control .icon_arrow_left',
            },
        });
    }
    initSingleServiceSlider();


    function addRecallSliders() {
        let recalls = $('.recall_js');

        recalls.each(function() {
            let options = $(this).data('options') || {};
            let $parent = $(this).parent();
            let swiperDefaults = {

                slidesPerView: 1,
                speed: 2000,
                loop: true,

                autoplay: {
                  delay: 5000,
                },

                allowTouchMove: false,
                clickable: false,



                pagination: {
                    type: "fraction",
                    el: $parent.find('.swiper-pagination')[0],
                },

                navigation: {
                    nextEl: $parent.find('.icon_arrow_right')[0],
                    prevEl: $parent.find('.icon_arrow_left')[0],
                },


            };

            let swiperOptions = $.extend(swiperDefaults, options),
            mySwiper = new Swiper(this, swiperOptions);

            // console.log($parent);
            // console.log($parent.find('.projects__dotted')[0]);
            // console.log($parent.closest('.projects__item').find('.projects-swiper-sm-js')[0]);
        });

    }
    addRecallSliders();

});
