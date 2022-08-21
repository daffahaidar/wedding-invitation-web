"use strict";

$(document).ready(function() {
    $('.mainbag').viewScroller({
        useScrollbar: false,
        changeWhenAnim: false
    });
});

            
$('.btn-loading').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 2000);
});



/* ----------------- GALLERY--------------------------*/
$(function(){
        var $gallery = $('.sw-gallery a').simpleLightbox();
        $gallery.on('show.simplelightbox', function(){
            console.log('Requested for showing');
        })
        .on('shown.simplelightbox', function(){
            console.log('Shown');
        })
        .on('close.simplelightbox', function(){
            console.log('Requested for closing');
        })
        .on('closed.simplelightbox', function(){
            console.log('Closed');
        })
        .on('change.simplelightbox', function(){
            console.log('Requested for change');
        })
        .on('next.simplelightbox', function(){
            console.log('Requested for next');
        })
        .on('prev.simplelightbox', function(){
            console.log('Requested for prev');
        })
        .on('nextImageLoaded.simplelightbox', function(){
            console.log('Next image loaded');
        })
        .on('prevImageLoaded.simplelightbox', function(){
            console.log('Prev image loaded');
        })
        .on('changed.simplelightbox', function(){
            console.log('Image changed');
        })
        .on('nextDone.simplelightbox', function(){
            console.log('Image changed to next');
        })
        .on('prevDone.simplelightbox', function(){
            console.log('Image changed to prev');
        })
        .on('error.simplelightbox', function(e){
            console.log('No image found, go to the next/prev');
            console.log(e);
        });
    });

/* --------------------- Guestbook -----------------*/
function btnGuestbook() {
    var valid;  
    valid = validateGuestbook();
    if(valid) {
        jQuery.ajax({
        url: "../action-guestbook",
        data:'id='+$("#id").val()+'&nama='+$("#nama").val()+'&no_telp='+$("#no_telp").val()+'&konfirmasi='+$("#konfirmasi").val()+'&pesan='+$("#pesan").val(),
        type: "POST",
        success:function(data){
            $("#nama").css('background-color','#FFFFFF');
            $("#no_telp").css('background-color','#FFFFFF');
            $("#konfirmasi").css('background-color','#FFFFFF');
            $("#pesan").css('background-color','#FFFFFF');

          $("#formMessages").show();
          $('#myModalAlert').modal({backdrop: 'static', keyboard: false}, 'show');
          $("#formMessages").html(data);
          setTimeout(function(){$('#myModalAlert').modal('hide')},5000);
            //$("#guestbook").trigger("reset");
            $('form :input').val('');
        },
            error:function (){}
        });
    }
}


function validateGuestbook() {
        var valid = true; 
        //
    if(!$("#nama").val()) {
        $("#nama").css('background-color','#FFDFE2');
        valid = false;
    }
    if(!$("#no_telp").val()) {
        $("#no_telp").css('background-color','#FFDFE2');
        valid = false;
    }

    if(!$("#konfirmasi").val()) {
        $("#konfirmasi").css('background-color','#FFDFE2');
        valid = false;
    }

    if(!$("#pesan").val()) {
        $("#pesan").css('background-color','#FFDFE2');
        // jika error
          $("#formMessages").show();
          $('#myModalAlert').modal({backdrop: 'static', keyboard: false}, 'show');
          $("#formMessages").html('Silahkan lengkapi data konfrimasi kehadiran kaka..!');
          setTimeout(function(){$('#myModalAlert').modal('hide')},4000);
        valid = false;
    }
    return valid;
}

// Replace ADD off click right
$('img').bind('contextmenu', function(e){
   return false;
});
