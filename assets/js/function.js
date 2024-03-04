var app = {
    pageScroll: '',
    lgWidth: 1200,
    mdWidth: 992,
    smWidth: 768,
    resized: false,
    iOS: function () {
        return navigator.userAgent.match( /iPhone|iPad|iPod/i );
    },
    touchDevice: function () {
        return navigator.userAgent.match( /iPhone|iPad|iPod|Android|BlackBerry|Opera Mini|IEMobile/i );
    }
};

function isLgWidth() {
    return $( window ).width() >= app.lgWidth;
} // >= 1200
function isMdWidth() {
    return $( window ).width() >= app.mdWidth && $( window ).width() < app.lgWidth;
} //  >= 992 && < 1200
function isSmWidth() {
    return $( window ).width() >= app.smWidth && $( window ).width() < app.mdWidth;
} // >= 768 && < 992
function isXsWidth() {
    return $( window ).width() < app.smWidth;
} // < 768
function isIOS() {
    return app.iOS();
} // for iPhone iPad iPod
function isTouch() {
    return app.touchDevice();
} // for touch device

window.onload = function () {
    console.log('onload');
    function preloader() {
        $(()=>{

            setTimeout( () => {
                let p = $('#preloader');
                p.addClass('hide');

                setTimeout( () => {
                    p.remove()
                },1000);

            },1000);
        });
    }
    preloader();
}

$(document).ready(function() {
    // console.log('ready');
    window.addEventListener('resize', () => {
        // Запрещаем выполнение скриптов при смене только высоты вьюпорта (фикс для скролла в IOS и Android >=v.5)
        if (app.resized == screen.width) { return; }
        app.resized = screen.width;
    });

    let mediaQuerySize = 768;
    let windowWidth = screen.width;
    if (windowWidth >= mediaQuerySize) {
        // console.log('desktop');
        scroolPreview('#preview');
        collapsedActiveOneDesktop();
    } else {
        // console.log('mobile');
        scroolPreview('#sliders', 20);
        collapsedActiveOneMobile();
    }

    function scroolPreview(to, position = 0) {
        $('.preview__control > i').on('click', function (e) {
            let top = $(to).offset().top-position;
            $('body,html').animate({scrollTop: top}, 1000);
        });
    }

    function scroolTo() {
        $(".scroll_js").on("click", function (event) {
            event.preventDefault();
            let id  = $(this).attr('href');
            // console.log(id);

            let top = $(id).offset().top;
            $('body,html').animate({scrollTop: top}, 1500);
        });
    };
    scroolTo();

    function openMobileNav() {
        $('.header__toggle').click(function(event) {
            // console.log('Показ меню');
            $('.header__nav').toggleClass('header__nav_open');
            $('.header__toggle').toggleClass('header__toggle_open');
            $( 'body' ).toggleClass( 'nav-open' );
        });

        $(document).mouseup(function (e) {
            let div = $(".header");
            if (!div.is(e.target) && div.has(e.target).length === 0) {
                $('.header__nav').removeClass('header__nav_open');
                $('.header__toggle').removeClass('header__toggle_open');
                $('body').removeClass('nav-open');
            }
        });
    };
    openMobileNav();

    function collapsedActiveOneDesktop() {
        $('.collapse__title').on('click', function() {
            let body = $(this).parent().find('.collapse__body');
            $('.collapse__body').not(body).slideUp();
            $(body).slideToggle();

            let toggle = $(this).parent().find('.collapse__title');
            $('.collapse__title').not(toggle).removeClass('open');
            $(toggle).toggleClass('open');
        })
    }

    function collapsedActiveOneMobile() {
        $('.collapse__title').on('click', function() {
            let body = $(this).parent().find('.collapse__body');
            $('.collapse__body').not(body).slideUp();
            $(body).slideToggle();

            let toggle = $(this).parent().find('.collapse__title');
            $('.collapse__title').not(toggle).removeClass('open');
            $(toggle).toggleClass('open');

            if($(this).hasClass('open')) {

                setTimeout(() => {
                    let id  = $(this).attr('data-top');
                    let top = $(id).offset().top-20;
                    $('body,html').animate({scrollTop: top}, 1000);
                }, 610)
            }

        })
    }

   
    function onVisible( selector, callback, repeat = false ) {
    let options = {
        threshold: [ 0.5 ]
    };
    let observer = new IntersectionObserver( onEntry, options );
    let elements = document.querySelectorAll( selector );

    for ( let elm of elements ) {
        observer.observe( elm );
    }

    function onEntry( entry ) {
        entry.forEach( change => {
            let elem = change.target;
            // console.log(change);
            // console.log(elem.innerHTML);
            if ( change.isIntersecting ) {
                if ( !elem.classList.contains( 'show' ) || repeat ) {
                    elem.classList.add( 'show' );
                    callback( elem );
                }
            }
        } );
    }
    }

    onVisible( '.section_title_line_js', function ( e ) {} );


    // Видео youtube для страницы
    function uploadYoutubeVideo() {
        if ( $( ".js-youtube" ) ) {

            // $( ".js-youtube" ).each( function () {
            //     // Зная идентификатор видео на YouTube, легко можно найти его миниатюру
            //     $( this ).css( 'background-image', 'url(http://i.ytimg.com/vi/' + this.id + '/sddefault.jpg)' );
            //
            //     // Добавляем иконку Play поверх миниатюры, чтобы было похоже на видеоплеер
            //     $( this ).append( $( '<img src="../wp-content/themes/gymn/assets/img/play.png" alt="Play" class="video__play">' ) );
            //
            // } );

            $( '.video__play, .video__prev' ).on( 'click', function () {
                // создаем iframe со включенной опцией autoplay
                let wrapp = $( this ).closest( '.js-youtube' ),
                    videoId = wrapp.attr( 'id' ),
                    iframe_url = "https://www.youtube.com/embed/" + videoId + "?autoplay=1&autohide=1";

                if ( $( this ).data( 'params' ) ) iframe_url += '&' + $( this ).data( 'params' );

                // Высота и ширина iframe должны быть такими же, как и у родительского блока
                let iframe = $( '<iframe/>', {
                    'frameborder': '0',
                    'src': iframe_url,
                    'allow': "autoplay"
                } )

                // Заменяем миниатюру HTML5 плеером с YouTube
                $( this ).closest( '.video__wrapper' ).append( iframe );

            } );
        }
    };
    uploadYoutubeVideo();

    function uploadYoutubeVideoForModal() {
        if ( $( ".youtubeModal_js" ) ) {

            $( '.youtubeModal_js' ).on( 'click', function () {
                $('#modalVideo').modal('show');

                let wrapp = $( this ).closest( '.youtubeModal_js' );
                let videoId = wrapp.attr( 'id' );
                let iframe_url = "https://www.youtube.com/embed/" + videoId + "?autoplay=1&autohide=1";

                // доп параметры для видоса
                // if ( $( this ).data( 'params' ) ) iframe_url += '&' + $( this ).data( 'params' );

                // Высота и ширина iframe должны быть такими же, как и у родительского блока
                let iframe = $( '<iframe/>', {
                    'frameborder': '0',
                    'src': iframe_url,
                    'allow': "autoplay"
                } )
                $(".modalVideo__wraper").append(iframe);

                $("#modalVideo").on('hide.bs.modal', function () {
                    $(".modalVideo__wraper").html('');
                });

            } );
        }
    };
    uploadYoutubeVideoForModal();

    function initPreviewSliders() {
        const speed = 2000;
        const lg = new Swiper(".preview_lg_js", {
            slidesPerView: 1,
            allowTouchMove: false,
            clickable: false,
            loop: true,
            autoplay: {
                delay: 5000,
              },
            speed: speed,
        });

        const sm = new Swiper(".preview_sm_js", {
            slidesPerView: 1,
            allowTouchMove: false,
            clickable: false,
            loop: true,
            speed: speed,
            autoplay: {
                delay: 5000,
              },
            thumbs: {
                swiper: lg,
            },
        });

        const info = new Swiper(".preview_info_js", {
            slidesPerView: 1,
            allowTouchMove: false,
            clickable: false,
            loop: true,
            speed: speed,

            autoplay: {
              delay: 5000,
            },

            effect: "fade",
            fadeEffect: {
              crossFade: true
            },

            autoHeight: true,

            navigation: {
                nextEl: '.preview__control .icon_arrow_right',
                prevEl: '.preview__control .icon_arrow_left',
            },

            breakpoints: {
                768: {
                    autoHeight: false,
                },

            },

            pagination: {
                el: ".preview__control .swiper-pagination",
                type: "fraction",
            },

            thumbs: {
                swiper: sm,
            },
        });
    }
    initPreviewSliders();

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

        });

    }
    addRecallSliders();

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

})
