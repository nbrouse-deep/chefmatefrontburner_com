/*
 * page functions are grouped by <body>'s class.
 * all pages in a class fire init().
 * named functions are fired according to <body>'s id.
 * hyphens are stripped from classes and ids automatically.
 *
 */


CHEFMATE = {
    common: {
        init: function() {
            // all external links should open in a new tab
            $("a[href^='http']").attr("target", "_blank");


            // if cookie hasn't been set, show the welcome dialog and set it
            /*
            if (!$.cookie('visited')) {
                $('.welcome').show();
                $('#lightbox').fadeIn('fast');
            }

            $('.welcome button').click(function() {
                $.cookie('visited', 'true', { expires: 365, path: '/' });

                $('#lightbox').fadeOut('fast');
                $('.welcome').hide();
            });
            */


            //
            // mobile only
            $('header .menu').click(function() {
                menubtn = $(this);

                if (menubtn.hasClass('active')) {
                    menubtn.removeClass('active');
                    $('header nav').slideUp('fast');
                }
                else {
                    menubtn.addClass('active');
                    $('header nav').slideDown('fast');
                }
            });
        }
    },


    search: {
        init: function() {
            $('.search-again input').on('click', function() {
                $(this)[0].select();
            });
        }
    },


    aboutus: {
        init: function() {
            // show/hide product categories
            $('.category h2 a').click(function(e) {
                e.preventDefault();

                category = $(this).closest('.category');

                if (category.hasClass('active')) {
                    category.removeClass('active')
                        .find('.products, .que-bueno').slideUp(200);
                }
                else {
                    category.addClass('active')
                        .find('.products, .que-bueno').slideDown(200);
                }
            });


            // product info lightbox
            $('.product a, .product button').click(function(e) {
                e.preventDefault();

                // tablets and above
                if (document.body.clientWidth > 671) {
                    $('#lightbox .product-info').remove();

                    var productinfo = $(this).closest('.product').find('.product-info').clone();
                    $('#lightbox').append(productinfo);

                    $('#lightbox').fadeIn();

                    $('#lightbox .product-info button').click(function() {
                        $('#lightbox').fadeOut('fast', function() {
                            $('#lightbox .product-info').remove();
                        })
                    });
                }
                // smartphones
                else {
                    var product = $(this).closest('.product');

                    if (product.hasClass('active')) {
                        product.removeClass('active')
                            .find('.more-info').slideUp('fast');
                    }
                    else {
                        product.addClass('active')
                            .find('.more-info').slideDown('fast');
                    }
                }
            });



            if ( window.location.hash.length > 0 ) {
                $( window.location.hash ).find('h2 a').trigger('click');
            }
            else {
                $('#cheese-sauces h2 > a').trigger('click');
            }
        }
    },


    contest: {
        init: function() {
            if ($('.thank-you').length > 0) {
                $('#lightbox').html( $('.thank-you').clone() );
                $('#lightbox').show();

                $('#lightbox button').click(function() {
                    $('#lightbox').fadeOut('fast', function() {
                        $('#lightbox .thank-you').remove();
                    })
                });
            }
        }
    },


    quebueno: {
        init: function() {
            //
            // make sure the size of the iframe and its container are proportionate
            var width = $('.iframe').width();

            $('.iframe, iframe').height( width * 0.5625 );
        }
    }
}





UTIL = {
    fire: function(func,funcname, args){
       var namespace = CHEFMATE;  

       funcname = (funcname === undefined) ? 'init' : funcname;

       if (func !== '' && namespace[func] && typeof namespace[func][funcname] == 'function'){
           namespace[func][funcname](args);
       } 
    }, 

    loadEvents: function() {
         var bodyId = document.body.id;

         // hit up common first.

         UTIL.fire('common');
         // do all the classes too.

         $.each(document.body.className.split(/\s+/), function(i, classnm) {
             UTIL.fire(classnm.replace(/-/g, ''));
             UTIL.fire(classnm.replace(/-/g, ''),bodyId);
         });

         UTIL.fire('common','finalize');
     } 
}; 

$(document).ready(UTIL.loadEvents);
