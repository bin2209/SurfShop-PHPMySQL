sum_price = 0;
quantity = 0;


function Print_Checkout(quantity, sum_price) {
    $('#Quantity-js').html(quantity);
    $('#SumPrice-js').html(PriceFormat(sum_price));
    $('#TotalSumPrice-js').html(PriceFormat(sum_price));
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

function changeColorButton(quantity) {
    if (quantity == 0) {
        $('#checkout').css({ "background-color": "#646464" });
    } else {
        $('#checkout').css({ "background-color": "#349934" });
    }
}

function selectOne(source) {
    $('#checkout').css({ "background-color": "#349934" });
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
    changeColorButton(quantity);
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
    changeColorButton(quantity);
    sum_price_format = PriceFormat(sum_price);
    document.getElementById("quantity-result").innerHTML = quantity;
    document.getElementById("total-price-result").innerHTML = sum_price_format;
}

$(document).ready(function() {
    document.getElementById("total-price-result").innerHTML = sum_price;
    document.getElementById("quantity-result").innerHTML = quantity;
    $("#checkout").click(function() {
        Print_Checkout(quantity, sum_price);
        if (quantity == 0) {
            $('#checkout').css({ "background-color": "#646464" });
        } else {
            $('.checkout').addClass('open');
            $('.content-center').addClass('blur-filter');
            $('footer').addClass('blur-filter');
        }

    });
    $('.pop-up .content .close').click(function() {
        $('.pop-up').removeClass('open');
        $('.content-center').removeClass('blur-filter');
        $('footer').removeClass('blur-filter');
    });
});