<header class="header">

    <div class="container_center">
        <div class="header__row">
            <div class="header__info"><a href="tel:(800)9616220">(800) 961-6220</a><a
                    href="mailto:info@metrodnc.com">info@metrodnc.com</a></div>
            <div class="header__toggle"><i></i><span class="desktop">MENU</span></div>
        </div>
    </div>

    <div class="header__nav">
        <div class="container_center">
            <a class="header__logo img desktop" href="/">
                <img src="/img/logo_h.png" alt="alt" /></a>

            <nav class="header__navbar">
                <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'header',
                        'container' =>'ul',
                    )); 
                ?>
            </nav>

        </div>
    </div>

</header>
