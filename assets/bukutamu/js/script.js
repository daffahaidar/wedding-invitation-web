
(function($) {
    /*=================
     FORMAT TANGGAL
    ======================= */
    moment.locale('id'); //set indonesian format

    //output = Senin, 17 Agustus 2020
    var date_resepsi = moment(tanggal_resepsi).format('dddd, Do MMMM YYYY'); 
    var date_sekarang = moment(tanggal_sekarang).format('dddd, Do MMMM YYYY'); 
    $('#tanggal-acara-resepsi').html(date_resepsi);
    $('#tanggal-sekarang-acara').html(date_sekarang);
})(window.jQuery);