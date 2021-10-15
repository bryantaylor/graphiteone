import { isMobile } from './common'

export function handleToggleMobileTopMenu() {
  $('.menu-icon').click(function() {
    $('.menu-icon').toggleClass('menu-icon-active')
    const menuOpened = $('body').hasClass('mobile-top-menu-opened')    

    if (menuOpened) {
      closeSideNavMenu()
    } else {
      openSideNavMenu()
    }
  })

  $(window).resize(function() {
    const menuOpened = $('body').hasClass('mobile-top-menu-opened')
    if (!isMobile() && menuOpened) {
      closeSideNavMenu()
    }
  })
}

export function handleToggleShowSubMenu() { 
  $('.nav-menu').find('.nav-item').click(function() {
    const activeIndex = $('.nav-menu').find('.nav-item.active').data('index')
    const index = $(this).data('index')
    $(this).removeClass('active')

    if (index !== activeIndex) {
      $('.nav-menu').find('.nav-item').removeClass('active')
      $(this).addClass('active')
    }
  })
}

function closeSideNavMenu() {
  $('.wrap, footer').show().animate({ transform: 'translateX(0)' }, 500)
  $('body').removeClass('mobile-top-menu-opened')
  $('.menu').removeClass('opened')
}

function openSideNavMenu() {
  $('body').addClass('mobile-top-menu-opened')
  $('.menu').addClass('opened')
  $('.wrap, footer').show().animate({ transform: 'translateX(0)' }, 500)
  $('body').removeClass('mobile-top-header-opened')
  $('.top-header-mobile').removeClass('opened')
}
