// jquery-uiのdatepicker
$( function() {
  $(".datepicker").datepicker({
    changeMonth: true
  })
});


// 誕生日のdatepicker
$( function() {
  $("#birthday_datepicker").datepicker({
    defaultDate: "-20y",
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0"
  })
});


// from X to Yのdatepicker
$( function() {
  // dateFormatがto_datepickerのminDate
  var dateFormat = "yy/mm/dd",
  
  from = $( "#application_datepicker_from" ).datepicker({
    changeMonth: true,
    numberOfMonths: 2
  })
  .on( "change", function(){
    to.datepicker( "option", "minDate", getDate( this ) );
    }),
    
  to = $( "#application_datepicker_to" ).datepicker({
      changeMonth: true,
      numberOfMonths: 2
    })
    // to_datepickerの入力値がfrom_datepickerのmaxDate
    .on( "change", function() {
      from.datepicker( "option", "maxDate", getDate( this ) );
    });
 
    function getDate( element ) {
      var date;
      // try…catch文
      try {
        // 例外エラーが発生するかもしれない処理
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        // 例外エラーが起きた時の処理
        date = null;
      }
 
      return date;
    }
});

$( function() {
  var dateFormat = "yy/mm/dd",
  from = $( "#display_datepicker_from" ).datepicker({
    changeMonth: true,
    numberOfMonths: 2
  })
  .on( "change", function(){
    to.datepicker( "option", "minDate", getDate( this ) );
  }),
    
  to = $( "#display_datepicker_to" ).datepicker({
    changeMonth: true,
    numberOfMonths: 2
  })
  .on( "change", function() {
    from.datepicker( "option", "maxDate", getDate( this ) );
  });
 
  function getDate( element ) {
    var date;
    try {
      date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
      date = null;
    }
    return date;
  }
});



// うまくいってない
$(document).on("change", ".inputFile", function(e) {
  let reader;
  if (e.target.files.length) {
    reader = new FileReader;
    reader.onload = function(e) {
      let userThumbnail;
      userThumbnail = document.getElementsByClassName('outputFile');
      $("#filePreview").addClass("is-active");
      userThumbnail.setAttribute('src', e.target.result);
    };
    return reader.readAsDataURL(e.target.files[0]);
  }
});



