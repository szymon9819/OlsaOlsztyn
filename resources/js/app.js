require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';
require('jquery-timepicker/jquery.timepicker.js');


$('.datepicker').datepicker();

$('.timepicker').timepicker({
    timeFormat: 'HH:mm',
    interval: 30,
    minTime: '16',
    maxTime: '22',
    defaultTime: '18',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
