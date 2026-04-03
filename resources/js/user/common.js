import $ from 'jquery';
$(function() {
    "use strict";

    $('#userLoginForm').validate({
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
            $('#loginForm')[0].submit();
        }

    });

    $('#userProfileUpdateForm').validate({
        rules: {
            name: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Name is required",
            },
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
            $('#userProfileUpdateForm')[0].submit();
        }
    });

    $('#userChangepasswordform').validate({
        rules : {
            password : {
                required : true,
                minlength: 6,
            },
            confirm_password : {
                required : true,
                minlength: 6,
                equalTo: "#password",
            },
        },
        messages: {
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
            $('#userChangepasswordform')[0].submit();
        }
    });



    


});


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

