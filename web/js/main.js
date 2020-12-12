(function () {


    // iPad and iPod detection
    let isiPad = function () {
        return (navigator.platform.indexOf("iPad") != -1);
    }

    let isiPhone = function () {
        return (
            (navigator.platform.indexOf("iPhone") != -1) ||
            (navigator.platform.indexOf("iPod") != -1)
        );
    }

    // Mobile Menu Clone ( Mobiles/Tablets )
    let mobileMenu = function () {
        if ($(window).width() < 769) {
            $('html,body').addClass('fh5co-overflow');

            if ($('#fh5co-mobile-menu').length < 1) {

                var clone = $('#fh5co-primary-menu').clone().attr({
                    id: 'fh5co-mobile-menu-ul',
                    class: ''
                });
                var cloneLogo = $('#fh5co-logo').clone().attr({
                    id: 'fh5co-logo-mobile',
                    class: ''
                });

                $('<div id="fh5co-logo-mobile-wrap">').append(cloneLogo).insertBefore('#fh5co-header-section');
                $('#fh5co-logo-mobile-wrap').append('<a href="#" id="fh5co-mobile-menu-btn"><i class="ti-menu"></i></a>')
                $('<div id="fh5co-mobile-menu">').append(clone).insertBefore('#fh5co-header-section');

                $('#fh5co-header-section').hide();
                $('#fh5co-logo-mobile-wrap').show();
            } else {
                $('#fh5co-header-section').hide();
                $('#fh5co-logo-mobile-wrap').show();
            }

        } else {

            $('#fh5co-logo-mobile-wrap').hide();
            $('#fh5co-header-section').show();
            $('html,body').removeClass('fh5co-overflow');
            if ($('body').hasClass('fh5co-mobile-menu-visible')) {
                $('body').removeClass('fh5co-mobile-menu-visible');
            }
        }
    };


    // Parallax
    // var scrollBanner = function () {
    //   var scrollPos = $(this).scrollTop();
    //   console.log(scrollPos);
    //   $('.fh5co-hero-intro').css({
    //     'opacity' : 1-(scrollPos/300)
    //   });
    // }


    // Click outside of the Mobile Menu
    const mobileMenuOutsideClick = function () {
        $(document).click(function (e) {
            var container = $("#fh5co-mobile-menu, #fh5co-mobile-menu-btn");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('body').removeClass('fh5co-mobile-menu-visible');
            }
        });
    };


    // Mobile Button Click
    const mobileBtnClick = function () {
        // $('#fh5co-mobile-menu-btn').on('click', function(e){
        $(document).on('click', '#fh5co-mobile-menu-btn', function (e) {
            e.preventDefault();
            if ($('body').hasClass('fh5co-mobile-menu-visible')) {
                $('body').removeClass('fh5co-mobile-menu-visible');
            } else {
                $('body').addClass('fh5co-mobile-menu-visible');
            }

        });
    };


    // Main Menu Superfish
    const mainMenu = function () {

        $('#fh5co-primary-menu').superfish({
            delay: 0,
            animation: {
                opacity: 'show'
            },
            speed: 'fast',
            cssArrows: true,
            disableHI: true
        });

    };

    // Superfish Sub Menu Click ( Mobiles/Tablets )
    const mobileClickSubMenus = function () {

        $('body').on('click', '.fh5co-sub-ddown', function (event) {
            event.preventDefault();
            var $this = $(this),
                li = $this.closest('li');
            li.find('> .fh5co-sub-menu').slideToggle(200);
        });

    };

    // Window Resize
    const windowResize = function () {
        $(window).resize(function () {
            mobileMenu();
        });

    };

    // Window Scroll
    /*var windowScroll = function() {
     $(window).scroll(function() {

     var scrollPos = $(this).scrollTop();
     if ( $('body').hasClass('fh5co-mobile-menu-visible') ) {
     $('body').removeClass('fh5co-mobile-menu-visible');
     }

     if ( $(window).scrollTop() > 70 ) {
     $('#fh5co-header-section').addClass('fh5co-scrolled');
     $('.meb').css('color', '#222');
     $('.designer-box').css('display', 'block');
     } else {
     $('#fh5co-header-section').removeClass('fh5co-scrolled');
     $('.meb').css('color', '#fff');
     $('.designer-box').css('display', 'none');
     }


     // Parallax
     $('.fh5co-hero-intro').css({
     'opacity' : 1-(scrollPos/300)
     });

     });
     };*/

    // Fast Click for ( Mobiles/Tablets )
    var mobileFastClick = function () {
        if (isiPad() && isiPhone()) {
            FastClick.attach(document.body);
        }
    };

    // Easy Repsonsive Tabs
    var responsiveTabs = function () {

        $('#fh5co-tab-feature').easyResponsiveTabs({
            type: 'default',
            width: 'auto',
            fit: true,
            inactive_bg: '',
            active_border_color: '',
            active_content_border_color: '',
            closed: 'accordion',
            tabidentify: 'hor_1'

        });
        $('#fh5co-tab-feature-center').easyResponsiveTabs({
            type: 'default',
            width: 'auto',
            fit: true,
            inactive_bg: '',
            active_border_color: '',
            active_content_border_color: '',
            closed: 'accordion',
            tabidentify: 'hor_1'

        });
        $('#fh5co-tab-feature-vertical').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
            inactive_bg: '',
            active_border_color: '',
            active_content_border_color: '',
            closed: 'accordion',
            tabidentify: 'hor_1'
        });
    };

    // Owl Carousel
    /*var owlCrouselFeatureSlide = function() {

     var owl2 = $('.owl-carousel-2');
     owl2.owlCarousel({
     items: 1,
     loop: true,
     margin: 0,
     lazyLoad: true,
     responsiveClass: true,
     nav: true,
     dots: true,
     smartSpeed: 500,
     navText: [
     "<i class='ti-arrow-left owl-direction'></i>",
     "<i class='ti-arrow-right owl-direction'></i>"
     ],
     responsive: {
     0: {
     items: 1,
     nav: true
     },
     600: {
     items: 1,
     nav: true,
     },
     1000: {
     items: 1,
     nav: true,
     }
     }
     });
     };*/

    // MagnificPopup
    /*var magnifPopup = function() {
     $('.image-popup').magnificPopup({
     type: 'image',
     gallery:{
     enabled:true
     }
     });
     };*/

    $(function () {

        mobileFastClick();
        responsiveTabs();
        mobileMenu();
        mainMenu();
        // magnifPopup();
        mobileBtnClick();
        mobileClickSubMenus();
        mobileMenuOutsideClick();
        // owlCrouselFeatureSlide();
        windowResize();
        // windowScroll();


    });


}());

$(function ($) {

    /*==========================================
     CUSTOM SCRIPTS
     =====================================================*/

    // CUSTOM LINKS SCROLLING FUNCTION

    /*$('a[href*=#]').click(function () {
     if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
     && location.hostname == this.hostname) {
     var $target = $(this.hash);
     $target = $target.length && $target
     || $('[name=' + this.hash.slice(1) + ']');
     if ($target.length) {
     var targetOffset = $target.offset().top;
     $('html,body')
     .animate({ scrollTop: targetOffset }, 800); //set scroll speed here
     return false;
     }
     }
     });*/

    /*==========================================
     SCROLL REVEL SCRIPTS
     =====================================================*/


    window.scrollReveal = new scrollReveal();

    /* кнопка наверх */
    var scr = document.getElementById('scroller');
    window.addEventListener('scroll', function (e) {
        var top = window.pageYOffset; // сколько проскролено
        if (top > 500) {
            scr.style.display = 'block';
        } else {
            scr.style.display = 'none';
        }
    });
    // scr.addEventListener('click', function () {
    // scrollTo(0, 0);
    /*$('body,html').animate({scrollTop: 0}, 3000);
     });*/
    $("#scroller").click(function () {
        // alert('ddd');
        $("body,html").animate({
            scrollTop: 0
        }, 800);
    });
    /*==========================================
     WRITE  YOUR  SCRIPTS BELOW
     =====================================================*/

});
/************/
/*const  mesInp = document.getElementById('mess-name');
function watsapp(){
    mesInp.value = 'watsapp';
}

function viber(){
    mesInp.value = 'viber';
}

function telegram(){
    mesInp.value = 'telegram';
}*/


/**/
// Окно чата/мессенджеров


///
window.onload = () => {
    // блок в шапке с иконками мессенджеров
    $('#ms').show(400);

    let selectedEl;
    const mess =  document.querySelector('#msg-icon');
    mess.onclick = (e) => {
        let el = e.target;
        if(!el) return;
        // console.log(el);
        highlight(el);
    };
    // подсветка
    function highlight(el) {
        if (selectedEl) { // убрать существующую подсветку, если есть
            selectedEl.classList.remove('selected-mess');
        }
        selectedEl = el;
        selectedEl.classList.add('selected-mess'); // подсветить новый li
    }

        ///
    let msgBlock = document.getElementById('msg-block'),
        msgContent = document.getElementById('msg-content'),
        msgImg = document.querySelector('.msg-img'),
        msgClosed = document.querySelector('.msg-closed');
    // несколько задержек
    setTimeout(showMsg, 3000); //  показываем блок с чатом
    setTimeout(showTooltip, 6000); // показываем всплывающую подсказку/приглашение
    setTimeout(rmTooltip, 14000); // скрываем подсказку
    setTimeout(rmMsgAnim, 30000); // выключаем анимацию

    msgContent.addEventListener('click', () => { // разворачиваем окно чата
        if (msgBlock.hasAttribute('data-closed')) { // свернуто
            // msgBlock.style.height = '370px';
            msgBlock.classList.add('msg-opened');
            msgBlock.style.background = 'url(/img/wats-bg.gif)';
            msgBlock.style.boxShadow = '0 0 30px #999';
            msgImg.style.right = '134px';
            msgImg.style.opacity = '0.7';
            msgClosed.style.display = 'none';
            msgBlock.removeAttribute('data-closed');
            showMsg();
        }
    });
//
    const msgClose = document.querySelector('#msg-block button');
    msgClose.addEventListener('click', () => { // сворачиваем окно чата
        if (!msgBlock.hasAttribute('data-closed')) { // окно не свернуто
            msgImg.style.right = '';
            msgImg.style.opacity = '';
            // msgBlock.style.height = '';
            msgBlock.classList.remove('msg-opened');
            msgBlock.style.background = '';
            msgBlock.style.boxShadow = '';
            msgClosed.style.display = '';
            msgBlock.setAttribute('data-closed', '');
        }
    });
//

    msgBlock.addEventListener('mouseover', () => { // по наведению мыши тож прибиваем
        rmTooltip();
    });
};
/* Далее ф-ии */
// показ окна чата с анимацией
const showMsg = () => {
    $('#msg-block').velocity('transition.bounceIn');
    // msgBlock.style.display = 'block';
};
//Всплывающая подсказка над чатом
const showTooltip = () => {
    // if(msgBlock.hasAttribute('data-closed') && !readCookie('msg')) {
        let promise = document.querySelector('audio').play();
        if (promise !== undefined) {
            promise.then(_ => {
                console.log('play!');
            }).catch(err => {
                console.log(err.message);
            });
        }
        $('[data-toggle="tooltip"]').tooltip('show');
        // document.cookie = "msg=1;max-age=3600;path=/"; // куку на час(в течении этого времени больше не будет всплывающих подсказок)
    // }
};
// // убиваем tooltip
const rmTooltip = () => {
    let tltp = document.querySelector('.tooltip');
    if(tltp){
        tltp.remove();
    }
};
//
const rmMsgAnim = () => { // нефиг всю дорогу мерцать
    const bar = document.querySelector('.msg-closed').classList;
    bar.remove('button-anim');
};

// доставание cookie
function readCookie(name) {
    const matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}