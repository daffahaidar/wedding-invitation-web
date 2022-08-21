"use strict";

/*
$('.nav a').click(function () {
    $('.navbar-collapse').collapse('hide');
});

$(document).ready(function () {
        $('.navbar-collapse.in').collapse('hide');
});
*/

$(window).scroll(function() {
    if($(this).scrollTop()>100) {
        $( ".navbar-me" ).addClass("fixed-me");
        $('.navbar-me').fadeIn(800);
    } else {
        $( ".navbar-me" ).removeClass("fixed-me");
        $('.navbar-me').fadeIn(800);
    }
});


$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});


/*---------- Load more --------------------*/
$(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.show_more_loding').show();
        $.ajax({
            type:'POST',
            url:'../action/ajax_load_product.php',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.postList').append(html);
            }
        });
    });
});



// Tooltips-------------------------------------------------
$('body').tooltip({
    selector: "a[data-toggle=tooltip]"
  });

/*
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})*/

$('.btn-loading').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 2000);
});


/* ---------- CHAT -----------------*/
$(document).ready(function() {
    $("#live_chat").click(function(){
      $("#show_chat").show(100);
    });
});

$(document).ready(function() {
    $("#close_chat").click(function(){
      $("#show_chat").hide(100);
      $("#whatsapp-message-box").trigger("reset");
    });
});


/*---------MODAL AUTO SHOW -------------*/

/* -------- Modal --------------
$('#myModal').modal({
    backdrop: 'static',
    keyboard: false 
})

 $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    
*/
/*----- Panel-----*/
 function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
    }
  $('.panel-group').on('hidden.bs.collapse', toggleIcon);
  $('.panel-group').on('shown.bs.collapse', toggleIcon);
// Smooth scrolling using jQuery easing
$('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
      $('html, body').animate({
        scrollTop: (target.offset().top - 48)
      }, 1000, "easeInOutExpo");
      return false;
    }
  }
});
// Closes responsive
$('.js-scroll-trigger').click(function() {
  $('.navbar-collapse').collapse('hide');
});

/*----- Testimonial -----*/
$(".testimonial-slider").owlCarousel({
    autoplay: true,
    loop: true,
    autoPlay: 2000,
    nav: true,
    margin:25,
    navText: ['<i class="nav-btn prev-slide fa fa-angle-left"></i>','<i class="nav-btn next-slide fa fa-angle-right"></i>'],
    dots: true,
    responsive:{
        320:{items:1,},
        480:{items:1,},
        750:{items:1,},
        950:{items:1,},
        1170:{items:1,},
    }});



/*----- Brand Slider -----*/
$(".powered-slider").owlCarousel({
    autoplay: true,
    loop: true,
    autoPlay: 6000,
    nav: false,
    margin: 30,
    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    dots: true,
    responsive:{
        0:{items:2,},
        480:{items:2,},
        750:{items:3,},
        950:{items:3,},
        1170:{items:3,},
    }});


/*----- Related Slider -----*/
$(".slider-undangan").owlCarousel({
    autoplay: true,
    loop: true,
    autoPlay: 2000,
    nav: false,
    margin:25,
    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    dots: true,
    responsive:{
        320:{items:1,},
        480:{items:2,},
        750:{items:3,},
        950:{items:4,},
        1170:{items:4,},
    }});



/*----- Related Slider -----*/
$(".slider-blog").owlCarousel({
    autoplay: true,
    loop: true,
    autoPlay: 2000,
    nav: false,
    margin:25,
    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    dots: true,
    responsive:{
        320:{items:1,},
        480:{items:2,},
        750:{items:2,},
        950:{items:3,},
        1170:{items:3,},
    }});


/*----- Related Slider -----*/
$(".related-product").owlCarousel({
    autoplay: true,
    loop: true,
    autoPlay: 2000,
    nav: false,
    margin:25,
    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    dots: true,
    responsive:{
        320:{items:1,},
        480:{items:2,},
        750:{items:3,},
        950:{items:4,},
        1170:{items:4,},
    }});


/* --------------------- Contact -----------------*/
function sendContact() {
    var valid;  
    valid = validateContact();
    if(valid) {
        jQuery.ajax({
        url: "action-contact",
        data:'msg_name='+$("#msg_name").val()+'&msg_subject='+$("#msg_subject").val()+'&msg_email='+$("#msg_email").val()+'&msg_content='+$("#msg_content").val(),
        type: "POST",
        success:function(data){
            alert(data);
            $("#sw-contact").trigger("reset");
            $("#msg_name-info").html("");
            $("#msg_email-info").html("");
            $("#msg_subject-info").html("");
            $("#msg_content-info").html("");
            
        /* ------------ RESSET INPUT ------------------ */
            $("#msg_name").css('background-color','#ffffff');
            $("#msg_email").css('background-color','#ffffff');
            $("#msg_subject").css('background-color','#ffffff');
            $("#msg_content").css('background-color','#ffffff');
        },
            error:function (){}
        });
    }
}


function validateContact() {
        var valid = true; 
        //
    if(!$("#msg_name").val()) {
        $("#msg_name-info").html("Nama harus di isi");
        $("#msg_name").css('background-color','#FFDFE2');
        valid = false;
    }
    if(!$("#msg_email").val()) {
        $("#msg_email-info").html("Email wajib di isi");
        $("#msg_email").css('background-color','#FFDFE2');
        valid = false;
    }

   if(!$("#msg_email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        $("#msg_email-info").html("Email tidak dikenali");
        $("#msg_email").css('background-color','#FFDFE2');
        valid = false;
    }

    if(!$("#msg_subject").val()) {
        $("#msg_subject-info").html("Subjek wajib di isi");
        $("#msg_subject").css('background-color','#FFDFE2');
        valid = false;
    }
    if(!$("#msg_content").val()) {
        $("#msg_content-info").html("Pesan wajib di isi");
        $("#msg_content").css('background-color','#FFDFE2');
        valid = false;
    }
    return valid;
}


/* ------------------- Subrcibe ------------------ */
function sendSubclribe() {
    var valid;  
    valid = validateSubscribe();
    if(valid) {
        jQuery.ajax({
        url: "action-subcribe",
        data:'subscribe_name='+$("#subscribe_name").val()+'&subscribe_email='+$("#subscribe_email").val(),
        type: "POST",
        success:function(data){
            alert(data);
            $("#subscribe").trigger("reset");
            $("#subscribe_name").css('background-color','#FFFFFF');
            $("#subscribe_email").css('background-color','#FFFFFF');
        },
            error:function (){}
        });
    }
}


function validateSubscribe() {
    var valid = true;

    if(!$("#subscribe_name").val()) {
        $("#subscribe_name").css('background-color','#FFDFE2');
        valid = false;
    }

    if(!$("#subscribe_email").val()) {
        $("#subscribe_email").css('background-color','#FFDFE2');
        alert("Alamat Email tidak diketahui!!");
        valid = false;
    }

    if(!$("#subscribe_email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))  {
        //$("#subcribe_email-info").html("(required)");
        alert("Alamat Email tidak diketahui!!");
        valid = false;
    }
    return valid;
}


/*--------- REGISTRASI -------------- */
function sendRegister() {
   // alert(data);
    var valid;  
    valid = validateRegister();
    if(valid) {
        jQuery.ajax({
        url: "./action-registrasi",
        data:'user_name='+$("#user_name").val()+'&user_email='+$("#user_email").val()+'&user_password='+$("#user_password").val(),
        type: "POST",
        success : function(pesan){
            
            $("#user_name").css('background-color','#FFFFFF');
            $("#user_email").css('background-color','#FFFFFF');
            $("#user_password").css('background-color','#FFFFFF');
            if(pesan=='ok'){
              $("#formMessages").html(pesan).show();
              $('#myModalAlert').modal({backdrop: 'static', keyboard: false}, 'show');
              $("#form-registrasi").trigger("reset");
              $("#formMessages").html('Selamat Kaka sudah berhasil membuat akun baru silahkan ke menu Login untuk membuat Undangan Digital..!');
              setTimeout(function(){$("#myModalAlert").modal('hide');},7000);
            }
            else{
                // jika error
                $("#formMessages").html(pesan).show();
                $('#myModalAlert').modal({backdrop: 'static', keyboard: false}, 'show');
                setTimeout(function(){$("#myModalAlert").modal('hide');},5000);
            }

        },
            error:function (){}
        });
    }
}

function validateRegister() {
    var valid = true;

    if(!$("#user_name").val()) {
        $("#user_name").css('background-color','#FFDFE2');
        valid = false;
    } else{
        $("#user_name").css('background-color','#FFFFFF');
    }

    if(!$("#user_password").val()) {
        $("#user_password").css('background-color','#FFDFE2');
        valid = false;
    } else{
        $("#user_password").css('background-color','#FFFFFF');
    }


    if(!$("#user_email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))  {
    	 $("#user_email").css('background-color','#FFDFE2');
        //alert("Alamat Email tidak diketahui!!");
        valid = false;
    } 
    return valid;
}

/*--------- LOGIN -------------- */
function btnLogin() {
    var valid;  
    valid = validateLogin();
    if(valid) {
        jQuery.ajax({
        url: "./action-login",
        data:'user_email='+$("#user_email").val()+'&user_password='+$("#user_password").val(),
        type: "POST",
        success : function(pesan){
            //alert(data);
            //$("#subscribe").trigger("reset");
            $("#user_email").css('background-color','#FFFFFF');
            $("#user_password").css('background-color','#FFFFFF');
            if(pesan=='ok'){
              window.location.replace("./dashboard");
            }
            else{
                // jika error
              $("#formMessages").html(pesan).show();
              $('#myModalAlert').modal({backdrop: 'static', keyboard: false}, 'show');
              //setTimeout(function(){$("#myModalAlert").hide();}, 9000);
              setTimeout(function(){$("#myModalAlert").modal('hide');},3000);
              //$("#form-login").trigger("reset");
              $('#user_email').val("");
              $("#formMessages").html(pesan);
              
            }

        },
            error:function (){}
        });
    }
}

function validateLogin() {
    var valid = true;
    if(!$("#user_email").val()) {
        $("#user_email").css('background-color','#FFDFE2');
        //$("#status").html("Alamat Email tidak diketahui!").show();
        valid = false;
    }
    else{
        $("#user_email").css('background-color','#FFFFFF');
    }

    if(!$("#user_email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))  {
        $("#user_email").css('background-color','#FFDFE2');
        valid = false;
    }

    if(!$("#user_password").val()) {
        $("#user_password").css('background-color','#FFDFE2');
        valid = false;
    } else{
        $("#user_password").css('background-color','#FFFFFF');
    }
    return valid;
}


/*--------- FORGOT -------------- */
function btnForgot() {
    var valid;  
    valid = validateForgot();
    if(valid) {
        jQuery.ajax({
        url: "./action-forgot",
        data:'user_email='+$("#user_email").val(),
        type: "POST",
        success : function(pesan){
            //alert(data);
            //$("#subscribe").trigger("reset");
            $("#user_email").css('background-color','#FFFFFF');
            if(pesan=='ok'){
            /* RESSET COLOR */
              $(".icons").css('color','#1b81d8');
              $("#formMessages").css('color','#1b81d8');
            /* RESSET COLOR */
              $("#formMessages").html(pesan).show();
              $('#myModalAlert').modal({backdrop: 'static', keyboard: false}, 'show');
              $("#form-forgot").trigger("reset");
              $("#formMessages").html('Penyetelan Katasandi baru berhasil, Silahkan cek email kaka untuk mengaktifkan akun kembali.!');
            }
            else{
                // jika error
              $(".icons").css('color','#dd4b39');
              $("#formMessages").css('color','#dd4b39');
              $("#formMessages").html(pesan).show();
              $('#myModalAlert').modal({backdrop: 'static', keyboard: false}, 'show');
              $("#formMessages").html(pesan);
              
            }

        },
            error:function (){}
        });
    }
}

function validateForgot() {
    var valid = true;
    if(!$("#user_email").val()) {
        $("#user_email").css('background-color','#FFDFE2');
        //$("#status").html("Alamat Email tidak diketahui!").show();
        valid = false;
    }
    else{
        $("#user_email").css('background-color','#FFFFFF');
    }

    if(!$("#user_email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))  {
        $("#user_email").css('background-color','#FFDFE2');
        valid = false;
    }
    return valid;
}


/* =============  Fomat Uang ==================== */

function formatAngka(angka) {
 if (typeof(angka) != 'string') angka = angka.toString();
 var reg = new RegExp('([0-9]+)([0-9]{3})');
 while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
 return angka;
}

/* =============  Menghitung Biaya Order ==================== */

//$(document).ready(function() {
  //$("#ongkir").on("change", function() {
  function TotalOrder() {
      var price  = parseInt($('#order_price').val());
      var quantity  = parseInt($('.quantity').val());
      //var ongkir =parseInt($('#ongkir').val());

      //$("#ongkir_price").html(ongkir);
      $(".quantity_info").html(quantity);
      $(".price_info").html(formatAngka(price));
      var total_bayar=(price*quantity);
      $("#Tbayar").html(formatAngka(total_bayar));
      $("#Tbayarinput").val(formatAngka(total_bayar));
      
  }



// Replace ADD off click right
$('img').bind('contextmenu', function(e){
    return false;
}); 



/*----- back to top -----*/
  if ($('#show_chat_to_top').length) {
    var scrollTrigger = 300, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#show_chat_to_top').addClass('show', 1000);
            } else {
                $('#show_chat_to_top').removeClass('show', 1000);
            }
        };
        
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}
