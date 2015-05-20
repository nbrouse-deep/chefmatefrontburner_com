/* Text Replacement */
(function($){ 
$.fn.highlight = function (str, className) {
    var regex = new RegExp("\\b"+str+"\\b", "gi");

    return this.each(function () {
        this.innerHTML = this.innerHTML.replace(regex, function(matched) {return "<span class=\"" + className + "\">" + matched + "</span>";});
    });
};
// Shorthand for $( document ).ready()
$(function() {
    var $txtBlock = $('table'),
        highlightClass = 'italic';
    $txtBlock.highlight('Chef-mate', highlightClass);
    $txtBlock.highlight('Chef–Mate', highlightClass);
    $txtBlock.highlight('Que Bueno', highlightClass);
    
});
$(function() {
    var $txtBlock = $('p'),
        highlightClass = 'italic';
    $txtBlock.highlight('Chef-mate', highlightClass);
    $txtBlock.highlight('Que Bueno', highlightClass);
    $txtBlock.highlight('Chef–Mate', highlightClass);
   
    
});
})(jQuery)