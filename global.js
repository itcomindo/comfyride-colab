window.addEventListener("DOMContentLoaded", (event) => {
  WebFont.load({
    google: {
      families: ["Mulish:400,700,800,900"],
    },
    active: function () {
      sessionStorage.fonts = true;
      // console.log('fonts loaded semua');
    },
  });

  jQuery(function () {

    /**
    =========================
    *NAME: Start Sticky Header
    *=========================
    */
    const headerpr = jQuery("#headerpr");
    //  when scroll down 100px from top, add class 'sticky' to header else remove class 'sticky'
    jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() > 100) {
        headerpr.addClass("sticky animate__fadeInDown");
      } else {
        headerpr.removeClass("sticky animate__fadeInDown");
      }
    });

    /**
    =========================
    *NAME: Header Menu go to
    *=========================
    */
    const headernav = jQuery("#headernav");
    const headernavli = jQuery("#headernav ul li a");
    const gotocars = jQuery("#gotocars");
    const sectionPrice = jQuery("#sectionPrice");
    //  when click cars, preventDefault then scroll to sectionPrice
    jQuery(gotocars).click(function (e) {
      e.preventDefault();
      jQuery(headernavli).removeClass("current");
      jQuery(this).addClass("current");
      jQuery("html, body").animate(
        {
          scrollTop: sectionPrice.offset().top - 100,
        },
        1000
      );
    });
    const gotocontact = jQuery("#gotocontact");
    const topFooter = jQuery("#topFooter");
    //  when click contact, preventDefault then scroll to topFooter
    jQuery(gotocontact).click(function (e) {
      jQuery(headernavli).removeClass("current");
      jQuery(this).addClass("current");
      e.preventDefault();
      jQuery("html, body").animate(
        {
          scrollTop: topFooter.offset().top - 100,
        },
        1000
      );
    });



    /**
    =========================
    *NAME: Start Mobile Menu
    *=========================
    */
    const mobmenutoggleopen = jQuery("#mobmenutoggleopen");
    const mobmenutoggleclose = jQuery("#mobmenutoggleclose");

    if (jQuery(window).width() < 600) {
      headernav.slideUp().hide();
    } else {
      headernav.slideDown().show();
    }
    // open mobile menu
    jQuery(mobmenutoggleopen).click(function () {
      headernav.slideDown().show();
      mobmenutoggleclose.removeClass("inactive").addClass("active");
      jQuery('body').addClass('no-scroll');
    });
    // close mobile menu
    jQuery(mobmenutoggleclose).click(function () {
      headernav.slideUp();
      mobmenutoggleclose.removeClass("active").addClass("inactive");
      jQuery('body').removeClass('no-scroll');
    });


    if (jQuery(window).width() < 600) {
      jQuery(headernav).click(function () {
        headernav.slideUp();
        mobmenutoggleclose.removeClass("active").addClass("inactive");
        jQuery('body').removeClass('no-scroll');
      });
    } else {
      // do nothing
    }

    /**
        =========================
        *NAME: Start Flickity
        *@todo flickity
        *=========================
        */
    jQuery(".testimoniBoxWr").flickity({
      // options
      cellAlign: "center",
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
