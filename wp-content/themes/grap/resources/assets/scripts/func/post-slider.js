import { createSlider } from './common'

export function createPostSlider() {
  const wrapper = '.latest-news-block .news'
  const prevArrow = '.latest-news-block .nav-icon.prev'
  const nextArrow = '.latest-news-block .nav-icon.next'
  const options = {
    slideTransition: 'linear',
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    swipeToSlide: true,
    dots: true,
    customPaging: () => $('<span class="dot" />'),
  }
  createSlider({ wrapper, prevArrow, nextArrow, options })
}