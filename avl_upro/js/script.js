jQuery(document).ready(function ($) {

  //fix header
  $(".top-line").sticky({
    topSpacing:0
  });

  //open lang list
  $(document).on('click', '.lang-wrap>a', function (e){
    e.preventDefault();
    $(this).toggleClass('is-open')
  });

  //hide block
  $(document).on('click', '.close-fix', function (e) {
    e.preventDefault();
    $('.fix-block').slideUp();
  });

  //slider
  var swiperBg = new Swiper(".slider-bg", {
    spaceBetween: 15,
    pagination: {
      el: ".bg-pagination",
      type: "progressbar",
    },
  });

  //add class
  $('.dots .dot:first-child').addClass('is-active');

  //change dot
  $(document).on('click', '.slider-bg-wrap .dot', function (e){
    e.preventDefault();
    let item = $(this).index();
    $('.slider-bg-wrap .dot').removeClass('is-active');
    $(this).addClass('is-active');
    swiperBg.slideTo(item);
  });

  //next slide
  $(document).on('click', '.link-wrap .next-btn', function (e){
    e.preventDefault();
    swiperBg.slideNext();
  });

  //change slide
  swiperBg.on('slideChange', function () {
    let index = swiperBg.activeIndex +1;
    $('.slider-bg-wrap .dot').removeClass('is-active');
    $(".slider-bg-wrap .dot:nth-child(" + index + ")").addClass('is-active');
  })

  //slider
  var swiperKnowledge = new Swiper(".knowledge-slider", {
    slidesPerView: 3,
    spaceBetween: 15,
    pagination: {
      el: ".knowledge-pagination",
      type: "progressbar",
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
      },
    },
  });


  //change dot
  $(document).on('click', '.knowledge-slider-wrap .dot', function (e){
    e.preventDefault();
    let item = $(this).index();
    $('.knowledge-slider-wrap .dot').removeClass('is-active');
    $(this).addClass('is-active');
    swiperKnowledge.slideTo(item);
  });

  //change slide
  swiperKnowledge.on('slideChange', function () {
    let index = swiperKnowledge.activeIndex +1;
    $('.knowledge-slider-wrap .dot').removeClass('is-active');
    $(".knowledge-slider-wrap .dot:nth-child(" + index + ")").addClass('is-active');
  })


  //accordion
  $(function() {
    $(".accordion-ul > .accordion-item.is-active").children(".accordion-panel").slideDown();
    $(document).on('click', '.accordion-ul > .accordion-item .accordion-thumb', function (e){
      let item = $(this).closest('.accordion-item').index() + 1;
      $('.services figure picture').removeClass('is-open');
      $(".services figure picture:nth-child("+ item  +")").addClass('is-open');

      $(this).parent('.accordion-item').siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
      $(this).parent('.accordion-item').toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
    })
  });

  /* mob-menu*/
  $(document).on('click', '.open-menu a', function (e){
    e.preventDefault();

    $.fancybox.open( $('#menu-responsive'), {
      touch:false,
      autoFocus:false,
    });
    setTimeout(function() {
      $('html').addClass('is-menu');
    }, 100);

  });

  /*close mob menu*/
  $(document).on('click', '.close-menu a', function (e){
    e.preventDefault();
    $.fancybox.close();
    $('html').removeClass('is-menu');
  });


  //sub-menu open/close - mob-menu
  $(document).on('click', '.mob-menu .menu-item-has-children>i', function (e){
    e.preventDefault();
    let item = $(this).closest('li').find('.sub-menu');
    $(this).toggleClass('is-open');
    if($(this).hasClass('is-open')){
      item.slideDown();
    }else{
      item.slideUp();
    }
  });

  //sub-menu open/close - footer
  $(document).on('click', 'footer .item h6', function (e){
    e.preventDefault();
    let item = $(this).closest('.item').find('ul');
    $(this).toggleClass('is-open');
    if($(this).hasClass('is-open')){
      item.slideDown();
    }else{
      item.slideUp();
    }
  });


  //slider
  var swiperImg = new Swiper(".slider-img", {
    spaceBetween: 15,
    pagination: {
      el: ".img-pagination",
      type: "progressbar",
    },
  });


  //change dot
  $(document).on('click', '.bottom-slider .dot', function (e){
    e.preventDefault();
    let item = $(this).index();
    $('.bottom-slider .dot').removeClass('is-active');
    $(this).addClass('is-active');
    swiperImg.slideTo(item);
  });


  //change slide
  swiperImg.on('slideChange', function () {
    let index = swiperImg.activeIndex +1;
    $('.bottom-slider .dot').removeClass('is-active');
    $(".bottom-slider .dot:nth-child(" + index + ")").addClass('is-active');
  })
});