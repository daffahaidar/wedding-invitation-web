"use strict";
            var Page = (function() {
                var config = {
                        $bookBlock : $( '#sw-bookblock' ),
                        $navNext : $( '#sw-nav-next' ),
                        $navPrev : $( '#sw-nav-prev' ),
                        $navFirst : $( '#sw-nav-first' ),
                        $navLast : $( '#sw-nav-last' )
                    },
                    init = function() {
                        config.$bookBlock.bookblock( {
                            speed : 1000,
                            shadowSides : 0.8,
                            shadowFlip : 0.4
                        } );
                        initEvents();
                    },
                    initEvents = function() {
                        
                        var $slides = config.$bookBlock.children();

                        // add navigation events
                        config.$navNext.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'next' );
                            return false;
                        } );

                        config.$navPrev.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'prev' );
                            return false;
                        } );

                        config.$navFirst.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'first' );
                            return false;
                        } );

                        config.$navLast.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'last' );
                            return false;
                        } );
                        
                        // add swipe events
                        $slides.on( {
                            'swipeleft' : function( event ) {
                                config.$bookBlock.bookblock( 'next' );
                                return false;
                            },
                            'swiperight' : function( event ) {
                                config.$bookBlock.bookblock( 'prev' );
                                return false;
                            }
                        } );

                        // add keyboard events
                        $( document ).keydown( function(e) {
                            var keyCode = e.keyCode || e.which,
                                arrow = {
                                    left : 37,
                                    up : 38,
                                    right : 39,
                                    down : 40
                                };

                            switch (keyCode) {
                                case arrow.left:
                                    config.$bookBlock.bookblock( 'prev' );
                                    break;
                                case arrow.right:
                                    config.$bookBlock.bookblock( 'next' );
                                    break;
                            }
                        } );
                    };

                    return { init : init };

            })();
    
    
    
$('.btn-loading').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 3000);
});

/* ----------------- GALLERY--------------------------*/
    ;( function( $ ) {
        $('.swipebox').swipebox();
    } )( jQuery );

jQuery(function($) {
    $(".swipebox-video").swipebox({
        useCSS : true, // false will force the use of jQuery for animations
        hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
        removeBarsOnMobile : true, // false will show top bar on mobile devices
        hideBarsDelay : 3000, // 0 to always show caption and action bar
        videoMaxWidth : 1140, // videos max width
        beforeOpen: function() {
            audio_pause();
        }, // called before opening
		afterOpen: null, // called after opening
		afterClose: function() {
		    audio_play();
		}, // called after closing
    });
});
function audio_pause(){
    $("#my_audio").get(0).pause(); //pause musik;
}
function audio_play(){
    $("#my_audio").get(0).play(); //play musik;
}
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
            //$("#nama").css('background-color','#FFFFFF');
            //$("#no_telp").css('background-color','#FFFFFF');
            //$("#konfirmasi").css('background-color','#FFFFFF');
            //$("#pesan").css('background-color','#FFFFFF');

          $("#formMessages").show();
          $('#myModalAlert').modal({backdrop: 'static', keyboard: false}, 'show');
          $("#formMessages").html(data);
          setTimeout(function(){$('#myModalAlert').modal('hide')},4000);
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

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


$(document).ready(function() {
$("img").error(function() {
    //$(this).hide();
      // $(this).attr('src', 'https://s11.postimg.org/ryet7q5oj/sw_medium.jpg');
    });
});

// Replace ADD off click right
$('img').bind('contextmenu', function(e){
   return false;
}); 