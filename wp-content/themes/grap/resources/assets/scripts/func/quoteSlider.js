import { createSlider } from './common'

export function createQuoteSlider() {
    const wrapper = '.quote-block .quotes'
    const prevArrow = '.quote-block .nav-icon.prev'
    const nextArrow = '.quote-block .nav-icon.next'
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