import $ from 'jquery';
$(function() {
    "use strict";

    $('#loginForm').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            email: {
                required: "Email is required",
                email: "Enter valid email"
            },
            password: {
                required: "Password is required",
                minlength: "Minimum 6 characters"
            }
        },
        errorElement: 'span',
        errorClass: 'customerror',
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(e) {
            e.preventDefault();
            $('#loginForm')[0].submit();
        }

    });

});


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});