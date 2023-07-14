import Swiper, { Autoplay, EffectFade } from 'swiper';
import 'swiper/scss';
import 'swiper/scss/effect-fade';

export default function SliderHome() {
  const swiper = new Swiper('.slider-home', {
    modules: [Autoplay, EffectFade],
    spaceBetween: 0,
    autoplay: {
      delay: 3000,
    },
    loop: false,
    slidesPerView: 1,
    speed: 800,
    effect: 'fade',
  });
}
