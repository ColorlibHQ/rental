/**
 * Rental front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of Owl Carousel and Magnific Popup that build the same
 * markup, so the theme's stylesheets apply unchanged.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  // Rental shipped Owl Carousel 2.2.1 and its stylesheet, which style <div>
  // arrows and dots (2.3 builds <button>s). Set before any carousel starts,
  // including the Elementor editor script in the testimonial widget.
  if (UI.owl && UI.owl.defaults) UI.owl.defaults.markup = '2.2';

  UI.owl('.review_part_text', {
    items: 2,
    loop: true,
    dots: true,
    autoplay: true,
    margin: 40,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: false,
    responsive: {
      0: { items: 1 },
      480: { items: 1 },
      769: { items: 2 }
    }
  });

  UI.magnific('.popup-youtube, .popup-vimeo', {
    // disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  // menu fixed js code
  window.addEventListener('scroll', function () {
    var fixed = window.pageYOffset + 1 > 50;
    UI.toElements('.main_menu').forEach(function (menu) {
      ['menu_fixed', 'animated', 'fadeInDown'].forEach(function (name) {
        menu.classList.toggle(name, fixed);
      });
    });
  }, { passive: true });

  UI.ready(function () {
    if (document.getElementById('default-select')) {
      UI.enhanceSelects('select');
    }

    // page-scroll: smooth scroll to the link's in-page target, 80px above it
    // to clear the fixed header. A link whose href is not an element on this
    // page is left to the browser, as before.
    UI.toElements('.page-scroll').forEach(function (link) {
      link.addEventListener('click', function (event) {
        var target = null;
        try {
          target = document.querySelector(link.getAttribute('href'));
        } catch (e) { /* not a selector: a URL */ }
        if (!target) return;
        var headerH = 80;
        UI.scrollToY(UI.offset(target).top - headerH, 1500);
        event.preventDefault();
      });
    });
  });
}());
