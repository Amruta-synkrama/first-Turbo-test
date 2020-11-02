<!DOCTYPE html>
<html>
<head>
	<title>Turbores</title>
	<link href="<?php echo base_url(); ?>favicon.png" rel="shortcut icon" type="image/x-icon"/><link href="<?php echo base_url(); ?>favicon2x.png" rel="apple-touch-icon"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<script src="<?php echo base_url(); ?>theme/plugins/jquery/jquery.min.js"></script>
	<!-- jquery-validation -->
	<script src="<?php echo base_url(); ?>theme/plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>theme/plugins/jquery-validation/additional-methods.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url(); ?>assets/js/validator.js"></script> 

	<meta name="google-signin-client_id" content="1017267070363-n9t9eijq5gaji3fgckpj0mddf3gnpqs3.apps.googleusercontent.com">
</head>
<body>
	<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand text-center" href="<?php //echo base_url(); ?>">Turbores</a>
		</div>
	</nav> -->
	<div class="loader" ></div>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			jQuery(function($){
				$('.loader').delay(2300).fadeOut('slow');
			}); 
		});

		// window.fbAsyncInit = function() {
		//     // FB JavaScript SDK configuration and setup
		//     FB.init({
		//       appId      : '400442397631657', // FB App ID
		//       cookie     : true,  // enable cookies to allow the server to access the session
		//       xfbml      : true,  // parse social plugins on this page
		//       version    : 'v8.0' // use graph api version 2.8
		//     });
    
		//     // Check whether the user already logged in
		//     FB.getLoginStatus(function(response) {
		//         if (response.status === 'connected') {
		//             //display user data
		//             getFbUserData();
		//         }
		//     });
		// };

		// // Load the JavaScript SDK asynchronously
		// (function(d, s, id) {
		//     var js, fjs = d.getElementsByTagName(s)[0];
		//     if (d.getElementById(id)) return;
		//     js = d.createElement(s); js.id = id;
		//     js.src = "//connect.facebook.net/en_US/sdk.js";
		//     fjs.parentNode.insertBefore(js, fjs);
		// }(document, 'script', 'facebook-jssdk'));

		// // Facebook login with JavaScript SDK
		// function fbLogin() {
		//     FB.login(function (response) {
		//         if (response.authResponse) {
		//             // Get and display the user profile data
		//             getFbUserData();
		//         } else {
		//             document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
		//         }
		//     }, {scope: 'email'});
		// }


		// // Logout from facebook
		// function fbLogout() {
		//     FB.logout(function() {
		//         document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
		//         document.getElementById('fbLink').innerHTML = '<img src="images/fb-login-btn.png"/>';
		//         document.getElementById('userData').innerHTML = '';
		//         document.getElementById('status').innerHTML = '<p>You have successfully logout from Facebook.</p>';
		//     });
		// }

		// function saveUserData(userData){
		//     // $.post('login', {oauth_provider:'facebook',userData: JSON.stringify(userData)}, function(){ return true; });

		//     $.ajax({
		//         url: '<?php// echo site_url('login'); ?>',
		//         type: 'POST',
		//         data: {
		//             oauth_provider:'facebook',userData: JSON.stringify(userData)
		//         },
		//         dataType: 'json',
		//         success: function(data) {
		//             console.log(data);
		//         }
		//     });

		//     // console.log(userData)

		// }

		// Fetch the user profile data from facebook
		// function getFbUserData(){
		//     FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
		//     function (response) {
		//         // document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
		//         // document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
		//         document.getElementById('status').innerHTML = '<p>Thanks for logging in, ' + response.first_name + '!</p>';
		//         document.getElementById('userData').innerHTML = '<h2>Facebook Profile Details</h2><p><img src="'+response.picture.data.url+'"/></p><p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
				
		//         // Save user data
		//         saveUserData(response);
		//     });
		// }

  	function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
	    // console.log('statusChangeCallback');
	    // console.log(response);                   // The current login status of the person.
	    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
	      getFbUserData();  
	    } else {                                 // Not logged into your webpage or we are unable to tell.
	      // document.getElementById('status').innerHTML = 'Please log ' +
	      //   'into this webpage.';
	    }
  	}


  	function fbLogin() {
	    FB.login(function (response) {
	        if (response.authResponse) {
	            // Get and display the user profile data
	            getFbUserData();
	        } else {
	            // document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
	        }
	    }, {scope: 'email'});
	}


	function checkLoginState() {               // Called when a person is finished with the Login Button.
		FB.getLoginStatus(function(response) {   // See the onlogin handler
			statusChangeCallback(response);
		});
	}


  	window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '400442397631657',
	      cookie     : true,                     // Enable cookies to allow the server to access the session.
	      xfbml      : true,                     // Parse social plugins on this webpage.
	      version    : 'v8.0'           // Use this Graph API version for this call.
	    });


	    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
	      statusChangeCallback(response);        // Returns the login status.
	    });
  	};
 
	function getFbUserData() { 
		// Testing Graph API after login.  See statusChangeCallback() for when this call is made.
		FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
		    function (response) {
		    saveUserData(response);
		});
	}

	function saveUserData(userData){
		$.ajax({
		    url: '<?php echo site_url('login'); ?>',
		    type: 'POST',
		    data: {userData: JSON.stringify(userData)},
		    dataType: 'json',
		    success: function(data) {
		    	console.log(data.code);
		    	if (data.code == 404) {
		    		signOut();
		    		return;
		    	}
		    	location.reload();
		    }
		});
	}



	// Render Google Sign-in button
	function renderButton() {
	    gapi.signin2.render('gSignIn', {
	        'scope': 'profile email',
	        // 'width': 240,
	        // 'height': 50,
	        'longtitle': true,
	        'theme': 'dark',
	        'onsuccess': onSuccess,
	        'onfailure': onFailure
	    });
	}

	
	// Sign-in success callback
	function onSuccess(googleUser) {
	    // Get the Google profile data (basic)
	    //var profile = googleUser.getBasicProfile();
	    
	    // Retrieve the Google account data
	    gapi.client.load('oauth2', 'v2', function () {
	        var request = gapi.client.oauth2.userinfo.get({
	            'userId': 'me'
	        });
	        request.execute(function (resp) {
	            // Save user data
	            saveUserData(resp);
	        });
	    });
	}

	// Sign-in failure callback
	function onFailure(error) {
	    alert(error);
	}

	// Sign out the user
	function signOut() {
	  var auth2 = gapi.auth2.getAuthInstance();
	  auth2.signOut();
	  auth2.disconnect();
	}

</script>
	<style>
		.loader {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url('<?php echo base_url(); ?>assets/img/turbo-res-gif.gif') 50% 50% no-repeat #fff; /* Change the #fff here to your background color of choice for the preloader fullscreen section */
		}
		.elementor-editor-active .loader{
			display: none;
		}
		.social-login{text-align: center;}
		.social-login a:hover{color: #fff;}
     	 input:hover,
		}
		.btn:hover {
          opacity: 1;
        }
        .fb {
          background: #3B5998;
          color: white;
        }
		/*.google {
          background: #dd4b39;
          color: white;
        }*/
	</style>

	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-sm-3 mt-5 mb-5 pt-3 pb-3 form-wrap">
				<div class="container">
					<div class="text-center mb-5">
						<a class="navbar-brand text-center" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/site-logo.png" alt="Turbores Logo" class="brand-image"></a>
					</div>
					<h2>Login</h2>
					<hr>
					<?php
					if($this->session->flashdata('message'))
					{
						echo '
						<div class="alert alert-danger">
						'.$this->session->flashdata("message").'
						</div>
						';
					}
					?>
					<?php
					if($this->session->flashdata('success_message'))
					{
						echo '
						<div class="alert alert-success">
						'.$this->session->flashdata("success_message").'
						</div>
						';
					}
					?>
					<?php if(!empty(validation_errors())) : ?>
						<div class="row">
							<div class="col-12">
								<div class="alert alert-danger">
									<?php echo validation_errors(); ?>
								</div>		
							</div>
						</div>
					<?php endif; ?>
					<form action="<?php echo base_url(); ?>login/validation" method="post" class="login">
						<div class="form-group">
							<label><strong>Email</strong></label>
							<input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email') ?>">
						</div>
						<div class="form-group">
							<label><strong>Password</strong></label>
							<input type="password" name="password" id="password" class="form-control" value="">
						</div>
						<div class="row">
							<div class="col-12 col-sm-4 ">
								<button type="submit" class="btn btn-primary login"><strong>Login</strong></button>
							</div>
							<div class="col-12 col-sm-8 text-right">
								<a href="<?php echo base_url(); ?>login/forgot_password">Forgot Password?</a>
							</div> 
						</div>
					</form>
					<div class="social-login">
						<!-- <fb:login-button scope="public_profile,email" class="fb btn" onlogin="checkLoginState();">
						</fb:login-button> -->
						<a href="javascript:void(0)" class="fb btn" onclick="fbLogin();">Login with Facebook</a>
						<!-- <a href="<?php// echo $google_login_btn ?>" class="google btn">Login with Google+</a> -->
						<a href="JavaScript:void(0);" id="gSignIn" class="btn">Login with Google+</a>

						<!-- <button onclick="signOut();">Logout</button> -->
					 	<!-- Display Google sign-in button -->
						<!-- <div id="gSignIn"></div> -->
						<!-- Show the user profile details -->
						<!-- <div class="userContent" style="display: none;"></div> -->

					</div>
				</div>
			</div>
		</div>
	</div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
	<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
</body>
</html>