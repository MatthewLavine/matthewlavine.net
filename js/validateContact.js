var badName = false;
var badEmail = false;
var badMessage = false;

function resetContact() {
	document.forms["contactForm"].reset();
	$("*").removeClass("has-error");
	$(".label-danger").remove();

	badName = false;
	badEmail = false;
	badMessage = false;
}

function validateContact() {
	var error = false;

	//Name Check
	if(document.forms["contactForm"]["name"].value == "") {
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
		$("#name").parent().removeClass("form-group has-error");
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
		$( "#email").parent().removeClass("form-group has-error");
		$("#email").parent().find(".label-danger").remove();
	}		

	//Message Check
	if(document.forms["contactForm"]["message"].value == "") {
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
		$("#message").parent().removeClass("form-group has-error");
		$("#message").parent().find(".label-danger").remove();
	}		

	if(error == false) {
		document.forms["contactForm"].submit();	
		return true;
	} else {
		return false;
	}
}
