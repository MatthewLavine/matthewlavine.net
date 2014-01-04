var badName = false;
var badEmail = false;
var badMessage = false;
var successMessage = false;

function resetContact() {
	document.forms["contactForm"].reset();
	$("*").removeClass("has-error");
	$("*").removeClass("has-success");
	$(".label-danger").remove();

	badName = false;
	badEmail = false;
	badMessage = false;
}

function validateContact() {
	if(successMessage){
		return false;
	}
	var error = false;

	//Name Check
	if(document.forms["contactForm"]["name"].value.trim() == "") {
		if(badName == false){
			$("#name").addClass("focusMe");
			$("#name").parent().addClass("has-error");
			$("#name").parent().append("<span class='label label-danger'>No Name Given</span>");
		}
		badName = true;
		error = true;		
	} else {
		badName = false;
		$("#name").removeClass("focusMe");
		$("#name").parent().removeClass("has-error");
		$("#name").parent().addClass("has-success");
		$("#name").parent().find(".label-danger").remove();
	}		
		
	//Email Check
	var x=document.forms["contactForm"]["email"].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");

	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		if(badEmail == false){
			$("#email").addClass("focusMe");
			$("#email").parent().addClass("has-error");
			$("#email").parent().append("<span class='label label-danger'>Missing or Invalid Email</span>");
		}
		badEmail = true;
		error = true;
	} else {
		badEmail = false;
		$("#name").removeClass("focusMe");
		$("#email").parent().removeClass("has-error");
		$("#email").parent().addClass("has-success");
		$("#email").parent().find(".label-danger").remove();
	}		

	//Message Check
	if(document.forms["contactForm"]["message"].value.trim() == "") {
		if(badMessage == false){
			$("#message").addClass("focusMe");
			$("#message").parent().addClass("has-error");
			$("#message").parent().append("<span class='label label-danger'>No Message Given</span>");
		}
		badMessage = true;
		error = true;		
	} else {
		badMessage = false;
		$("#message").removeClass("focusMe");
		$("#message").parent().removeClass("has-error");
		$("#message").parent().addClass("has-success");
		$("#message").parent().find(".label-danger").remove();
	}		

	if(error == false) {

		$("#submitButton").button('loading');

		successMessage = true;

    	$("#formStatus").fadeOut(0);
		$("#formStatus").css("color","green");
		$("#formStatus").append("Email Sending...");
    	$("#formStatus").fadeIn();

		var data = {
    		name: $("#name").val(),
    		email: $("#email").val(),
    		message: $("#message").val()
		};

		$.ajax({
    		type: "POST",
    		url: 'submitContact.php',
    		data: data,
    		success: function(){
    			$("#formStatus").fadeOut(100);

    			setTimeout(function() {
    				$("#formStatus").empty();
					$("#formStatus").append("Email Sent!");
    				$("#formStatus").fadeIn(100);
    			}, 100);

    			$("#submitButton").button('complete');
				$("#submitButton").removeClass("btn-primary");
				$("#submitButton").addClass("btn-success");

				setTimeout(function() {
    				$("#formStatus").fadeOut(100);

					setTimeout(function() {
    					$("#formStatus").empty();
						$("#formStatus").css("color", "");
						successMessage = false;
					}, 200);

    				$("#submitButton").button('reset');
					$("#submitButton").removeClass("btn-success");
					$("#submitButton").addClass("btn-primary");
					resetContact();
				}, 2000);
    		}
		});

		return true;

	} else {
		return false;
	}
}
