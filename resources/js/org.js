// datetimepicker導入
jQuery.datetimepicker.setLocale('ja');

jQuery('#datetimepicker').datetimepicker({
    minDate:'-1970/01/02'
});
jQuery('#datetimepicker1').datetimepicker({
    minDate:'-1970/01/02'
});
jQuery('#datetimepicker2').datetimepicker({
    minDate:'-1970/01/02'
});
jQuery('#datetimepicker3').datetimepicker({
    minDate:'-1970/01/02'
});
jQuery('#datetimepicker4').datetimepicker({
    minDate:'-1970/01/02'
});

jQuery('#datepicker').datetimepicker({
    timepicker:false,
    maxDate:'+1970/01/01',
    format:'Y年 m月 d日'
});
