document.addEventListener('DOMContentLoaded', () => {
  var mainSliderElem = document.querySelector('.main-slider');
  if (mainSliderElem) {
    var mainSlider = new Glide('.main-slider', {
      autoplay: 2500,
      animationDuration: 0,
      gap: 0,
      rewindDuration: 0
    });
    mainSlider.mount();
  }

  var postCarouselElem = document.querySelector('.post-carousel');
  if (postCarouselElem) {
    var postCarousel = new Glide('.post-carousel', {
      perView: 4,
      bound: true,
      gap: 20,
      breakpoints: {
        640: {
          perView: 1,
          peek: {
            before: 16,
            after: 50
          }
        }
      }
    });
    postCarousel.mount();
  }
});
