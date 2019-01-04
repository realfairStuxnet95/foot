$(document).ready(function(){
	var input=[];
	$("#frm_login").submit(function(e){
		e.preventDefault();
		var email=$("#email").val();
		var password=$("#password").val();
		loginRequest(email,password);
	});
});
function showLoader(){
	$("#loader").show();
	$("#div_btn").hide();
	$("#div_forget").hide();
}
function hideLoader(){
	$("#loader").hide();
	$("#div_btn").show();
}
function showErrors(msg){
	hideLoader();
	$("#div_forget").hide();
	$("#errors").show();
	$("#errors").html(msg);
	$("#div_btn").show();
}
function loginRequest(email,password){
	showLoader();
	var url="log_user";
	$.post(url,{
		email:email,
		password:password
	},function(response){
		hideLoader();
		if(response.match("200")){
			window.location="dashboard";
		}else{
			alert(response);
			showErrors(response);
		}
	});
}