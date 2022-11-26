// Event pada saat link di klik
$('.page-scroll').on('click', function(){
    // Ambil isi href
    var tujuan = $(this).attr('href');
    // Tangkap Elemen YBS
    var elemenTujuan = $(tujuan);
    // Pindahkan Scroll
    $('html, body').animate({
        scrollTop:elemenTujuan.offset().top - 50
    });
    e.preventDefault();
 });
 
// Popover
 $(function (){
    $('[data-bs-toggle="popover"]').popover({
        trigger: 'hover focus'
    });
});
  