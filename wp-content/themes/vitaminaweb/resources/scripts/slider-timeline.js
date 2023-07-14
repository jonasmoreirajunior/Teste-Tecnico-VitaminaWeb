import Swiper, { Autoplay } from 'swiper';
import 'swiper/scss';
// import 'swiper/scss/navigation';
// import 'swiper/scss/pagination';

export default function SliderHome() {
  const swiper = new Swiper('.slider-timeline', {
    modules: [Autoplay],
    spaceBetween: 0,
    autoplay: {
      delay: 3000,
    },
    loop: false,
    centeredSlides: true,
    slidesPerView: 1,
    breakpoints: {
      780: {
        slidesPerView: 1,
      },
      1100: {
        slidesPerView: 2,
      },
      1360: {
        slidesPerView: 5,
      }
    }
  });
}
