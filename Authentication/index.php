<!DOCTYPE html>
<html>
	<head>
		<title>FIREBASE LOGIN SYSTEM</title>
		<script src="https://www.gstatic.com/firebasejs/ui/4.7.1/firebase-ui-auth.js"></script>
		<link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.7.1/firebase-ui-auth.css" />
		<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-app.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-analytics.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-auth.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-firestore.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://kit.fontawesome.com/e55efccdcb.js" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<style>
			*{
				box-sizing:border-box;
			}
			body{
				background-color:;
			}
			.sub-head{
				font-size:20px;
			}
			@media (prefers-reduced-motion: reduce){
				.carousel-item {
					transition: transform 2s ease, opacity .5s ease-out;
				}
			}
			.progress-bar-animated {
				animation: progress-bar-stripes 1s linear infinite !important;
			}
			#pg{
				transition:0.5s ease;
			}
			#prog_bar{
				position:relative;
				margin-top:50px;
			}
			.progress_icon{
				position:absolute;
				background-color:#f1f1f1;
				padding:12px;
				border:2px solid transparent;
				border-radius:50%;
				bottom:-150%;
			}
			#mobile{
				left:25%;
			}
			#sms{
				left:50%;
			}
			#key{
				left:75%;
			}
			#form{
				margin-top:50px;
				text-align: -webkit-center;
			}
			.form_heading{
				font-size:20px;
			}
			.phone_ip{
				border:none;
				border-bottom:3px solid black !important;
				box-shadow:none !important;
				position:relative;
				border-radius:0px !important;
			}
			.form-group{
				position:relative;
			}
			.phone_group:after{
				content:'';
				height:3px;
				width:0%;
				bottom:0%;
				left:0%;
				position:absolute;
				background-color:#5cb85c;
				transition:0.3s ease;	
			}
			#phone_label{
				position:absolute;
				top:0%;
				z-index:5;
				font-size:14px;
				color:gray;
				left:0%;
				transition:0.5s ease;
			}
			.danger_red:after{
				background-color:red;
			}
			.change:after{
				width:100%;
			} 
			#form .phone_group .value{
				top: -45% !important;
				font-size: 15px !important;
				color:#5cb85c;
			}
			.code_input input{
				border:none;
				border-bottom:2px solid black !important;
				box-shadow:none !important;
				position:relative;
				width:5%;
				outline:none;
				display:inline-block;
				margin-right:15px;
				border-radius:0px !important;
			}
		</style>
	</head>
	<body>
	<div class="bg-primary p-2">
			<div class="display-4 text-center text-white">SMS Verification</div>
	</div>
		
	<div class="mt-4">
			<div class="font-weight-bold text-center sub-head">A Simple Three Steps Verification Process</div>
	</div>
	
	<div id="prog_bar">
			<div class="progress " >
				<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" id="pg" style="width:0%"></div>
			</div>
			<div class="progress_icon" id="mobile"><i class="fas fa-mobile-alt fa-2x"></i></div>
			<div class="progress_icon" id="sms"><i class="fas fa-sms fa-2x"></i></div>
			<div class="progress_icon" id="key"><i class="fas fa-key fa-2x"></i></div>
	</div>
	<div class="container">
		
		
		
		
		<div id="form">
			<div class="text-center font-weight-bold form_heading">Setup Your Phone</div>
			
			<div class="lead text-center mt-3">We will send you a SMS to the entered number</div>
			
			<div class="form-group w-50 phone_group mt-4">	
				<span id="phone_label" onclick="upper_half()">Enter Phone Number: </span>
				<input type="text" class="form-control phone_ip" onkeyup="checkField()"  id="ph_number">
			</div>
			<div id="recaptcha-container"></div>
			<button class="btn btn-primary mt-4" id="otp_btn" onclick="otp_sender()" disabled>Send Code</button>
		</div>
		<div class="verification mt-4 text-center">
			<div class="text-center font-weight-bold form_heading">Message Sent To Your Phone</div>
			<div class="lead text-center mt-3">Enter Six digit Code Sent to your mobile</div>
			<div class="six_blank mt-4">
				<span class="code_input "><input type="text" onkeyup="next_focus(event,'c_2')" class="text-center" maxlength="1" id="c_1" required></span>
				<span class="code_input"><input type="text" onkeyup="next_focus(event,'c_3')" class="text-center" maxlength="1" id="c_2" required></span>
				<span class="code_input"><input type="text" onkeyup="next_focus(event,'c_4')" class="text-center" maxlength="1" id="c_3" required></span>
				<span class="code_input"><input type="text" onkeyup="next_focus(event,'c_5')" class="text-center" maxlength="1" id="c_4" required></span>
				<span class="code_input"><input type="text" onkeyup="next_focus(event,'c_6')" class="text-center" maxlength="1" id="c_5" required></span>
				<span class="code_input"><input type="text"  onkeyup="next_focus(event,'last')" class="text-center" maxlength="1" id="c_6" required></span>
			</div>
			<button class="btn btn-primary mt-4" onclick="otp_verification()" id="verify_btn" disabled>Verify Me</button>
		</div>
		<div class="verified mt-4 text-center">
			<i class="fas fa-check-circle fa-3x text-success"></i>
			<div class="text-center font-weight-bold form_heading mt-4">Successfully Verified Your Number</div>
			
		</div>		
				
				
			
			
			
	</div>
	</body>
	<script>
			$('.verified').hide();
			$('.verification').hide();
			function next_focus(event,id){
				let code = document.getElementById(event.target.id).value;
				let ch = code.charCodeAt();
				let c1 = document.getElementById('c_1').value;
				let c2 = document.getElementById('c_2').value;
				let c3 = document.getElementById('c_3').value;
				let c4 = document.getElementById('c_4').value;
				let c5 = document.getElementById('c_5').value;
				let c6 = document.getElementById('c_6').value;
				var otp_code = c1+c2+c3+c4+c5+c6;
				otp_code = Number(otp_code);
				if(ch>=48 && ch<=57){
					$('#'+id).trigger('focus');
				}
				else{
					
				}
				if(Number.isInteger(otp_code) && c1!="" && c2!="" && c3!="" && c4!="" && c5!="" && c6!=""){
					$('#verify_btn').removeAttr('disabled');
					$('#pg').css('width','75%');
					$('#key').css('background-color','#5cb85c');
					$('#key').css('color','white');
				}
				else{
					$('#verify_btn').attr('disabled','true');
					$('#pg').css('width','50%');
					$('#key').css('background-color','#f1f1f1');
					$('#key').css('color','black');
				}
				
			}
			let btn_check =0;
			let captchaverifier =0
			function upper_half(callFrom){
				$('#phone_label').addClass('value');
				if(callFrom!="blur"){
					$('.phone_ip').trigger('focus');
				}
			}
			function checkField(){
				$('#phone_label').addClass('value');
				let num = document.getElementById('ph_number').value
				let num_length = num.length;
				num = Number(num);
				if(!Number.isInteger(num) || num=="" || num_length!=10){
					$('.phone_group').addClass('danger_red');
					$('#phone_label').addClass('text-danger');
					$('#otp_btn').attr('disabled','true');
					$('#pg').css('width','0%');
					$('#mobile').css('background-color','#f1f1f1');
					$('#mobile').css('color','black');
					btn_check=0;
				}
				else{
					$('.phone_group').removeClass('danger_red');
					$('#phone_label').removeClass('text-danger');
					$('#pg').css('width','25%');
					$('#mobile').css('background-color','#5cb85c');
					$('#mobile').css('color','white');
					btn_check =1;
					if(captchaverifier==1){
						$('#otp_btn').removeAttr('disabled');
					}
				}
				
			}
		$(document).ready(function(){
			
			$('.phone_ip').focus(function(){
				$('.phone_group').addClass('change');
				upper_half("blur");
			});
			$('.phone_ip').blur(function(){
				checkField();
				let num = document.getElementById('ph_number').value
				if(num==""){
					$('#phone_label').removeClass('value');
				}
			});
		})
	</script>
	<script src="verification.js"></script>
</html>
