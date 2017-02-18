<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>ЗАО "Унипромтех" - {$cur_page.meta_title}</title>
    <meta name="description" content='{$cur_page.meta_description}'>
    <meta name="viewport" content="width=device-width, user-scalable=yes">
    {include file='counters.tpl'}

    <link rel="stylesheet" href="/lib/jQuery-UI/jquery-ui.min.css">
    <link rel="stylesheet" href="/lib/jQuery-UI/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="/lib/jQuery.lightGallery/css/lightgallery.min.css" />
    <link rel="stylesheet" href="/lib/jQuery.lightSlider/css/lightslider.min.css" />

    <link rel="stylesheet" href="/lib/Foundation/css/foundation-flex.css">

    <link rel="stylesheet" href="/css/styles.css?{$ver}">
    <link rel="stylesheet" href="/css/{$template}.css?{$ver}">
</head>
<body>
    <header>
        <div>
            <a id="logo" href="/"><img src="/img/logo.png" alt='ЗАО "Унипромтех"'></a>
            <div id="contacts">
                <a class="phone" href="tel:+74959440266">+7&nbsp;(495)&nbsp;944&#8209;02&#8209;66</a>
                <div class="email">info@unipromteh.com</div>
            </div>
        </div>

    </header>
    <nav>
        <div class="title-bar" data-responsive-toggle="example-animated-menu" data-hide-for="medium">
            <button class="menu-icon" type="button" data-toggle></button>
            <div class="title-bar-title">Menu</div>
        </div>

        <div class="top-bar" id="example-animated-menu" data-animate="hinge-in-from-top spin-out">
            <div class="top-bar-left">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li>
                        <a href="#">One</a>
                        <ul class="menu vertical">
                            <li><a href="#">One</a></li>
                            <li><a href="#">Two</a></li>
                            <li><a href="#">Three</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Two</a></li>
                    <li><a href="#">Three</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main">
        {$content}
    </div>
    <footer>
        <div itemscope itemtype="http://schema.org/Organization">
            <div id="zao" itemprop="name">Закрытое Акционерное Общество "Унипромтех"</div>
            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                <meta itemprop="addressCountry" content="ru" />
                <span itemprop="postalCode">125476</span>,
                <span itemprop="addressLocality">Москва</span>,
                <span itemprop="streetAddress">ул. Василия Петушкова, 27</span>
            </div>
            <div>телефон/факс: <span itemprop="telephone">+7&nbsp;(495)&nbsp;944&#8209;02&#8209;66</span></div>
            <div>e-mail: <span itemprop="email">info@unipromteh.com</span></div>
        </div>
    </footer>
    <div class="background-color-main max-width"></div>

    <script src="/lib/jquery.min.js"></script>
    <script src="/lib/jQuery-UI/jquery-ui.min.js"></script>

    <script src="/lib/jQuery.lightGallery/js/lightgallery.min.js"></script>
    <script src="/lib/jQuery.lightGallery/js/lg-thumbnail.min.js"></script>
    <script src="/lib/jQuery.lightGallery/js/lg-zoom.min.js"></script>
    <script src="/lib/jQuery.lightGallery/js/lg-fullscreen.min.js"></script>
    <script src="/lib/jQuery.lightSlider/js/lightslider.min.js"></script>

    <script src="/lib/what-input/what-input.min.js"></script>
    <script src="/lib/Foundation/dist/js/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>

    <!--[if lt IE 9]>
    <script src="/lib/what-input/lte-IE8.js"></script>
    <script src="//css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="/js/menu.js?{$ver}"></script>
    <script src="/js/sert.js?{$ver}"></script>
    <script src="/js/stars.js?{$ver}" type="text/javascript"></script>
    <!--script src="/js/cloud.js?{$ver}"></script-->

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="/lib/jquery.color.js"></script>
    <script src="/js/{$template}.js?{$ver}" type="text/javascript"></script>
</body>
</html>