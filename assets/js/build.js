// LANGUAGE COOKIE
// var cookie_language = "en";
var LanguageWebsite = {}
LanguageWebsite.switchLanguage = function(lang) {
    // $.cookie('language', lang);
    $.cookie('language', lang, { expires: 7, path: '/' });
    window.location.reload();
}
if ($.cookie('language') === undefined) {
    LanguageWebsite.switchLanguage('en');
}
$(document).ready(function() {
    // attach LanguageWebsite.switchLanguage to click events based on css classes
    $('.lang-eng').click(function() {
        document.cookie = "language=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        LanguageWebsite.switchLanguage('en');
    });
    $('.lang-vn').click(function() {
        document.cookie = "language=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        LanguageWebsite.switchLanguage('vi');
    });
    if (($.cookie('language')) === 'vi') {
        $('#vietnam').addClass('lang-checked');
        $('.language-p').text('Ngôn ngữ:');

    } else {
        $('#english').addClass('lang-checked');
        $('.language-p').text('Language:');
    }
});

// STATUS OPENED ? CLOSED SLIDE LEFT BAR
var SlideStoreBar = {}
SlideStoreBar.switchOpener = function(status) {
    $.cookie('BarOpened', status, { expires: 7, path: '/' });
    // window.location.reload();
}
if ($.cookie('BarOpened') === undefined) {
    SlideStoreBar.switchOpener('opened');
}

$(document).ready(function() {
    $('.close-slidebar').click(function() {
        document.cookie = "BarOpened=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        SlideStoreBar.switchOpener('closed');
    });
    $('#open-slidebar-mobile').click(function() {
        document.cookie = "BarOpened=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        SlideStoreBar.switchOpener('opened');
    });
});