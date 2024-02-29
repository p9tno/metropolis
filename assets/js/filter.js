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
                showModalContent();
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

    function showModalContent () {
        const project = $('.portfolio__item');
        const modalBody = $('#modalbody');
      
        project.on('click', function (event) {
          event.preventDefault();
          // let id  = $(this).attr('data-modal');
          let clickId  = $(this).attr('id');
        //   console.log('clickId', clickId);
    
        //   console.log('modalData : ', modalData[clickId][0]);
    
          const id = modalData[clickId][0].id; 
          const cat = modalData[clickId][0].category;
          const title = modalData[clickId][0].title;
          const location = modalData[clickId][0].location;
          const text = modalData[clickId][0].content;
          const link = modalData[clickId][0].link;
          const images = modalData[clickId][0].slides;
          const recall = modalData[clickId][0].recall;
    
          modalBody.html(setModalContent(cat, title, location, text, link, images, recall));
    
          initProjectSlider();
    
          $('#project').modal('show');
        //   console.log(modalData);
        });
      
        $('.modal').on('hide.bs.modal', () => {
            // console.log('hide modal');
            modalBody.html('');
        });
      
        function setModalContent(cat, title, location, text, link, images, recall) {
            let sliderDiv = '';
            if (images[0].url != false) {
              let slides = '';
              images.forEach((data) => {
                  slides += `<div class="swiper-slide">
                      <div class="project__img img ${data['radio']}">
                          <img
                              src="${data['url']}"
                              alt="image"
                              loading="lazy"
                          />
                      </div>
                  </div>`;
              });
      
              let countSlides = images.length;
              let control = '';
              let fraction = '';
              if(countSlides > 2) {
                control = `<div class="project__control swiper-control dark">
                  <i class="swiper-arrow icon_arrow_left"></i>
                  <div class="swiper-pagination"></div>
                  <i class="swiper-arrow icon_arrow_right"></i>
                </div>`
      
                fraction = `<div class="project__fraction desktop">
                  <div class="fraction"><span class="fraction__current fraction_current_js">01</span>
                    <div class="fraction__line"></div><span class="fraction__all fraction_all_js">03</span>
                  </div>
                </div>`
              }
              sliderDiv = `<div class="project__slider">
                ${fraction}
                <div class="swiper project_js">
                  <div class="swiper-wrapper">
                      ${slides}
                  </div>
                  ${control}
                </div>
              </div>`
    
            }
    
            let locationDivMobile = '';
            let locationDivDesktop = '';
            if (location) {
              locationDivMobile = `<div class="project__location">${location}</div>`;
              locationDivDesktop =`<div class="project__location desktop">${location}</div>`
            }
    
            let linkDiv = '';
            if (link) {
              linkDiv = `<div class="project__bottom">
                  <a class="btn" href="${link}"><span>FREE ESTIMATE</span></a>
              </div>`
            }
            
            let recalContent = '';
            if (recall && recall.content) { 
                let personImg = '';
                if (recall.url) {
                    personImg = `<div class="person__img img"><img src="${recall.url}" alt="image" loading="lazy"/></div>`
                }

                let personTitle = '';
                if (recall.title) {
                    personTitle = `<div class="person__title">${recall.title}</div>`
                }

                let personDesc = '';
                if (recall.desc) {
                    personDesc = `<div class="person__desc">${recall.desc}</div>`
                }

                recalContent = `<div class="project__recall">
                  <div class="recall__box">
                    <div class="recall__title">client testimonial</div>
                    <div class="recall__text">${recall.content}</div>
                    <div class="recall__person">
                      <div class="person">
                        ${personImg}
                        <div class="person__info">
                            ${personTitle}
                            ${personDesc}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>`;
            }

      
            return `<div class="project__wrap">
      
                <div class="project__content mobile">
                  <div class="project__cat">${cat}</div>
                  <div class="project__title">${title}</div>
                  ${locationDivMobile}
                </div>
    
                ${sliderDiv}
        
                <div class="project__content">
                  <div class="project__scrolled">
                    <div class="project__cat desktop">${cat}</div>
                    <div class="project__title desktop">${title}</div>
                    ${locationDivDesktop}
                    <div class="project__text">${text}</div>
                    ${recalContent}
                    ${linkDiv}  
                  </div>
                </div>
              </div>
            `;
        }
      
      
        function initProjectSlider() {
            // console.log('init slider project');
            const project = new Swiper(".project_js", {
                slidesPerView: 1,
                allowTouchMove: false,
                clickable: false,
                // loop: true,
                speed: 2000,
      
                // autoplay: {
                //   delay: 5000,
                // },
      
                navigation: {
                    nextEl: '.icon_arrow_right',
                    prevEl: '.icon_arrow_left',
                },
      
                breakpoints: {
                    768: {
                        // loop: false,
                        grid: {
                            rows: 2,
                        },
                    },
      
                },
      
                pagination: {
                    el: ".swiper-pagination",
                    type: "fraction",
                },
      
                on: {
                    init: function (e) {
                        $('.fraction_current_js').text(pad(e.realIndex + 1));
                        $('.fraction_all_js').text(pad(Math.ceil(e.imagesToLoad.length / 2)));
                    },
                },
      
            });
      
            project.on('slideChange', function (e) {
                let currentSlide = e.realIndex;
                $('.project__fraction').addClass('active');
      
                setTimeout(()=>{
                    $('.project__fraction').removeClass('active');
                    $('.fraction_current_js').text(pad(currentSlide + 1));
                },1000);
            });
      
            function pad(n) {
                return (n < 10) ? ("0" + n) : n;
            }
        }
    }
    
    showModalContent();

});

