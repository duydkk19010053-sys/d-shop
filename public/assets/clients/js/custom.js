$(document).ready(function () {

    //register
    $("#register-form").submit(function (e) {
        let name = $('input[name="name"]').val();
        let email = $('input[name="email"]').val();
        let phone = $('input[name="phone"]').val();
        let password = $('input[name="password"]').val();
        let confirmPassword = $('input[name="confirmPassword"]').val();
        let errorMassage = "";

        if (name.length < 3) {
            errorMassage += "Họ và tên ít nhất 3 ký tự. <br> "
        }

        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            errorMassage += "Email không hợp lệ. <br>";
        }

        if (password.length < 6) {
            errorMassage += "Mật khẩu phải có ít nhất 6 ký tự. <br>";
        }

        if (password != confirmPassword) {
            errorMassage += "Mật khẩu nhập lại không khớp. <br>";
        }



        if (errorMassage != "") {
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
        if (!emailRegex.test(email)) {
            errorMassage += "Email không hợp lệ. <br>";
        }

        if (password.length < 6) {
            errorMassage += "Mật khẩu phải có ít nhất 6 ký tự. <br>";
        }





        if (errorMassage != "") {
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
        if (!emailRegex.test(email)) {
            errorMassage += "Email không hợp lệ. <br>";
        }

        if (password.length < 6) {
            errorMassage += "Mật khẩu phải có ít nhất 6 ký tự. <br>";
        }

        if (password != confirmPassword) {
            errorMassage += "Mật khẩu nhập lại không khớp. <br>";
        }

        if (errorMassage != "") {
            toastr.erros(errorMassage, "Lỗi");
            e.preventDefault();
        }

    });



    // Change avatar when click img -> open file
    $(".profile-pic").on("click", function () {
        $("#avatar").click();
    });

    // When selecting a new img -> display preview img
    $("#avatar").change(function () {
        let input = this;
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#preview-image").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

    //update account
    $("#update-account").on("submit", function (e) {
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
            beforeSend: function () {
                $(".col-12 button").text("Đang cập nhật...").attr("disabled", true);
            },
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message);
                    // Update avatar image
                    if (response.avatar) {
                        $("#preview-image").attr("src", response.avatar);
                    }
                } else {
                    toastr.error(response.message, "Lỗi");
                }
            },
            error: function (xhr) {
                let error = xhr.responseJSON.errors;
                $.each(error, function (key, value) {
                    toastr.error(value[0], "Lỗi");
                });
            },
            complete: function () {
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

        if (currentPassword.length < 6) {
            errorMassage += "Mật khẩu cũ phải có ít nhất 6 ký tự. <br>";
        }
        if (new_password.length < 6) {
            errorMassage += "Mật khẩu mới phải có ít nhất 6 ký tự. <br>";
        }

        if (new_password != confirm_new_password) {
            errorMassage += "Mật khẩu nhập lại không khớp. <br>";
        }

        if (errorMassage != "") {
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
            beforeSend: function () {
                $(".col-12 button").text("Đang cập nhật...").attr("disabled", true);
            },
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message);
                    $("#change-password-form")[0].reset();
                } else {
                    toastr.error(response.message, "Lỗi");
                }
            },
            error: function (xhr) {
                let error = xhr.responseJSON.errors;
                $.each(error, function (key, value) {
                    toastr.error(value[0], "Lỗi");
                });
            },
            complete: function () {
                $(".col-12 button").text("Cập nhật").attr("disabled", false);
            }
        });
    });

    // Vailidate form address
    $('#addAddressForm').submit(function (e) {
        e.preventDefault();
        let isValid = true;

        let fullName = $('#full_name').val().trim();
        let phone = $('#phone').val().trim();

        // delete old error messages
        $('.invalid-feedback').remove();

        if (fullName.length < 3) {
            isValid = false;
            $('#full_name').after(
                '<div class="invalid-feedback">Họ và tên ít nhất 3 ký tự.</div>'
            );
        }

        let phoneRegex = /^(0[3|5|7|8|9])+([0-9]{8})$/;
        if (!phoneRegex.test(phone)) {
            isValid = false;
            $('#phone').after(
                '<div class="invalid-feedback">Số điện thoại không hợp lệ.</div>'
            );
        }



        if (isValid) {
            // Submit the form
            this.submit();
        }
    });
});



// Filter by price

$(document).on('change', '#price-filter', function () {
    let selectedPrice = $(this).val();
    $.ajax({
        url: '/products/filter-by-price',
        type: 'GET',
        data: { price: selectedPrice },
        beforeSend: function () {
            $('#product-list').html('<div class="text-center">Đang tải...</div>');
        },
        success: function (response) {
            $('#product-list').html(response);
        },
        error: function () {
            $('#product-list').html('<div class="text-danger">Lỗi khi lọc sản phẩm.</div>');
        }
    });
});

// add to card
$(document).on('click', '.add-to-cart', function (e) {
    e.preventDefault(); // Ngăn chặn hành vi mặc định của nút

    let productId = $(this).data('id');
    let quantity = $(this).closest('form').find('input[name="quantity"]').val() || 1;

    $.ajax({
        url: '/cart/add',
        type: 'POST',
        data: {
            product_id: productId,
            quantity: quantity,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                // Cập nhật số lượng sản phẩm trong giỏ hàng
                $('#cart_count').text(response.cart_count);

                // Hiển thị thông báo thành công
                toastr.success('Sản phẩm đã được thêm vào giỏ hàng.');
            } else {
                toastr.error('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.');
            }
        },
        error: function () {
            toastr.error('Không thể thêm sản phẩm vào giỏ hàng.');
        }
    });
});



// Remove product cart
$('.remove-from-cart').on('click', function (e) {
    let productId = $(this).data('id');
    let row = $(this).closest('.my-2');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
    $.ajax({
        url: '/cart/remove-cart',
        type: 'POST',
        data: {
            product_id: productId,
        },
        success: function (response) {
            row.remove();
            $('#cart_count').text(response.cart_count);
            $('#cart_total').text(response.cart_total);
            location.reload();

        },
        error: function () {
            toastr.error('Xóa sản phẩm thất bại!');
        }
    });
});

// Check out address
$('#address_id').change(function () {
    var addressId = $(this).val();
    $.ajax({
        url: '/checkout/get-address',
        type: 'GET',
        data: { address_id: addressId },
        success: function (response) {
            if (response.success) {
                $('input[name="ltn__name"]').val(response.data.full_name);
                $('input[name="ltn__phone"]').val(response.data.phone);
                $('input[name="ltn__address"]').val(response.data.address);
                $('input[name="ltn__city"]').val(response.data.city);
                $('input[name="address_id"]').val(response.data.id);
            }
        },
        error: function () {
            toastr.error('Không thể lấy thông tin địa chỉ.');
        }
    });

})

// Highlight selected box
document.addEventListener('DOMContentLoaded', function () {
    function updateSelected() {
        document.querySelectorAll('.payment-method-box').forEach(function (box) {
            box.classList.remove('selected');
        });
        var checked = document.querySelector('.payment-radio:checked');
        if (checked) checked.closest('.payment-method-box').classList.add('selected');
    }
    document.querySelectorAll('.payment-radio').forEach(function (radio) {
        radio.addEventListener('change', updateSelected);
    });
    updateSelected();

    // Đổi địa chỉ giao hàng khi chọn địa chỉ khác
    var addressSelect = document.getElementById('list_address');
    addressSelect.addEventListener('change', function () {
        var selected = addressSelect.options[addressSelect.selectedIndex];
        document.getElementById('checkout-fn').value = selected.getAttribute('data-name') || '';
        document.getElementById('checkout-phone').value = selected.getAttribute('data-phone') || '';
        document.getElementById('checkout-address').value = selected.getAttribute('data-address') || '';
        document.getElementById('checkout-city').value = selected.getAttribute('data-city') || '';
    });
    // Khởi tạo giá trị ban đầu theo địa chỉ mặc định
    setTimeout(function () {
        var selected = addressSelect.options[addressSelect.selectedIndex];
        document.getElementById('checkout-fn').value = selected.getAttribute('data-name') || '';
        document.getElementById('checkout-phone').value = selected.getAttribute('data-phone') || '';
        document.getElementById('checkout-address').value = selected.getAttribute('data-address') || '';
        document.getElementById('checkout-city').value = selected.getAttribute('data-city') || '';
    }, 100);

    // Paypal

    var totalPriceText = $('.totalPrice_Checkout').text().trim();
    var totalPriceNumber = parseFloat(totalPriceText.replace(/\./g, "").replace("đ", ""));
    paypal.Buttons({
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalPriceNumber.toFixed(2),
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                // Send information to server
                fetch("/checkout/paypal", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify({
                        orderID: data.orderID,
                        payerID: data.payerID,
                        transactionID: details.id,
                        amount: details.purchase_units[0].amount.value,
                        address_id: $("#list_address").val(),
                    }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            toastr.success('Thanh toán thành công qua PayPal!');
                            setTimeout(function () {
                                window.location.href = "/account";
                            }, 1500);
                        } else {
                            toastr.error('Có lỗi xảy ra, vui lòng thử lại!');
                        }
                    });
            });
        }
    }).render('#paypal-button-container');

});

// Contact page
    $("#contact-form").on("submit", function(e) {
       let name = $('input[name="name"]').val().trim();
       let email = $('input[name="email"]').val().trim();
       let phone = $('input[name="phone"]').val().trim();
       let message = $('textarea[name="message"]').val().trim();
       let errorMessage = "";

       if(name.length < 3) {
        errorMessage += "Tên phải có ít nhất 3 ký tự.\n";
       }
       if(phone.length < 10) {
        errorMessage += "Số điện thoại phải có ít nhất 10 ký tự.\n";
       }
       let emailRegex = /^\S+@\S+\.\S+$/;
       if(!emailRegex.test(email)) {
        errorMessage += "Email không hợp lệ.\n";
       }
       if(errorMessage !== "") {
        toastr.error(errorMessage, "Lỗi");
        e.preventDefault();
       }
    });