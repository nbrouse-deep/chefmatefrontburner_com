
/* add Italic Class to Recipe Navigation */

jQuery(function ($) {
$('div[data-filter="filter-que-bueno-sauces"]').addClass('italic');
  });

/* add Italic Class to Recipe preview */

jQuery(function ($) {
$('div. p').each(function(){
    var chef = $(this).text().replace(/Chef-mate /g,"<span class='italic'>Chef-mate &nbsp;</span>");
    $(this).html(chef);
});
}); 
/*
jQuery(function ($) {
 $.fn.wrapInTag = function(opts) {

    var o = $.extend({
        words: [],
        tag: '<strong>'
    }, opts);

    return this.each(function() {
        var html = $(this).html();
        for (var i = 0, len = o.words.length; i < len; i++) {
            var re = new RegExp(o.words[i], "gi");
            html = html.replace(re, o.tag + '$&' + o.tag.replace('<', '</'));
        }
        $(this).html(html);
    });

};

$('p').wrapInTag({
    words: ['Chef-mate'],
    tag: '<span class="italic">'
});
}); */
/*  Overlay Images */
   jQuery(function ($) {
        if (Modernizr.touch) {
            // show the close overlay button
            $(".close-overlay").removeClass("hidden");
            // handle the adding of hover class when clicked
            $(".img").click(function(e){
                if (!$(this).hasClass("hover")) {
                    $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".img").hasClass("hover")) {
                    $(this).closest(".img").removeClass("hover");
                }
            });
        } else {
            // handle the mouseenter functionality
            $(".img").mouseenter(function(){
                $(this).addClass("hover");
            })
            // handle the mouseleave functionality
            .mouseleave(function(){
                $(this).removeClass("hover");
            });
        }
    });

(function($){ 
$.fn.highlight = function (str, className) {
    var regex = new RegExp("\\b"+str+"\\b", "gi");

    return this.each(function () {
        this.innerHTML = this.innerHTML.replace(regex, function(matched) {return "<span class=\"" + className + "\">" + matched + "</span>";});
    });
};

/* Italicize Que Bueno on Hompage Featured */

$(function() {
    var $txtBlock = $('.possible-italic'),
        highlightClass = 'italic';
    $txtBlock.highlight('Que Bueno', highlightClass);
    
});
})(jQuery)