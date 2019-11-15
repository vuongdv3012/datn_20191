jQuery(document).ready( function() {
    //Đăng ký user
    jQuery("#signup").click( function() {
        status_input = true;
        $('.form-group p').removeClass('warning');
        if( !$('#input_name_re').val() ) {
            $('.input_name_re').addClass('warning');
            status_input = false;
        }
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(!$('#input_email_re').val() || !emailReg.test( $('#input_email_re').val()) ) {
            $('.input_email_re').addClass('warning');
            status_input = false;
        }
        if( !$('#input_pass_re').val() ) {
            $('.input_pass_re').addClass('warning');
            status_input = false;
        }
        if( $('#input_pass_re').val() && ($('#input_re_pass_re').val() !== $('#input_pass_re').val()) ) {
            $('.input_re_pass_re').addClass('warning');
            status_input = false;
        }

        if (status_input === true) {
            jQuery.ajax({
                type : "post",
                dataType : "json",
                url : myAjax.ajaxurl,
                data : {
                    action: "regist_user",
                    username: $('#input_name_re').val(),
                    email: $('#input_email_re').val(),
                    password: $('#input_pass_re').val()
                },
                success: function(response) {
                    if (response == true) {
                        alert("Sign Up Success!!!");
                    } else if (response == 'Email') {
                        alert("Email already exists!!");
                    } else if (response == false) {
                        alert("Sign Up Not Success!");
                    }
                }
            });
        }
   });

    //Request đăng nhập
    jQuery("#signin").click( function() {
        $('.form-group p').removeClass('warning');
        status_input = true;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(!$('#your_email').val() || !emailReg.test( $('#your_email').val()) ) {
            $('.your_email').addClass('warning');
            status_input = false;
        }
        if( !$('#your_pass').val() ) {
            $('.your_pass').addClass('warning');
            status_input = false;
        }
        if (status_input === true) {
            jQuery.ajax({
                type : "post",
                dataType : "json",
                url : myAjax.ajaxurl,
                data : {
                    action: "login_user",
                    email:  $('#your_email').val(),
                    password: $('#your_pass').val(),
                },
                success: function(response) {
                    if (response == true) {
                        alert("Login Success!!!");
                        window.location.replace('/');
                    } else if (response == 'wrong') {
                        alert('Wrong PassWord');
                    } else {
                        alert('Email Have Not Sign Up');
                    }
                }
            });
        }
   });

});