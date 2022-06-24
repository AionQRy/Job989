jQuery(document).ready(function($) {
    // $( "#form-register p.status" ).addClass( "sawadde" );
    // Perform AJAX login on form submit
    $('#form-register .status-box').hide();
        $('.bar-success').hide();
    $('#form-register').on('submit', function(e){      
        // $('#form-register p.status').show().text(register_system_params.loadingmessage);       
        event.preventDefault();
        // var email = $("#email-login").val();
        // var password = $("#password-login").val();
        var form = "#form-register";
        jQuery.ajax({   
            url: register_system_params.ajaxurl + "?action=register_system",
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
                        // $('#form-register .status-box').addClass('success-box');
                        // $('#form-register p.status').show().text(wizard.message); 
                        $('#form-register .status-box').hide();
                        $("#form-register input").prop('disabled', true);
                        $('.bar-success').show();
                        $('.bar-success').show().addClass('success-box');
                        $('.bar-success p.status').show().text(wizard.message);                     
                        setTimeout(function() {
                            document.location.href = register_system_params.redirecturl;
                        }, 2000);                                       
                    }else{
                        $('#form-register .status-box').show();
                        $('#form-register .status-box').addClass('warning-box');
                        $('#form-register p.status').show().text(wizard.message); 
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