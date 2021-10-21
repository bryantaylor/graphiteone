export function isMobile() {
  return window.matchMedia('(max-width: 991px)').matches
}

export function createSlider({ wrapper, prevArrow, nextArrow, options }) {
  let slider = null

  if ($(wrapper).length) {
    slider = $(wrapper).slick(options)
    $(prevArrow).click(() => slider.slick('slickPrev'))
    $(nextArrow).click(() => slider.slick('slickNext'))
  }

  return slider
}

function onResize(h1Els, h1Contents) {
  h1Els && h1Els.forEach((el, index) => {
    if (isMobile()) {
      const content = el.innerHTML.replaceAll('&nbsp;', '')
      el.innerHTML = content.trim();
    } else {
      el.innerHTML = h1Contents[index]
    }
  })
}

export function trimElement() {
  let _h1Contents = []
  let _h1Els = null
  const bodyEl = document.querySelector('body.home')

  if (bodyEl) {
    const h1Els = bodyEl.querySelectorAll('header  > .container > h1')
    _h1Els = h1Els
    h1Els && h1Els.forEach(el => {
      _h1Contents.push(el.innerHTML)
    })
  }

  window.addEventListener('resize', () => {
    onResize(_h1Els, _h1Contents)
  })

  if (isMobile()) {
    onResize(_h1Els, _h1Contents)
  }
}

export function activeTab() {
  const activeIndex = $('.active').data('index')
  const contentEls = $('.tabs-content .tab-panel')
  const tabEls = $('.tabs .tab');
  contentEls.eq(activeIndex).show()

  $('.tabs').on('click', '.tab', function (e) {
    const current = $(e.currentTarget)
    const index = current.data('index')
    tabEls.removeClass('active')
    current.addClass('active')
    contentEls.hide().eq(index).show()
  });
}