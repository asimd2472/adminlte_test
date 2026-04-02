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
            $('#loginForm')[0].submit();
        }

    });

    $('#profileUpdateForm').validate({
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
            $('#profileUpdateForm')[0].submit();
        }
    });

    $('#changepasswordform').validate({
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
            $('#changepasswordform')[0].submit();
        }
    });



    


});


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

window.checkStatusUsers = function(userId, value) {

    if($("#userId_"+userId).is(":checked")) {
        var value = 1;
    }else{
        var value = 0;
    }
    $.ajax({
        url: base_url+"/admin/checkStatusUsers",
        type: 'POST',
        data: {'userId':userId, value:value},
        beforeSend:function(){
        },
        success: function(data){
            var obj=JSON.parse(data);
            if(obj.status==1){
                toastr.success(obj.msg);
            }else if(obj.status==0){
                toastr.error(obj.msg);
            }
        }
    });

}

window.deleteUser = function(userId) {

        Swal.fire({
            title: "Are you sure?",
            text: "This user will be deleted!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: base_url+"/admin/deleteUser",
                    type: 'DELETE',
                    data: {'userId':userId},
                    beforeSend:function(){
                    },
                    success: function(data){
                        if(data.status==1){
                            toastr.success(data.msg);
                            location.reload();
                        }else if(data.status==0){
                            toastr.error(data.msg);
                        }
                    }
                });
            }
        });
    }