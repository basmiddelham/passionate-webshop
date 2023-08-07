import Swiper from 'swiper';
import { Navigation,
  Pagination,
  Autoplay,
  Zoom,
  EffectFade,
} from 'swiper/modules';
Swiper.use([Navigation, Pagination, Autoplay, EffectFade, Zoom]);

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/autoplay';
import 'swiper/css/effect-fade';
import 'swiper/css/zoom';

function initSlideshow(slideshowID, slideshowEffect) {
  new Swiper("#" + slideshowID, {
    loop: true,
    speed: 1200,
    autoHeight: true,
    zoom: true,
    effect: slideshowEffect,
    fadeEffect: {
      crossFade: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 4000,
    },
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const sliders = document.querySelectorAll(".swiper.flexbuilder");
  sliders.forEach((slideshowElement) => {
    const data = JSON.parse(slideshowElement.dataset.slideshow);
    initSlideshow(data.slideshow_ID, data.effect);
  });
});
