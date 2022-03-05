//Menu functionality
jQuery(document).ready(function ($) {

  //Toggle menu
  $('.menu-btn').on('click', function (e) {
    $(this).toggleClass("active");
    $(this).next('#toggleMenu').toggleClass("open");
  });


  $('.category-filter li').on('click', function () {
    $('.category-filter li').removeClass('active');
    var target = '.' + $(this).data('key');

    if (target == '.all-cage') {
      $(this).addClass("active");
      $('.post').addClass('active');
    } else {
      if ($(this).hasClass('active')) {
        $('.post').removeClass('active');
      } else {
        $(this).addClass("active");
        $('.post').addClass('active');
        $('.post').not(target).removeClass('active');
      }
    }
  });
});
