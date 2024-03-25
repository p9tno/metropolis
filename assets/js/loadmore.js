jQuery(function($){
    // AJAX загрузка страниц/записей WP 
    $('.btn_loadmore_js').on('click', function(e){
        e.preventDefault();
        let _this = $(this);
        _this.html('<span>Loading</span>'); // изменение кнопки 

        let data = {
            'action': 'loadmore',
            'query': _this.attr('data-param-posts'),
            'page': this_page,
            'leftPost': this_left_post,
            'tpl': _this.attr('data-tpl'),
        }

        // console.log(data);

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            type: 'POST',
            beforeSend: function () {
            },
            complete: function() {
                uploadYoutubeVideo();
                videoPlayer();
                addRecallSliders();
            },
            success:function(data){
                if (data) {
                    this_left_post = this_left_post - 8; // уменьшаем количество оставшихся постов   
                    _this.html(`<span>see more feedback</span><i>(${this_left_post})</i>`);
                    $('#loadmore_wrap_js').append(data);
                    this_page++;                       // увелич. номер страницы +1 

                    if (this_page == _this.attr('data-max-pages')) {
                        _this.parent().remove();               // удаляем кнопку, если последняя стр. 
                    }
                } else {                              
                    _this.parent().remove();                   // удаляем кнопку 
                }
            },
            error: function() {
                _this.html('<span>There has been an error</span>');
            }
        });
  });

    function uploadYoutubeVideo() {
        if ( $( ".js-youtube" ) ) {
            $( '.video__play' ).on( 'click', function () {
                let wrapp = $( this ).closest( '.js-youtube' ),
                    videoId = wrapp.attr( 'id' ),
                    iframe_url = "https://www.youtube.com/embed/" + videoId + "?autoplay=1&autohide=1";

                if ( $( this ).data( 'params' ) ) iframe_url += '&' + $( this ).data( 'params' );

                let iframe = $( '<iframe/>', {
                    'frameborder': '0',
                    'src': iframe_url,
                    'allow': "autoplay"
                } )

                $( this ).closest( '.video__wrapper' ).append( iframe );
            } );
        }
    };

    function videoPlayer() {
        $('.player__play').on('click', function (e) {
            e.preventDefault();
            // console.log('player__play loadmore js');
            let videoContainer = $(this).closest('.player');
            let video = videoContainer.find('video')[0];
            if (video.paused) {
                video.play();
                videoContainer.addClass('video-is-playing');
            } else {
                video.pause();
                videoContainer.removeClass('video-is-playing');
                video.load();
            }

        });
    }

    function addRecallSliders() {
        let recalls = $('.recall_js');

        recalls.each(function() {
            let options = $(this).data('options') || {};
            let $parent = $(this).parent();
            let swiperDefaults = {

                slidesPerView: 1,
                speed: 2000,
                loop: true,

                // autoplay: {
                //   delay: 5000,
                // },

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

});