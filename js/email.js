
var frmvalidator  = new Validator("contact_form");
frmvalidator.addValidation("name","req","Please provide your name");
frmvalidator.addValidation("email","req","Please provide your email");
frmvalidator.addValidation("message","req","Please provide a message");
frmvalidator.addValidation("email","email","Please enter a valid email address");



$(document).ready(function(){
		
	// Message form validation and submission	
	$("#message_submit").click(function(){

		$.ajax ({
			type:"POST",
			url:"/php/sendmail.php",
			data: dataString,
			success: function() 
				{
				currentForm.animate({opacity:0},500,function()
					{
					$(this).hide();
					$("#success_message").css({opacity:0}).show().animate({
						opacity:1
						},500)});
					});
			error: function()
				{
				currentForm.animate({opacity:0},500,function()
					{
					$(this).hide();
					$("#error_message").css({opacity:0}).show().animate({
						opacity:1
						},500)});
					});
				};
			};
		
			