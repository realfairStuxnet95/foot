$(document).ready(function(){
	$("#frm_register").submit(function(e){
		e.preventDefault();
           $.ajax({  
                url:"register_member",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data)  
                { 
                	if(data.match("200")){
                        alert("Your Account have been created successfully now you can login to view your membership information");
                    }else if(data.match("500")){
                        alert("Something went wrong Please contact the system Administrator for more information");
                    }else{
                        alert(data);
                    } 
                    location.reload();      
                }  
           });
	});
    $("#frm_login").submit(function(e){
        e.preventDefault();
           $.ajax({  
                url:"login_request",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data)  
                { 
                    if(data.match("200")){
                        window.location="profile";
                    }else{
                        alert(data);
                    }       
                }  
           });
    });
});