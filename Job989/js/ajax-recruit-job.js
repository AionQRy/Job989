jQuery(document).ready(function($) {
    // $( "#form-recruit p.status" ).addClass( "sawadde" );
    // Perform AJAX login on form submit
    $('#form-recruit .status-box').hide();
        $('.bar-success').hide();
    $('#form-recruit').on('submit', function(e){      
        // $('#form-recruit p.status').show().text(recruit_job_system_params.loadingmessage);       
        event.preventDefault();
        // var email = $("#email-login").val();
        // var password = $("#password-login").val();
        var form = "#form-recruit";
        jQuery.ajax({   
            url: recruit_job_system_params.ajaxurl + "?action=recruit_job_system",
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
                        // $('#form-recruit .status-box').addClass('success-box');
                        // $('#form-recruit p.status').show().text(wizard.message); 
                        $('#form-recruit .status-box').hide();
                        $("#form-recruit input").prop('disabled', true);
                        $("#form-recruit textarea").prop('disabled', true);
                        $('.bar-success').show();
                        $('.bar-success').show().addClass('success-box');
                        $('.bar-success p.status').show().text(wizard.message);         
                        $('html, body').animate({
                            scrollTop: $(".bar-success").offset().top
                        }, 1000);            
                        setTimeout(function() {
                            document.location.href = wizard.url;
                        }, 2000);                                       
                    }else{
                        $('#form-recruit .status-box').show();
                        $('#form-recruit .status-box').addClass('warning-box');
                        $('#form-recruit p.status').show().text(wizard.message); 
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