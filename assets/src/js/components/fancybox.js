import { Fancybox } from "@fancyapps/ui/dist/fancybox/fancybox.esm.js";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

function initFancybox(galleryElement) {
  Fancybox.bind("#" + galleryElement + " a", {
    groupAll: true,
  });
}

document.addEventListener("DOMContentLoaded", () => {
  // Bind all image links with data-fancybox
  Fancybox.bind("[data-fancybox]");

  // Bind all galleries
  const galleries = document.querySelectorAll(".gallery, .swiper");
  galleries.forEach((galleryElement) => {
    initFancybox(galleryElement.id);
  });
});
