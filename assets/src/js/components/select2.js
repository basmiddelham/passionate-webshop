import $ from "jquery";
import "select2";

$(document).ready(function() {
    $('#billing_school ').select2({
        theme: 'bootstrap-5',
        allowClear: true
    });
});