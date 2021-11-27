$(document).ready(function() {
    if ($.cookie('language') == 'en') {
        // ENGLISH
        var name_invalid = 'Name is not valid.';
        var email_invalid = 'Email address is not valid.';
        var phone_invalid = 'Phone number is not valid.';
        var form_required = 'Please fill out this field.';
        var minlength8 = 'Required more than 8 characters.';
    } else {
        // VIETNAMESE
        var name_invalid = 'Họ tên không hợp lệ.';
        var email_invalid = 'Địa chỉ email không hợp lệ.';
        var phone_invalid = 'Số điện thoại không hợp lệ.';
        var form_required = 'Vui lòng điền vào trường này.';
        var minlength8 = 'Yêu cầu 8 kí tự trở lên.';
    }
    //RULES
    jQuery.validator.addMethod("emailExt", function(value, element, param) {
        return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
    }, email_invalid);


    //ACCOUNT
    $("#change-profile").validate({
        rules: {
            ChangeName: {
                required: true
            },
            ChangePhone: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            ChangeAddress: {
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
            ChangeAddress: {
                required: form_required
            }
        }
    });
    $("#change-password").validate({
        rules: {
            oldpw: {
                required: true
            },
            newpw: {
                required: true,
                minlength: 8,
            },
            repeatpw: {
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
            repeatpw: {
                required: form_required
            }
        }
    });
    //DELIVERY

    $("#Delivery-form").validate({
        rules: {
            FullName: {
                required: true,
            },
            StreetName: {
                required: true,
            },
            calc_shipping_provinces: {
                required: true
            },
            calc_shipping_district: {
                required: true
            },
            Ward: {
                required: true
            },
            Email: {
                required: true,
                emailExt: true
            },
            Phone: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            dieukhoan1: {
                required: true
            },
            dieukhoan2: {
                required: true
            },
            dieukhoan3: {
                required: true
            }
        },
        messages: {
            FullName: {
                required: form_required,
            },
            StreetName: {
                required: form_required
            },
            calc_shipping_provinces: {
                required: form_required
            },
            calc_shipping_district: {
                required: form_required
            },
            Ward: {
                required: form_required
            },
            Email: {
                required: form_required,
            },
            Phone: {
                required: form_required,
                minlength: phone_invalid,
                maxlength: phone_invalid
            },
            dieukhoan1: {
                required: form_required
            },
            dieukhoan2: {
                required: form_required
            },
            dieukhoan3: {
                required: form_required
            }
        }
    });
});