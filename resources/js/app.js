/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// デイトピッカーの設定
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

// タイムピッカーの設定
$('.timepicker').timepicker();



// 画像設定時の反応
// $('#customFile').on('change',function(){
//     $(this).next('.custom-file-label').html($(this)[0].file[0].name);
// });

$('#customFile').on('change', ':file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.parent().parent().next(':text').val(label);
});


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

