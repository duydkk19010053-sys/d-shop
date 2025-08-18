$(document).ready(function () {
    
    //register
    $("#register-form").submit(function (e) {
        let name = $('input[name="name"]').val();
        let email = $('input[name="email"]').val();
        let phone = $('input[name="phone"]').val();
        let password = $('input[name="password"]').val();
        let confirmPassword = $('input[name="confirmPassword"]').val();
        let errorMassage = "";

        if(name.length < 3)
        {
            errorMassage += "Họ và tên ít nhất 3 ký tự. <br> "
        }

        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!emailRegex.test(email))
        {
            errorMassage += "Email không hợp lệ. <br>";
        }

        if(password.length <6 )
        {
            errorMassage += "Mật khẩu phải có ít nhất 6 ký tự. <br>";
        }

        if(password != confirmPassword)
        {
            errorMassage += "Mật khẩu nhập lại không khớp. <br>";
        }



        if(errorMassage != "")
        {
            toastr.erros(errorMassage, "Lỗi");
            e.preventDefault();
        }
        
    });

    // login
    $("#login-form").submit(function (e) {
        toastr.clear();
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let errorMassage = "";


        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!emailRegex.test(email))
        {
            errorMassage += "Email không hợp lệ. <br>";
        }

        if(password.length <6 )
        {
            errorMassage += "Mật khẩu phải có ít nhất 6 ký tự. <br>";
        }

        



        if(errorMassage != "")
        {
            toastr.erros(errorMassage, "Lỗi");
            e.preventDefault();
        }
        
    });

    // reset-password-form
    $("#reset-password-form").submit(function (e) {
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let confirmPassword = $('input[name="password_confirmation"]').val();
        let errorMassage = "";


        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!emailRegex.test(email))
        {
            errorMassage += "Email không hợp lệ. <br>";
        }

        if(password.length <6 )
        {
            errorMassage += "Mật khẩu phải có ít nhất 6 ký tự. <br>";
        }

        if(password != confirmPassword)
        {
            errorMassage += "Mật khẩu nhập lại không khớp. <br>";
        }

        if(errorMassage != "")
        {
            toastr.erros(errorMassage, "Lỗi");
            e.preventDefault();
        }
        
    });



    // Change avatar when click img -> open file
    $(".profile-pic").on("click", function() {
        $("#avatar").click();
    });

    // When selecting a new img -> display preview img
    $("#avatar").change(function() {
        let input = this;
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#preview-image").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

    //update account
    $("#update-account").on("submit", function(e){
        e.preventDefault();

        let formData = new FormData(this);
        let urlUpdate = $(this).attr("action");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: urlUpdate,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $(".col-12 button").text("Đang cập nhật...").attr("disabled", true);
            },
            success: function(response) {
                if(response.success) {
                    toastr.success(response.message);
                    // Update avatar image
                    if(response.avatar) {
                        $("#preview-image").attr("src", response.avatar);
                    }
                } else {
                    toastr.error(response.message, "Lỗi");
                }
            },
            error: function(xhr) {
                let error = xhr.responseJSON.errors;
                $.each(error, function(key, value) {
                    toastr.error(value[0], "Lỗi");
                });
            },
            complete: function() {
                $(".col-12 button").text("Cập nhật").attr("disabled", false);
            }
        });
    });

    // Change-password-form
    $("#change-password-form").submit(function (e) {
        e.preventDefault();
        let currentPassword = $('input[name="current_password"]').val().trim();
        let new_password = $('input[name="new_password"]').val().trim();
        let confirm_new_password = $('input[name="confirm_new_password"]').val().trim();
        let errorMassage = "";

        if(currentPassword.length <6 )
        {
            errorMassage += "Mật khẩu cũ phải có ít nhất 6 ký tự. <br>";
        }
        if(new_password.length <6 )
        {
            errorMassage += "Mật khẩu mới phải có ít nhất 6 ký tự. <br>";
        }

        if(new_password != confirm_new_password)
        {
            errorMassage += "Mật khẩu nhập lại không khớp. <br>";
        }

        if(errorMassage != "")
        {
            toastr.error(errorMassage, "Lỗi");
            return;
        }
        
        let formData = $(this).serialize();
        let urlUpdate = $(this).attr("action");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: urlUpdate,
            type: "POST",
            data: formData,
            beforeSend: function() {
                $(".col-12 button").text("Đang cập nhật...").attr("disabled", true);
            },
            success: function(response) {
                if(response.success) {
                    toastr.success(response.message);
                    $("#change-password-form")[0].reset();
                } else {
                    toastr.error(response.message, "Lỗi");
                }
            },
            error: function(xhr) {
                let error = xhr.responseJSON.errors;
                $.each(error, function(key, value) {
                    toastr.error(value[0], "Lỗi");
                });
            },
            complete: function() {
                $(".col-12 button").text("Cập nhật").attr("disabled", false);
            }
        });
    });

    // Vailidate form address
    $('#addAddressForm').submit(function(e) {
        e.preventDefault();
        let isValid = true;

        let fullName = $('#full_name').val().trim();
        let phone = $('#phone').val().trim();

        // delete old error messages
        $('.invalid-feedback').remove();

        if(fullName.length < 3) {
            isValid = false;
            $('#full_name').after(
                '<div class="invalid-feedback">Họ và tên ít nhất 3 ký tự.</div>'
            );
        }

        let phoneRegex = /^(0[3|5|7|8|9])+([0-9]{8})$/;
        if(!phoneRegex.test(phone)) {
            isValid = false;
            $('#phone').after(
                '<div class="invalid-feedback">Số điện thoại không hợp lệ.</div>'
            );
        }

        

        if(isValid) {
            // Submit the form
            this.submit();
        }
    });
});



// Filter by price

$(document).on('change', '#price-filter', function() {
    let selectedPrice = $(this).val();
    $.ajax({
        url: '/products/filter-by-price',
        type: 'GET',
        data: { price: selectedPrice },
        beforeSend: function() {
            $('#product-list').html('<div class="text-center">Đang tải...</div>');
        },
        success: function(response) {
            $('#product-list').html(response);
        },
        error: function() {
            $('#product-list').html('<div class="text-danger">Lỗi khi lọc sản phẩm.</div>');
        }
    });
});

// add to card
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});
$.ajax({
    url: '/cart/add',
    type: 'POST',
    data: {
        product_id: productId,
        quantity: quantity
    },
    success: function(response) {
        if(response.success) {
            toastr.success(response.message);
        } else {
            toastr.error(response.message, "Lỗi");
        }
    },
    error: function(xhr) {
        let error = xhr.responseJSON.errors;
        $.each(error, function(key, value) {
            toastr.error(value[0], "Lỗi");
        });
    }
});

// Carts
$('.navbar-tool.dropdown.ms-3').on('click', function() {
    $.ajax({
        url: '/mini-cart',
        type: 'GET',
        success: function(response) {
            console.log(response);
        }
    });
});