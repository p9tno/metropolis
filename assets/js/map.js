document.addEventListener('DOMContentLoaded', () => {
    let map;

    const mark = document.querySelector('.mark');
    const markClose = document.querySelector('.mark__close');
    const markContent = document.querySelector('.mark__content');

    markClose.addEventListener('click', () => {
        mark.classList.remove('open');
    });

    async function initMap() {
        const { Map } = await google.maps.importLibrary('maps');

        map = new Map(document.getElementById('map'), {
            center: { lat: 34.053, lng: -118.362 },
            zoom: 11,
            disableDefaultUI: true,
            mapId: 'e87a5ee68e47b684',
        });

        const bounds = new google.maps.LatLngBounds();
        mapMarkers.forEach((marker) => {
            if (marker.position.lat && marker.position.lng) {
                bounds.extend(new google.maps.LatLng(marker.position.lat, marker.position.lng));
            }
        });
    
        if (mapMarkers.length > 1) {
            map.fitBounds(bounds);
        } else {
            map.setCenter({ lat: mapMarkers[0].position.lat, lng: mapMarkers[0].position.lng });
        }
        // console.log(mapMarkers);

        mapMarkers.forEach(({ title, position, place, text, link, images, icon, scaledSize }, i) => {
            const addMarker = () => {
                const iconSet = {
                    url: icon, // url
                    scaledSize: new google.maps.Size(scaledSize, scaledSize), // scaled size
                    origin: new google.maps.Point(0,0), // origin
                    anchor: new google.maps.Point(0, 0) // anchor
                }
                const marker = new google.maps.Marker({
                    icon: iconSet,
                    position,
                    // animation: google.maps.Animation.DROP,
                    map,
                    title,
                    optimized: false,
                    scale: 0.1,
                });

                marker.addListener('click', (e) => {
                    if (!mark.classList.contains('open')) {
                        markContent.innerHTML = setMarkerContent(title, place, text, link, images);
                        initSlider();
                        mark.classList.add('open');
                    } else {
                        mark.classList.remove('open');
                        setTimeout(() => {
                            markContent.innerHTML = setMarkerContent(title, place, text, link, images);
                            initSlider();
                            mark.classList.add('open');
                        }, 600);
                    }
                });
            };

            setTimeout(addMarker, 100 * i);
        });

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

    onVisible( '.construction', function ( e ) {
        initMap();
        document.getElementById('map').classList.add('show');
    } );

    function setMarkerContent(title, place, text, link, images) {
        let slides = '';
        images.forEach((img) => {
            slides += `<div class="swiper-slide">
                <div class="mark__img img">
                    <img
                        src="${img}"
                        alt="img"
                    />
                </div>
			</div>`;
        });

        let markFoot = '';
        if (link) {
            markFoot = `<div class="mark__foot">
                <a class="btn" href="${link}">
                  <span>Contact us today to get started on your project.</span></a>
            </div>`;
        }

        let markTitle = '';
        if (title) {
            markTitle = `<div class="mark__title">${title}</div>`;
        }

        let markPlace = '';
        if (place) {
            markPlace = `<div class="mark__place">${place}</div>`;
        }
        let markText = '';
        if (text) {
            markText = `<div class="mark__text">${text}</div>`;
        }

        return `<div class="mark__slider">

                <div class="swiper markSlider_js">
                    <div class="swiper-wrapper">
                        ${slides}
                    </div>
                </div>

				<div class="mark__control">
                    <div class="swiper-control dark">
                        <i class="swiper-arrow icon_arrow_left"></i>
                        <div class="swiper-pagination"></div>
                        <i class="swiper-arrow icon_arrow_right"></i>
                    </div>
				</div>
			</div>

			<div class="mark__body">
                <div class="mark__scrolled">
                    ${markTitle}
                    ${markPlace}
                    ${markText}
                </div>
			</div>
            ${markFoot}
		`;
    }
});

function initSlider() {
    const markSlider = new Swiper('.markSlider_js', {
        slidesPerView: 1,
        spaceBetween: 0,
        speed: 2000,
        loop: true,
        autoplay: {
          delay: 5000,
        },

        navigation: {
            nextEl: '.icon_arrow_right',
            prevEl: '.icon_arrow_left',
        },
        pagination: {
            el: ".mark__control .swiper-pagination",
            type: "fraction",
        },

    });
}
