// datetimepicker導入
// jQuery.datetimepicker.setLocale('ja');

// jQuery('.datetimepicker').datetimepicker({
//     minDate:'-1970/01/02'
// });

// jQuery('#datepicker').datetimepicker({
//     timepicker:false,
//     maxDate:'+1970/01/01',
//     format:'Y年 m月 d日'
// });

// jquery-uiのdatepicker
$(".datepicker").datepicker();

$(".datepicker_1").datepicker({
    dateFormat: 'yy/mm/dd',
    changeMonth: true,
    changeYear: true,
    yearRnage: '1910:'
});

$(".datepicker_2").datepicker({
    dateFormat: 'yy/mm/dd',
    changeMonth: true,
    minDate: -1,
});

// 画像設定時の反応
// $('#customFile').on('change',function(){
//     $(this).next('.custom-file-label').html($(this)[0].file[0].name);
// });

// $('#customFile').on('change', ':file', function() {
//     var input = $(this),
//     numFiles = input.get(0).files ? input.get(0).files.length : 1,
//     label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
//     input.parent().parent().next(':text').val(label);
// });

// from-toのdatepicker
// $(".datepicker_3").datepicker({
//     var dateFormat = 'yy/mm/dd',
//         from = $("#from").datepicker({
//               changeMonth: true,
//         })
//         .on( "change", function(){
//             to.datepicker( "option", "minDate", getDate(this) );
//         }),

//         to = $("#to").datepicker({
//             defaultDate: "+1w",
//             changeMonth: true,
//         })
//         .on( "change", function(){
//             to.datepicker( "option", "maxDate", getDate(this) );
//         });

//     function getDate(element) {
//         var date;
//         try {
//             date = $.datepicker.parseDate( dateFormat, element.value );
//         } catch(error) {
//             date = null;
//         }
//         return date;
//     } 
// } );