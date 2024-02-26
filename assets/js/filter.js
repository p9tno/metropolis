$(document).ready(function() {
    // console.log('init filter js');
    //Запуск фильтра
    $(".filter-list-js :radio").click(function() {
        my_filter_get_posts();
        // console.log('click');
    });

    $(document).on("click",".page-numbers",function(e){
        e.preventDefault();

        // console.log('pagination');
        let top = $('.filter').offset().top - 100;
        $('body,html').animate({scrollTop: top}, 700);

        var url = $(this).attr('href'); //Grab the URL destination as a string
        var paged = url.split('&paged='); //Split the string at the occurance of &paged=

        if(~url.indexOf('&paged=')){
            paged = url.split('&paged=');
        } else {
            paged = url.split('/page/');
        }

        my_filter_get_posts(paged[1]); //Load Posts (feed in paged value)
    });

    //Получаем данные
    function getPostType () {
        let post_type = []; //Setup empty array
        $(".filter-cat-js input:checked").each(function() {
            let val = $(this).attr('data-post-type');
            post_type.push(val); //Push value onto array
        });
        return post_type; //Return all of the selected genres in an array
    }

    function getTaxonomy () {
        let taxonomy; //Setup empty array
        $(".filter-cat-js input:checked").each(function() {
            let val = $(this).attr('data-taxonomy');
            taxonomy = val; //Push value onto array
        });
        return taxonomy; //Return all of the selected genres in an array
    }
    function getCat() {
        let cat = []; 
        $(".filter-cat-js input:checked").each(function() {
            let val = $(this).val();
            cat.push(val); 
        });
        return cat; 
    }
    function getPostsPerPage() {
        let posts_per_page; 
        $(".filter-cat-js input:checked").each(function() {
            let val = $(this).attr('data-posts_per_page');
            posts_per_page = val; 
        });
        return posts_per_page; 
    }
  
    function my_filter_get_posts(paged) {
        let paged_value = paged; //Store the paged value if it's being sent through when the function is called
        let ajax_url = '/wp-admin/admin-ajax.php';
        

        $.ajax({
            type: 'GET',
            url: ajax_url,
            data: {
                action: 'my_filter',
                postType: getPostType,
                taxonomy: getTaxonomy,
                cat: getCat,
                postsPerPage: getPostsPerPage,

                paged: paged_value,
            },

            beforeSend: function () {
                initPreloder();
            },
            complete: function() {
                destroyPreloder();
            },
            success: function(data) {
                $('.filter__content').html(data);
            },
            error: function() {
                $(".filter__content").html('<p>There has been an error</p>');
            }
        });
    }

    function initPreloder() {
        $('.preloaderFilter-js').show();
    }

    function destroyPreloder() {
        setTimeout( () => {
            $('.preloaderFilter-js').hide();
        },600);
    }

});

