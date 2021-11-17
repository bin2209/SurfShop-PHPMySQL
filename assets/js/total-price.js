sum_price = 0;
quantity = 0;

function Print_Checkout(quantity, sum_price) {
    if (quantity == 0) {
        document.getElementById("checkout-content").innerHTML = '<p style="font-size: 18px; font-weight: 500;">' + LANG_choose_product + '</p>';
    } else {
        if (quantity == 1) {
            LANG_VIPproduct = LANG_product;
        } else {
            LANG_VIPproduct = LANG_products;
        }
        document.getElementById("checkout-content").innerHTML = '<div> <span>' + quantity + ' ' + LANG_VIPproduct + ' </span><br> <span>' + LANG_price + ': </span><span style="font-weight:600;">' + PriceFormat(sum_price) + '₫</span> <br> <span>' + LANG_Delivery_charges + ': </span><span style="font-weight:600;">' + LANG_Delivery_free + '</span><br> <hr> <span style="font-weight:600;">' + LANG_total_pay + ': </span><span style="font-weight:600;">' + PriceFormat(sum_price) + '₫</span><br> (' + LANG_Tax_included + ') <button class="checkout-button" style="width:100%; margin-top:10px;">' + LANG_checkout + '</button> </div>';
    }
}

function PriceFormat(price) {
    price = Intl.NumberFormat('vi-VN', { maximumSignificantDigits: 3 }).format(price);
    return price;
}

function isSelectAll() {
    // CHECK XEM NẾU TẤT CẢ ĐÃ SELECTED
    checkboxes = document.getElementsByName('product');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        if (checkboxes[i].checked == false) {
            return 0;
        }
    }
    return 1;
}

function isnotSelectAll() {
    // CHECK XEM NẾU TẤT CẢ KHÔNG CÓ CÁI NÀO SELECT CẢ
    checkboxes = document.getElementsByName('product');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        if (checkboxes[i].checked == true) {
            return 0;
        }
    }
    return 1;
}

function selectOne(source) {
    if (isSelectAll() == true) {
        document.getElementById("selectAllbutton").checked = true;
    } else {
        document.getElementById("selectAllbutton").checked = false;
    }
    if (source.checked == true) {
        sum_price = Number(sum_price) + Number(source.value);
        quantity = Number(quantity) + 1;
    } else if (source.checked == false) {
        sum_price = Number(sum_price) - Number(source.value);
        quantity = Number(quantity) - 1;
    }
    sum_price_format = PriceFormat(sum_price);
    document.getElementById("quantity-result").innerHTML = quantity;
    document.getElementById("total-price-result").innerHTML = sum_price_format;
}

function selectAll(source) {
    checkboxes = document.getElementsByName('product');
    for (var i = 0, n = checkboxes.length; i < n; i++) {

        if (checkboxes[i].checked == false) {
            sum_price = Number(sum_price) + Number(checkboxes[i].value);
            checkboxes[i].checked = source.checked;
        }
    }
    if (isnotSelectAll() == true) {
        sum_price = 0;
        quantity = 0;
    }
    if (isSelectAll() == true) {
        quantity = Number(n);
        document.getElementById("selectAllbutton").checked = true;
    }
    sum_price_format = PriceFormat(sum_price);
    document.getElementById("quantity-result").innerHTML = quantity;
    document.getElementById("total-price-result").innerHTML = sum_price_format;
}

$(document).ready(function() {
    if ($.cookie('language') == 'en') {
        LANG_choose_product = 'Please choose a product.';
        LANG_product = 'item';
        LANG_products = 'items';
        LANG_price = 'Total Delivery Cost';
        LANG_Delivery_charges = 'Total Delivery Cost';
        LANG_Delivery_free = 'Free';
        LANG_total_pay = 'Total';
        LANG_Tax_included = 'Inclusive of tax';
        LANG_checkout = 'Check out';
    } else {
        LANG_choose_product = 'Vui lòng chọn sản phẩm.';
        LANG_product = 'mặt hàng';
        LANG_products = 'mặt hàng';
        LANG_price = 'Tổng Giá Trị Sản Phẩm';
        LANG_Delivery_charges = 'Phí giao hàng';
        LANG_Delivery_free = 'Miễn phí';
        LANG_total_pay = 'Tổng cộng';
        LANG_Tax_included = 'Đã bao gồm thuế';
        LANG_checkout = 'Thanh toán';
    }
    document.getElementById("total-price-result").innerHTML = sum_price;
    document.getElementById("quantity-result").innerHTML = quantity;
    $("#checkout").click(function() {
        Print_Checkout(quantity, sum_price);
        $('.checkout').addClass('open');
        $('.content-center').addClass('blur-filter');
        $('footer').addClass('blur-filter');
    });
    $('.pop-up .content .close').click(function() {
        $('.pop-up').removeClass('open');
        $('.content-center').removeClass('blur-filter');
        $('footer').removeClass('blur-filter');
    });
});