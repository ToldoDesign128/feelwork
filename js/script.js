jQuery(document).ready(function () {
   //Hamburger menu
   jQuery(".hamburger").click(function () {
      jQuery(".hamburger").toggleClass("is-active");
      jQuery(this)
         .parent()
         .parent()
         .children(".header__menu")
         .toggleClass("open");
   });

   //FAQs section
   jQuery(".faq-container").click(function () {
      jQuery(this).toggleClass("faq-active");
   });

   //Slider Logos
   var swiperLogos = new Swiper(".swiper__logos", {
      grabCursor: true,
      loop: true,
      loopedSlides: 8,
      slidesPerView: "auto",
      speed: 4500,
      autoplay: {
         delay: 0.1,
         disableOnInteraction: false,
      },
   });

   jQuery("main section").last().addClass("last-section");
});
