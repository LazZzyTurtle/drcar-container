		jQuery(function($){

			$('[id^="framework-meta-box-post-format"]').hide();

			$('input.post-format').each(function(){
                if($(this).is(':checked')){		
                    $('#framework-meta-box-'+$(this).attr('id')).show();
                }
			});
			
			$(document.body).on('click','input.post-format',function(){		 
	            
	            $('[id^="framework-meta-box-post-format"]').hide();
                $('#framework-meta-box-'+$(this).attr('id')).show();
                
               
			});
                        
                        
		})
    //