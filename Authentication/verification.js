// Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyDDJpEnyLH5Prb7eDePvAmtz2GT5B3ThTo",
    authDomain: "auth-c42fb.firebaseapp.com",
    databaseURL: "https://auth-c42fb.firebaseio.com",
    projectId: "auth-c42fb",
    storageBucket: "auth-c42fb.appspot.com",
    messagingSenderId: "182632260063",
    appId: "1:182632260063:web:89bb74b8ef07334f1c646a",
    measurementId: "G-0L141WE972"
  };
  // Initialize Firebase
  console.log("First STep Done");
  firebase.initializeApp(firebaseConfig);
  //firebase.analytics();
  
	window.onload = function () {
		render();
	};


	function render() {
		window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container',
			{'callback': (response) => {
			    // reCAPTCHA solved, allow signInWithPhoneNumber.
			    // ...
			    captchaverifier =1;
			   	if(btn_check===1){
			   		$('#otp_btn').removeAttr('disabled');
			   	}
			}
			  });
		recaptchaVerifier.render();
	}
	
	function otp_sender() {
		//get the number
		var phoneNumber = document.getElementById('ph_number').value;
		phoneNumber = "+91 " +phoneNumber;
		console.log(phoneNumber);
		var appVerifier = window.recaptchaVerifier;
		firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
			.then(function (confirmationResult) {
				// SMS sent. Prompt user to type the code from the message, then sign the
				// user in with confirmationResult.confirm(code).
				window.confirmationResult = confirmationResult;
				alert("Message sent");
				phone_num = phoneNumber;
				$('#pg').css('width','50%');
				$('#sms').css('background-color','#5cb85c');
				$('#sms').css('color','white');
				$('#form').hide();
				$('.verification').show();
				//NEXT CODE GOES HERE


			}).catch(function (error) {
			// Error; SMS not sent
			// ...
			alert(error.message)
		});

	}

	function otp_verification() {
		let c1 = document.getElementById('c_1').value;
		let c2 = document.getElementById('c_2').value;
		let c3 = document.getElementById('c_3').value;
		let c4 = document.getElementById('c_4').value;
		let c5 = document.getElementById('c_5').value;
		let c6 = document.getElementById('c_6').value;
		var otp_code = c1+c2+c3+c4+c5+c6;
		confirmationResult.confirm(otp_code).then(function (result) {
			// User signed in successfully.
			var user = result.user;
			// ...
			alert("OTP matches");
			$('#pg').css('width','100%');
			$('.verification').hide();
			$('.verified').show();
			//otp = otp_code;
			//status = 1;

			//Varification successful hence we send status 1 to databse.
			//push_into_DB();

			//NEXT code goes here




		}).catch(function (error) {
			// User couldn't sign in (bad verification code?)
			// ...
			alert(error.message)
			//otp = otp_code;
			//status = 0;

			//IF varification fails we send status 0 to database
			//push_into_DB();
		});
	}