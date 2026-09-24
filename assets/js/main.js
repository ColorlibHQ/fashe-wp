/**
 * Fashe front-end behaviour, without jQuery: the headers (fixed on scroll,
 * cart dropdown, mobile menu), back to top, the quantity steppers, the
 * product detail panels and the styled sort select.
 *
 * The page used to stay hidden until the window had loaded and then fade in
 * over 1.5 s (animsition). No link used animsition's exit transition, so that
 * fade was all it did; it is gone and the page shows as it loads.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  // An element's content height, as jQuery's .height() measured it.
  function contentHeight(el) {
    var style = window.getComputedStyle(el);
    return el.getBoundingClientRect().height -
      parseFloat(style.paddingTop) - parseFloat(style.paddingBottom) -
      parseFloat(style.borderTopWidth) - parseFloat(style.borderBottomWidth);
  }

  // $(el).parent().find(selector)
  function findInParent(el, selector) {
    return el.parentElement ? UI.toElements(selector, el.parentElement) : [];
  }

  function all(selector, fn) {
    UI.toElements(selector).forEach(fn);
  }

  function windowWidth() {
    return document.documentElement.clientWidth;
  }

  UI.ready(function () {
    // Changing a quantity in the cart enables its Update button.
    all('.quantity > button', function (button) {
      button.addEventListener('click', function () {
        all('.actions button', function (b) { b.removeAttribute('disabled'); });
      });
    });

    /*[ Back to top ]
    ===========================================================*/
    var backToTop = document.getElementById('myBtn');
    if (backToTop) {
      var windowH = document.documentElement.clientHeight / 2;
      window.addEventListener('scroll', function () {
        backToTop.style.display = window.pageYOffset > windowH ? 'flex' : 'none';
      }, { passive: true });
      backToTop.addEventListener('click', function () {
        UI.scrollToY(0, 300);
      });
    }

    /*[ Show header dropdown ]
    ===========================================================*/
    var menu = UI.toElements('.js-show-header-dropdown');
    var subMenuIsShowed = -1;

    function closeDropdowns() {
      menu.forEach(function (item) {
        findInParent(item, '.header-dropdown').forEach(function (d) { d.classList.remove('show-header-dropdown'); });
      });
    }

    menu.forEach(function (item, index) {
      item.addEventListener('click', function () {
        if (index === subMenuIsShowed) {
          subMenuIsShowed = -1;
        } else {
          closeDropdowns();
          subMenuIsShowed = index;
        }
        findInParent(item, '.header-dropdown').forEach(function (d) { d.classList.toggle('show-header-dropdown'); });
      });
    });

    all('.js-show-header-dropdown, .header-dropdown', function (el) {
      el.addEventListener('click', function (event) { event.stopPropagation(); });
    });

    window.addEventListener('click', function () {
      closeDropdowns();
      subMenuIsShowed = -1;
    });

    /*[ Fixed Header ]
    ===========================================================*/
    var topbar = document.querySelector('.topbar');
    var posWrapHeader = topbar ? contentHeight(topbar) : null;
    var menuHeader = UI.toElements('.container-menu-header');
    var header1 = UI.toElements('.header1');
    var header2 = UI.toElements('.header2');
    var fixedHeader2 = UI.toElements('.fixed-header2');

    window.addEventListener('scroll', function () {
      var y = window.pageYOffset;

      if (posWrapHeader !== null && y >= posWrapHeader) {
        header1.forEach(function (h) { h.classList.add('fixed-header'); });
        menuHeader.forEach(function (h) { h.style.top = -posWrapHeader + 'px'; });
      } else {
        menuHeader.forEach(function (h) { h.style.top = -y + 'px'; });
        header1.forEach(function (h) { h.classList.remove('fixed-header'); });
      }

      if (y >= 200 && windowWidth() > 992) {
        fixedHeader2.forEach(function (h) { h.classList.add('show-fixed-header2'); });
        header2.forEach(function (h) {
          h.style.visibility = 'hidden';
          UI.toElements('.header-dropdown', h).forEach(function (d) { d.classList.remove('show-header-dropdown'); });
        });
      } else {
        fixedHeader2.forEach(function (h) {
          h.classList.remove('show-fixed-header2');
          UI.toElements('.header-dropdown', h).forEach(function (d) { d.classList.remove('show-header-dropdown'); });
        });
        header2.forEach(function (h) { h.style.visibility = 'visible'; });
      }
    }, { passive: true });

    /*[ Show menu mobile ]
    ===========================================================*/
    all('.btn-show-menu-mobile', function (button) {
      button.addEventListener('click', function () {
        button.classList.toggle('is-active');
        UI.slide('.wrap-side-menu', 'toggle');
      });
    });

    all('.arrow-main-menu', function (arrow) {
      arrow.addEventListener('click', function () {
        UI.slide(findInParent(arrow, '.sub-menu'), 'toggle');
        arrow.classList.toggle('turn-arrow');
      });
    });

    window.addEventListener('resize', function () {
      if (windowWidth() < 992) return;
      var sideMenu = document.querySelector('.wrap-side-menu');
      if (sideMenu && window.getComputedStyle(sideMenu).display === 'block') {
        all('.wrap-side-menu', function (el) { el.style.display = 'none'; });
        all('.btn-show-menu-mobile', function (el) { el.classList.toggle('is-active'); });
      }
      var subMenu = document.querySelector('.sub-menu');
      if (subMenu && window.getComputedStyle(subMenu).display === 'block') {
        all('.sub-menu', function (el) { el.style.display = 'none'; });
        all('.arrow-main-menu', function (el) { el.classList.remove('turn-arrow'); });
      }
    });

    /*[ remove top noti ]
    ===========================================================*/
    all('.btn-romove-top-noti', function (button) {
      button.addEventListener('click', function () {
        if (button.parentElement) UI.fade(button.parentElement, 'out');
      });
    });

    /*[ Block2 button wishlist ]
    ===========================================================*/
    all('.block2-btn-addwishlist', function (button) {
      button.addEventListener('click', function addToWishlist(e) {
        e.preventDefault();
        button.classList.add('block2-btn-towishlist');
        button.classList.remove('block2-btn-addwishlist');
        button.removeEventListener('click', addToWishlist);
      });
    });

    /*[ +/- num product ]
    ===========================================================*/
    all('.btn-num-product-down', function (button) {
      button.addEventListener('click', function (e) {
        e.preventDefault();
        var input = button.nextElementSibling;
        if (!input) return;
        var numProduct = Number(input.value);
        if (numProduct > 1) input.value = numProduct - 1;
      });
    });

    all('.btn-num-product-up', function (button) {
      button.addEventListener('click', function (e) {
        e.preventDefault();
        var input = button.previousElementSibling;
        if (!input) return;
        input.value = Number(input.value) + 1;
      });
    });

    /*[ Show content Product detail ]
    ===========================================================*/
    all('.active-dropdown-content .js-toggle-dropdown-content', function (el) {
      el.classList.toggle('show-dropdown-content');
    });
    UI.slide('.active-dropdown-content .dropdown-content', 'toggle', 200);

    all('.js-toggle-dropdown-content', function (toggle) {
      toggle.addEventListener('click', function () {
        toggle.classList.toggle('show-dropdown-content');
        UI.slide(findInParent(toggle, '.dropdown-content'), 'toggle', 200);
      });
    });

    /*[ Play video 01]
    ===========================================================*/
    var videoWraps = UI.toElements('.video-mo-01');
    if (videoWraps.length) {
      var frame = null;
      videoWraps.some(function (wrap) {
        frame = Array.prototype.filter.call(wrap.children, function (child) {
          return child.matches('.videoframe');
        })[0] || null;
        return frame;
      });
      var srcOld = frame ? frame.getAttribute('data-videourl') : '';

      all('[data-target="#modal-video-01"]', function (trigger) {
        trigger.addEventListener('click', function () {
          videoWraps.forEach(function (wrap) { wrap.innerHTML = '<iframe src="' + srcOld + '?autoplay=1"></iframe>'; });
          setTimeout(function () {
            videoWraps.forEach(function (wrap) { wrap.style.opacity = '1'; });
          }, 300);
        });
      });

      all('[data-dismiss="modal"]', function (trigger) {
        trigger.addEventListener('click', function () {
          videoWraps.forEach(function (wrap) {
            wrap.innerHTML = '<iframe src="' + srcOld + '"></iframe>';
            wrap.style.opacity = '0';
          });
        });
      });
    }

    /*[ Styled selects ]
    ===========================================================*/
    // Select2 before. The variation selects on a product page stay native:
    // WooCommerce rebuilds and resets their options itself, which a list
    // built once cannot follow. WooCommerce's own selectWoo (checkout
    // country/state) is WooCommerce's business and is left alone.
    UI.enhanceSelects(UI.toElements('.selection-1, .selection-2').filter(function (select) {
      return !select.closest('.variations');
    }));
  });

  // The old script also initialised Slick on the product gallery (.slick3)
  // and the related products (.slick2), but the theme never loaded Slick, so
  // on product pages it threw there instead. WooCommerce's own gallery is
  // what those pages show.
}());
