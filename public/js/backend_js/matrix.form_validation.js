//gritter message
$(document).ready(function () {          

            setTimeout(function() {
                $('#gritter-item-1').slideUp("slow");
            }, 7000);
});


//change user password
$(document).ready(function(){
	$("#current_Pwd").focusout(function(){
		var current_Pwd = $("#current_Pwd").val();
		//alert(current_Pwd);
		$.ajax({
			type:'get',
			url:'/admin/chkpass',
			data:{current_Pwd:current_Pwd},
			success:function(resp)
			{
				//alert(resp);
				if(resp=="false")
				{
					$('#chkpass').html("<font color='red'>Current Password is incorrect</font>");
				}
				else if(resp=="true")
				{
					$('#chkpass').html("<font color='green'>Current Password is Correct</font>");

				}
			},
			error:function()
			{
				alert('Error');
			}

		});
	});

	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	//add category validattion
	$("#add_category").validate({
		rules:{
			name:{
				required:true
			},
			des:{
				required:true,
				
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});


//add product validattion	
$("#add_product").validate({
		rules:{
			name:{
					required:true
				 },
			code:{
					required:true,
				 },
			color:{
					required:true,
				  },
			des:{
					required:true,
				},
			price:{
					required:true,
					number:true,
				},
			category_id:{
							required:true
						},
				
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
//add product validattion	
$("#edit_product").validate({
		rules:{
			name:{
					required:true
				 },
			code:{
					required:true,
				 },
			color:{
					required:true,
				  },
			des:{
					required:true,
				},
			price:{
					required:true,
					number:true,
				},
			category_id:{
							required:true
						},
				
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});



	//edit category validattion
	$("#edit_category").validate({
		rules:{
			name:{
				required:true
			},
			des:{
				required:true,
				
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_Pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_Pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_Pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_Pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$(".delete").click(function(){
		if(confirm('Are you sure you want to delete this category?'))
		{
			return true;
		}
		return false;
	});
	$(".delete1").click(function(){
		if(confirm('Are you sure you want to delete this product?'))
		{
			return true;
		}
		return false;
	});
});
