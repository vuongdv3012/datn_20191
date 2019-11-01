jQuery(document).ready( function() {
    //Đăng ký user
    //$('#input_name_re')
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
                   console.log(response);
                }
            });
        }
   });

   //Request đăng nhập
   jQuery("#signin").click( function() {
      jQuery.ajax({
         type : "post",
         dataType : "json",
         url : myAjax.ajaxurl,
         data : {action: "my_user_like"},
         success: function(response) {
            console.log(response);
         }
      });
   });
});