

	jQuery('.gform_wrapper form').each( function(){

				jQuery('.gform_body [aria-required="true"]').attr('required', 'required' );


				var _g_form_id =  jQuery(this).attr('id').slice( -1 );

				jQuery('.gform_body [aria-required="true"]').focus( function(){
					window["gf_submitting_" + _g_form_id] = false;
				});

				jQuery('.gform_body [aria-required="true"]').click( function(){
					window["gf_submitting_" + _g_form_id] = false;
				});

			
				jQuery(this).on( 'submit', function(e){


					if( typeof grecaptcha != 'undefined' && grecaptcha.getResponse()== '' )
					{
						window["gf_submitting_" + _g_form_id] = false;
						e.preventDefault();

						alert( 'Please verify that you are not a robot' );
						return;
					}

				});

	} );


	window.initMap = function() {


		

		var uluru = {
		    lat: Number( document.getElementById('map').getAttribute("data-latitude")),
		    lng: Number( document.getElementById('map').getAttribute("data-longitude"))
		};
		var map = new google.maps.Map(document.getElementById('map'), {
		    zoom: 17,
		    center: uluru,
		    disableDefaultUI: true,
		    scrollwheel: false,
		    navigationControl: false,
		    mapTypeControl: false,
		    scaleControl: false,
		    draggable: false,
		    mapTypeId: google.maps.MapTypeId.ROADMAP

		});
		var marker = new google.maps.Marker({
		    position: uluru,
		    map: map
		});

    };	
