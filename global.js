window.addEventListener('DOMContentLoaded', (event) => {

    WebFont.load({
        google: {
            families: [
                'Mulish:400,700,800,900',
            ]
        },
        active: function () {
            sessionStorage.fonts = true;
            // console.log('fonts loaded semua');
        },
    });

    jQuery(function () {
        const mobmenutoggleopen = jQuery('#mobmenutoggleopen');
        const mobmenutoggleclose = jQuery('#mobmenutoggleclose');
        const headernav = jQuery('#headernav');
        if (jQuery(window).width() < 600) {
            headernav.slideUp().hide();
        } else {
            headernav.slideDown().show();
        }
        // open mobile menu
        jQuery(mobmenutoggleopen).click(function () {
            headernav.slideDown().show();
            mobmenutoggleclose.removeClass('inactive').addClass('active');
        });
        // close mobile menu
        jQuery(mobmenutoggleclose).click(function () {
            headernav.slideUp();
            mobmenutoggleclose.removeClass('active').addClass('inactive');
        });

        /**
        =========================
        *NAME: Start Flickity
        *@todo flickity
        *=========================
        */
        jQuery('.testimoniBoxWr').flickity({
            // options
            cellAlign: 'center',
            contain: true,
            wrapAround: true,
            autoPlay: 3000,
            prevNextButtons: false,
            pageDots: false,
            pauseAutoPlayOnHover: false,
            // draggable: true,
            // freeScroll: false,
            // groupCells: true,
            // groupCells: 1,
            // adaptiveHeight: true,
            // imagesLoaded: true,
            // percentPosition: true,
            // resize: true,
            // setGallerySize: true,
            // watchCSS: true,
        });






    });




});