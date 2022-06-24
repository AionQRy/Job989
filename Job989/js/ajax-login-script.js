jQuery(document).ready(function($) {
    // $( "#form-login p.status" ).addClass( "sawadde" );
    // Perform AJAX login on form submit
    $('#form-login .status-box').hide();
        $('.bar-success').hide();
    $('#form-login').on('submit', function(e){      
        // $('#form-login p.status').show().text(login_system_params.loadingmessage);       
        event.preventDefault();
        // var email = $("#email-login").val();
        // var password = $("#password-login").val();
        var form = "#form-login";
        var myacc = {
            'action': 'login_system', //calls wp_ajax_nopriv_ajaxlogin
            'username': $('#email-login').val(), 
            'password': $('#password-login').val(), 
            // 'posts': login_system_params.posts,
            //     'page' : login_system_params.current_page
            
        };
        jQuery.ajax({   
            url: login_system_params.ajaxurl + "?action=login_system",
            data: jQuery(form).serialize(),
            type: 'POST',
            // dataType: 'json',
            success: function(objectresult){
                var data = $.parseJSON(objectresult);
                var wizards = data.results;
                
                if (data.results !='') {
                  wizards.forEach(function (wizard) {
                    if (wizard.loggedin == 'true') {  
                        console.log(objectresult);
                        // $('#form-login .status-box').addClass('success-box');
                        // $('#form-login p.status').show().text(wizard.message); 
                        $('#form-login .status-box').hide();
                        $("#form-login input").prop('disabled', true);
                        $('.bar-success').show();
                        $('.bar-success').show().addClass('success-box');
                        $('.bar-success p.status').show().text(wizard.message);                     
                        setTimeout(function() {
                            document.location.href = login_system_params.redirecturl;
                        }, 2000);                                       
                    }else{
                        $('#form-login .status-box').show();
                        $('#form-login .status-box').addClass('warning-box');
                        $('#form-login p.status').show().text(wizard.message); 
                    }
                  });
                }
            },
            error: function(req, err){
                console.log('my message: ' + err);
                // try {
                //     var output = JSON.parse(data);
                //     alert(output);
                // } catch (e) {
                //     alert("Output is not valid JSON: " + data);
                // }
            }
        });
        e.preventDefault();
    });

});