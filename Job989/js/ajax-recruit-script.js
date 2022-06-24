jQuery(document).ready(function($) {
    // $( "#organization-register p.status" ).addClass( "sawadde" );
    // Perform AJAX login on form submit
    $('#organization-register .status-box').hide();
        $('.bar-success').hide();
    $('#organization-register').on('submit', function(e){      
        // $('#organization-register p.status').show().text(recruit_system_params.loadingmessage);       
        event.preventDefault();
        // var email = $("#email-login").val();
        // var password = $("#password-login").val();
        var form = "#organization-register";
        jQuery.ajax({   
            url: recruit_system_params.ajaxurl + "?action=recruit_system",
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
                        // $('#organization-register .status-box').addClass('success-box');
                        // $('#organization-register p.status').show().text(wizard.message); 
                        $('#organization-register .status-box').hide();
                        $("#organization-register input").prop('disabled', true);
                        $('.bar-success').show();
                        $('.bar-success').show().addClass('success-box');
                        $('.bar-success p.status').show().text(wizard.message);                     
                        setTimeout(function() {
                            document.location.href = recruit_system_params.redirecturl;
                        }, 2000);                                       
                    }else{
                        $('#organization-register .status-box').show();
                        $('#organization-register .status-box').addClass('warning-box');
                        $('#organization-register p.status').show().text(wizard.message); 
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