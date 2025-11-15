import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import $ from "jquery";
import "jquery-mask-plugin";

$(document).ready(function () {
    // Máscara de data+hora
    $('.mask-datetime').mask('00/00/0000 00:00');

    


    // Se quiser uma máscara só de data
    $('.mask-date').mask('00/00/0000');

    // Se quiser uma máscara só de horário
    $('.mask-time').mask('00:00');
});
