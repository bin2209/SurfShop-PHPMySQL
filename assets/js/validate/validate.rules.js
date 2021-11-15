$(document).ready(function() {
	if ($.cookie('language')=='en'){
		// ENGLISH
		var phone_invalid = 'Phone number is not valid.';
		var form_required = 'Please fill out this field.';
		var minlength8 = 'Required more than 8 characters.';
	}else{
		// VIETNAMESE
		var phone_invalid = 'Số điện thoại không hợp lệ.'; 
		var form_required = 'Vui lòng điền vào trường này.';
		var minlength8 = 'Yêu cầu 8 kí tự trở lên.';
	}
	$("#change-profile").validate({
		rules: {
			ChangeName:{
				required: true
			},
			ChangePhone:{
				required: true,
				minlength: 10,
				maxlength: 10
			},
			ChangeAddress:{
				required: true
			}
		},
		messages: {
			ChangeName: {
				required: form_required
			},
			ChangePhone: {
				required: form_required,
				minlength: phone_invalid,
				maxlength: phone_invalid
			},
			ChangeAddress:{
				required: form_required
			}
		}
	});

	$("#change-password").validate({
		rules: {
			oldpw:{
				required: true
			},
			newpw:{
				required: true,
				minlength: 8,
			},
			repeatpw:{
				required: true,
				equalTo: "#newpw"
			}
		},
		messages: {
			oldpw: {
				required: form_required
			},
			newpw: {
				required: form_required,
				minlength: minlength8
			},
			repeatpw:{
				required: form_required
			}
		}
	});
});