$(function () {

    $('.colorpicker1').colorpicker();
    $('.colorpicker1').on('colorpickerChange', function(event) {
        $('.colorpicker1 .fa-square').css('color', event.color.toString());
    });
    
    $('.colorpicker2').colorpicker();
    $('.colorpicker2').on('colorpickerChange', function(event) {
        $('.colorpicker2 .fa-square').css('color', event.color.toString());
    });

});