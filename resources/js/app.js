require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';
// import 'jquery-timepicker/jquery.timepicker.js';


$('.datepicker').datepicker();

// $('.timepicker').timepicker({
//     timeFormat: 'h:mm p',
//     interval: 30,
//     minTime: '17',
//     maxTime: '20:00',
//     defaultTime: '11',
//     startTime: '17:00',
//     dynamic: false,
//     dropdown: true,
//     scrollbar: true
// });
