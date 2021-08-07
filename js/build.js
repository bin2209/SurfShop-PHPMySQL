var mySiteNamespace = {}

mySiteNamespace.switchLanguage = function (lang) {
	$.cookie('language', lang);
	window.location.reload();
}

$(document).ready(function (){
    // attach mySiteNamespace.switchLanguage to click events based on css classes
    $('.lang-eng').click(function () { mySiteNamespace.switchLanguage('en'); });
    $('.lang-vn').click(function () { mySiteNamespace.switchLanguage('vi'); });
    if (($.cookie('language'))==='vi'){
    	$('#vietnam').addClass('lang-checked');
    	$('.language-p').text('Ngôn ngữ:');
    }else{
    	$('#english').addClass('lang-checked');
    	$('.language-p').text('Language:');
    };
});

console.log($.cookie('language'));