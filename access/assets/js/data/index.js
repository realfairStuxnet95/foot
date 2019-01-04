$(document).ready(function(){
	var input=[];
	$("#frm_add_user").submit(function(e){
		e.preventDefault();
		var names=$("#names").val();
		var email=$("#email").val();
		var phone=$("#phone").val();
		var category=$("#category").val();
		var password=$("#password").val();
		var cpassword=$("#cpassword").val();
		input[0]="save_user";
		input[1]=names;
		input[2]=email;
		input[3]=phone;
		input[4]=category;
		input[5]=password;
		if(password==cpassword){
			if(password.length>=6){
				saveData(input,"dashboard?action=users&status=success");
			}else{
				alert("Password must be atleast 6 Characters.");
			}
		}else{
			alert("Password do not match");
		}
	});
	$("#frm_add_category").submit(function(e){
		e.preventDefault();
		var Category=$("#Category").val();
		var Description=$("#Description").val();
		input[0]="save_category";
		input[1]=Category;
		input[2]=Description;
		saveData(input,"dashboard?action=categories&status=success");
	});
	$("#frm_add_article").submit(function(e){
		e.preventDefault();
		var title=$("#title").val();
		var description=$("#description").val();
		var category=$("#category").val();
		var body=$("#elm1").val();
		var counter=$("#click_counter").val();
		input[0]="save_article";
		input[1]=title;
		input[2]=description;
		input[3]=category;
		input[4]=body;
		input[5]=current_user;
		if(current_article!=null && current_article!=undefined){
			input[0]="update_article";
			input[6]=current_article;
			if(counter==1){
				saveData(input,"add_article?action=edit&article="+current_article);
			}else{
				$("#click_counter").val(1);
				alert("Please Click Again on button to confirm action.");
			}
		}else{
			if(body.length>=10){
				saveData(input,"dashboard?action=articles&status=success");
			}else{
				alert("Please Click Again on button to confirm action.");
			}
		}
		
	});
	$("#frm_change_status").submit(function(e){
		e.preventDefault();
		var status=$("#sel_status").val();
		var action=$("#article").val();
		if(status!=""){
		input[0]="change_article_status";
		input[1]=action;
		input[2]=status;
		if(confirm("You Are about to Change Article. status")){
			saveData(input,"add_article?action=edit&article="+action);
		}
		}else{
			alert("Please select status");
		}
	});
	$("a.btn_publish").click(function(){
		var action=$(this).attr("action");
		input[0]="publish_article";
		input[1]=action;
		if(confirm("You Are about to Publish Article.")){
			saveData(input,"dashboard");
		}
	});
	$("a.btn_unpublish").click(function(){
		var action=$(this).attr("action");
		input[0]="unpublish_article";
		input[1]=action;
		if(confirm("You Are about to Unpublish Article.")){
			saveData(input,"dashboard");
		}
	});
	$("a.btn_trash").click(function(){
		var action=$(this).attr("action");
		input[0]="trash_article";
		input[1]=action;
		if(confirm("You Are about to Delete Article But you can still find it trash.")){
			saveData(input,"dashboard");
		}
	});
	$("a.cmnt_publish").click(function(){
		var action=$(this).attr("action");
		input[0]="publish_comment";
		input[1]=action;
		if(confirm("You Are about to Publish Comment.")){
			saveData(input,"dashboard?action=comments");
		}
	});
	$("a.cmnt_trash").click(function(){
		var action=$(this).attr("action");
		input[0]="trash_comment";
		input[1]=action;
		if(confirm("You Are about to Delete This Comment.")){
			saveData(input,"dashboard?action=comments");
		}
	});
	$("a.cmnt_unpublish").click(function(){
		var action=$(this).attr("action");
		input[0]="unpublish_comment";
		input[1]=action;
		if(confirm("You Are about to Unpublish This Comment.")){
			saveData(input,"dashboard?action=comments");
		}
	});
	//delete banner
	$(".btn_remove_banner").click(function(){
		var action=$(this).attr("action");
		input[0]="delete_banner";
		input[1]=action;
		if(confirm("You Are about to Delete This Banner No Undone Actions.")){
			saveData(input,"dashboard?action=ads");
		}
	});
	$("a.btn_update_banner").click(function(){
		var action=$(this).attr("action");
		$("#banner_id").val(action);
		$("#myModal").modal();
	});
	
	//upload banner
	$("#file").on("change",function(){
		var file=document.getElementById("file").files[0];
		var name = document.getElementById("file").files[0].name;
		var ext = name.split('.').pop().toLowerCase();
	  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
	  {
      $("#file").val("");
	   alert("Invalid Image File");
	  }else{
	  var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('preview');
      output.src = dataURL;
    };
    reader.readAsDataURL(file);
	  }

	});
	$("#frm_add_banner").submit(function(e){
		e.preventDefault();
		var ads_id=$("#ads_id").val();
		var banner=$("#banner_id").val();
		var url='save_banner';
		
       $.ajax({  
            url:url,  
            method:"POST",  
            data:new FormData(this),  
            contentType:false,  
            //cache:false,  
            processData:false,  
            success:function(data)  
            {
              if(data.match("200")){
              	location.reload();
              }else{
              	alert(data);
              }
            }  
       });
	});

	$("#poster").on("change",function(){
		var file=document.getElementById("poster").files[0];
		var name = document.getElementById("poster").files[0].name;
		var ext = name.split('.').pop().toLowerCase();
	  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
	  {
      $("#poster").val("");
	   alert("Invalid Image File");
	  }else{
	  var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('preview');
      output.src = dataURL;
    };
    reader.readAsDataURL(file);
	  }

	});
	//add article poster
	$("#frm_upload_poster").submit(function(e){
		e.preventDefault();
		var article_id=$("#article_id").val();
       $.ajax({  
            url:"save_poster",  
            method:"POST",  
            data:new FormData(this),  
            contentType:false,  
            cache:false,  
            processData:false,  
            success:function(data)  
            {
              if(data.match("200")){
              	location.reload();
              }else{
              	alert(data);
              }
            }  
       });
	});
	//upload multiple documents
	load_documents(current_article);
 $('#multiple_files').change(function(){
	  var error_images = '';
	  var form_data = new FormData();
	  var files = $('#multiple_files')[0].files;
	  if(files.length > 3)
	  {
	   error_images += 'You can not select more than 10 files';
	  }
	  else
	  {
	   for(var i=0; i<files.length; i++)
	   {
	    var name = document.getElementById("multiple_files").files[i].name;
	    var ext = name.split('.').pop().toLowerCase();
	    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
	    {
	     error_images += '<p>Invalid '+i+' File</p>';
	    }
	    var oFReader = new FileReader();
	    oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
	    var f = document.getElementById("multiple_files").files[i];
	    var fsize = f.size||f.fileSize;
	    if(fsize > 2000000)
	    {
	     error_images += '<p>' + i + ' File Size is very big</p>';
	    }
	    else
	    {
	     form_data.append("file[]", document.getElementById('multiple_files').files[i]);
	    }
	   }
	  }
	  if(error_images == '')
	  {
	  	form_data.append("article",current_article);
	   $.ajax({
	    url:"save_document",
	    method:"POST",
	    data: form_data,
	    contentType: false,
	    cache: false,
	    processData: false,
	    beforeSend:function(){
	     $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
	    },   
	    success:function(data)
	    {
	    	if(data.match("200")){
	    		$('#error_multiple_files').html('<br /><label class="text-success">Uploaded.</label>');
	    		load_documents(current_article);
	    	}else{
	    		$('#error_multiple_files').html('<br /><label class="text-success">'+data+'</label>');
	    	}
	    }
	   });
	  }
	  else
	  {
	   $('#multiple_files').val('');
	   $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
	   return false;
	  }
 });

   $("#txt_filter").keydown(function(e){
   		alert(this.value);
   });
   $("#btn_filter").click(function(){
   	alert();
   });
 function load_documents(current_article){
 	$.post("get_documents",{
 		article:current_article
 	},function(response){
 		$("#output_sect").html(response);
 	});
 }

	function saveData(input,redirectUrl){
		var url="save_data";
		$.post(url,{
			input:input
		},function(response){
			if(response.match("200")){
				//alert(response);
				window.location=redirectUrl;
			}else{
				alert(response);
			}
		});
	}
});
