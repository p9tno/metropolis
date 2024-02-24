<!-- begin construction-->
<section class="construction section" id="construction">
    <div class="container_center">
        <h2 class="section__title">Metropolis <span></span> DRAFTING AND CONSTRUCTION</h2>
        <div class="construction__content">
            <div class="map__wrap" id="wrap">
                <div class="map" id="map"></div>
                <div class="mark">
                    <div class="mark__close"></div>
                    <div class="mark__content"></div>
                </div>
            </div>
        </div>
        <script>
        ((g) => {
            var h,
                a,
                k,
                p = 'The Google Maps JavaScript API',
                c = 'google',
                l = 'importLibrary',
                q = '__ib__',
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set(),
                e = new URLSearchParams(),
                u = () =>
                h ||
                (h = new Promise(async (f, n) => {
                    await (a = m.createElement('script'));
                    e.set('libraries', [...r] + '');
                    for (k in g)
                        e.set(
                            k.replace(/[A-Z]/g, (t) => '_' + t[0].toLowerCase()),
                            g[k]
                        );
                    e.set('callback', c + '.maps.' + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => (h = n(Error(p + ' could not load.')));
                    a.nonce = m.querySelector('script[nonce]')?.nonce || '';
                    m.head.append(a);
                }));
            d[l] ? console.warn(p + ' only loads once. Ignoring:', g) : (d[l] = (f, ...n) => r.add(f) && u().then(
            () => d[l](f, ...n)));
        })({
            key: 'AIzaSyBVY9bdJtxFyjxthJGdsXG7G7A6jXPRFJg',
            // v: 'weekly',
            // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
            // Add other bootstrap parameters as needed, using camel case.
        });

        const mapMarkers = [{
                title: '15 Castilian Ct',
                place: 'Thousand Oaks',
                text: '<p>Like most homes that were built as part of a development project in Thousand oaks the kitchen in this home was extremely small and enclosed from all sides with only 2 small pathways leading to it. The first think on the list was to remove the largest wall and opening the spaceto the living area.</p><p>Like most homes that were built as part of a development project in Thousand oaks the kitchen in this home was extremely small and enclosed from all sides with only 2 small pathways leading to it. The first think on the list was to remove the largest wall and opening the spaceto the living area. <a href="">Read More</a></p>',
                link: 'http://frontendie.ru',
                images: ['/img/slide-1.jpg', '/img/slide-2.jpg'],
                icon: '../../img/marker.svg',
                position: {
                    lat: 34.055,
                    lng: -118.367
                },
            },
            {
                title: '413 Cloverleaf Dr.',
                place: 'Monrovia',
                text: '<p>Mid-Century Fusion kitchen remodel and living space additionin Monrovia. A Modern home that wished for more warmth...</p><p>An addition and reconstruction of approx. 750sq. area. That included new kitchen, office, family room and back patio cover area. <a href="">Read More</a></p>',
                link: 'http://frontendie.ru',
                images: ['/img/slide-2.jpg'],
                icon: '../../img/marker2.svg',
                position: {
                    lat: 34.003,
                    lng: -118.252
                },
            },
        ];

        const ram = navigator.deviceMemory;
        const cpu = navigator.hardwareConcurrency;
        </script>
    </div>
</section>
<!-- end construction-->