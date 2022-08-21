var general = {
  init: function () {
      general.cover();
      general.carousel();
      general.ancor_link();
  },

  cover:function() {
    $('.open_invitation').on('click', function(){
      $(this).parent().parent().parent().slideUp("fast");
      $('body').removeClass('overclosed');
    })
  },

  carousel:function() {
    $('.owl-carousel').owlCarousel({
      margin:0,
      nav:false,
      loop:false,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
    })
  },

  ancor_link: function() {
    var lastId,
    topMenu = $("#bot-menu"),
    topMenuHeight = topMenu.outerHeight()+15,

    menuItems = topMenu.find("a"),

    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });

    $('.nav-link').on('click', function(){
      $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
      }, 500);
    });

    $(window).scroll(function(){
      var fromTop = $(this).scrollTop()+topMenuHeight;

      var cur = scrollItems.map(function(){
        if ($(this).offset().top < fromTop)
          return this;
      });

      cur = cur[cur.length-1];
      var id = cur && cur.length ? cur[0].id : "";

      if (lastId !== id) {
          lastId = id;

          menuItems
            .parent().removeClass("active")
            .end().filter("[href='#"+id+"']").parent().addClass("active");
      }
   });
  }
}

$(document).ready(function () {
  $('body').addClass('overclosed');
  $("html, body").animate({ scrollTop: 0 }, "fast");
  AOS.init();
  general.init()
})