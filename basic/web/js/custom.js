/**
 * Resize function without multiple trigger
 *
 * Usage:
 * $(window).smartresize(function(){
 *     // code here
 * });
 */
(function($,sr){
    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
      var timeout;

        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            }

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100);
        };
    };

    // smartresize
    jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');
/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var url = window.location.href.split('?')[0];
var url = url.split('/');
var CURRENT_URL = "/" + url[ url.length-2 ] + "/" + url[ url.length-1 ],
    $BODY         = $('body'),
    $MENU_TOGGLE  = $('#menu_toggle'),
    $SIDEBAR_MENU = $('#main-menu'),
    $MAIN_CONTENT = $('#main-content');

// Sidebar
$(document).ready(function() {
    $('.js-sub-menu-toggle').on('click', function(ev) {
      var $li = $(this).parent();

      if ($li.is('.active')) {
          $li.removeClass('active');

          $li.each(function(index, el) {
            $(el).find('ul').removeClass('open');
            if($(this).find('i').is('.fa-angle-down')) {
              var $el = $(this).find('.fa-angle-down');
              $el.removeClass('fa-angle-down').addClass('fa-angle-left');
            }
          });
      } else {
          // find and close all opened submenus
          $li.parent().each(function(index,el) {
            $(el).find('li').each(function(index,li){
                $(li).find('ul').removeClass('open');
                $(li).removeClass('active');
                var $el = $(li).find('.fa-angle-down');
                $el.removeClass('fa-angle-down').addClass('fa-angle-left');
            });
          });

          // open clicked submenu
          $li.each(function(index, el) {
            $(el).find('ul').addClass('open');
            if($(this).find('i').is('.fa-angle-left')) {
              var $el = $(this).find('.fa-angle-left');
              $el.removeClass('fa-angle-left').addClass('fa-angle-down');
            }
          });

          $li.addClass('active');
      }
    });

    // toggle small or large menu
    $('#menu_toggle').on('click', function() {
        if( $('#menu-bar').is('.oppenedMenu') ) {
          closeMenu();
        }
        else {
          openMenu();
        }
    });

    var closeMenu = function() {
      $('#menu-bar').hide().addClass('closedMenu').removeClass('oppenedMenu');
      $('#main-content').addClass('main-content-full').removeClass('main-content');
    }

    var openMenu = function() {
      $('#menu-bar').show().addClass('oppenedMenu').removeClass('closedMenu');
      $('#main-content').addClass('main-content').removeClass('main-content-full');
    }

    var lastURLItem = CURRENT_URL.split("/");
    if(lastURLItem[ lastURLItem.length-1 ].length) {
      // check active menu
      $('#main-menu').find('li').removeClass('active');
      $('#main-menu').find('.open').removeClass('open');
      $('#main-menu').find('.fa-angle-down').removeClass('fa-angle-down').addClass('fa-angle-left');
      $('#main-menu').find('a[href="' + CURRENT_URL + '"]').parent('li')
                                                            .addClass('active')
                                                            .parent('ul')
                                                            .addClass('open')
                                                            .parent('li')
                                                            .addClass('active')
                                                            .find('.fa-angle-left')
                                                            .removeClass('fa-angle-left')
                                                            .addClass('fa-angle-down');
    }
    // fixed sidebar
    if ($.fn.mCustomScrollbar) {
        $('.menu_fixed').mCustomScrollbar({
            autoHideScrollbar: true,
            theme: 'minimal',
            mouseWheel:{ preventDefault: true }
        });
    }
});
// /Sidebar
function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {
      document.documentElement.requestFullScreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullScreen) {
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.cancelFullScreen) {
      document.cancelFullScreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitCancelFullScreen) {
      document.webkitCancelFullScreen();
    }
  }
}
