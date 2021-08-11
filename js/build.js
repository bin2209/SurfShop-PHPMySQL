// LANGUAGE COOKIE
// var cookie_language = "en";
var mySiteNamespace = {}
mySiteNamespace.switchLanguage = function (lang) {
    // $.cookie('language', lang);
    $.cookie('language',lang,{ expires: 7, path:'/' });
    window.location.reload();
}

if ($.cookie('language')=== undefined ){
    mySiteNamespace.switchLanguage('en');
}
$(document).ready(function (){
    // attach mySiteNamespace.switchLanguage to click events based on css classes
    $('.lang-eng').click(function () {
        document.cookie = "language=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        mySiteNamespace.switchLanguage('en'); 
    });
    $('.lang-vn').click(function () { 
        document.cookie = "language=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        mySiteNamespace.switchLanguage('vi'); 
    });
    if (($.cookie('language'))==='vi'){
    	$('#vietnam').addClass('lang-checked');
    	$('.language-p').text('Ngôn ngữ:');

    }else{
    	$('#english').addClass('lang-checked');
    	$('.language-p').text('Language:');
    }
});

console.log($.cookie('language'));