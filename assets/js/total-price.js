sum_price=0;
quantity=0;
document.getElementById("total-price-result").innerHTML = sum_price;
document.getElementById("quantity-result").innerHTML = quantity;
function PriceFormat(price){
	price = Intl.NumberFormat('vi-VN', { maximumSignificantDigits: 3 }).format(price);
	return price;
}
function isSelectAll(){
	// CHECK XEM NẾU TẤT CẢ ĐÃ SELECTED
	checkboxes = document.getElementsByName('product');
	for(var i=0, n=checkboxes.length;i<n;i++) {
		if (checkboxes[i].checked==false){
			return 0;
		}
	}
	return 1;
}
function isnotSelectAll(){
	// CHECK XEM NẾU TẤT CẢ KHÔNG CÓ CÁI NÀO SELECT CẢ
	checkboxes = document.getElementsByName('product');
	for(var i=0, n=checkboxes.length;i<n;i++) {
		if (checkboxes[i].checked==true){
			return 0;
		}
	}
	return 1;
}

function selectOne(source){
	if (isSelectAll()==true){
		document.getElementById("selectAllbutton").checked=true;
	}else{
		document.getElementById("selectAllbutton").checked=false;
	}
	if (source.checked==true){
		sum_price = Number(sum_price)+Number(source.value);
		quantity= Number(quantity)+1;
	}else if (source.checked==false){
		sum_price = Number(sum_price)-Number(source.value);
		quantity= Number(quantity)-1;

	}
	sum_price_format = PriceFormat(sum_price);
	document.getElementById("quantity-result").innerHTML = quantity;
	document.getElementById("total-price-result").innerHTML = sum_price_format;
}

function selectAll(source){
	checkboxes = document.getElementsByName('product');
	for(var i=0, n=checkboxes.length;i<n;i++) {
		
		if (checkboxes[i].checked==false){
			sum_price =  Number(sum_price)+ Number(checkboxes[i].value);
			checkboxes[i].checked = source.checked;
		}

	}
	if (isnotSelectAll()==true){
		sum_price = 0;
		quantity = 0;
	}
	if (isSelectAll()==true){
		quantity = Number(n);
		document.getElementById("selectAllbutton").checked=true;
	}
	sum_price_format = PriceFormat(sum_price);
	document.getElementById("quantity-result").innerHTML = quantity;
	document.getElementById("total-price-result").innerHTML = sum_price_format;
}


