new function($) {
    $.fn.getCursorPosition = function() {
        var pos = 0;
        var el = $(this).get(0);
        // IE Support
        if (document.selection) {
            el.focus();
            var Sel = document.selection.createRange();
            var SelLength = document.selection.createRange().text.length;
            Sel.moveStart('character', -el.value.length);
            pos = Sel.text.length - SelLength;
        }
        // Firefox support
        else if (el.selectionStart || el.selectionStart == '0')
            pos = el.selectionStart;

        return pos;
    }
} (jQuery);

function addCustomPicTag() {
    var article = document.getElementById('article');
    var value = article.value;
    var n = $('#article').getCursorPosition();
    var url = document.getElementById('image_url').value;
    var newValue = value.substr(0, n) + " @@pic url={" + url + "}@@ " + value.substr(n);
    article.value = newValue;
    console.log(value);
    console.log(n);
    console.log(newValue);
}
