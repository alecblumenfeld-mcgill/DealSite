/*!
 * Start Bootstrap - Creative Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    })

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Fit Text Plugin for Main Header
    $("h1").fitText(
        1.2, {
            minFontSize: '35px',
            maxFontSize: '65px'
        }
    );

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })


    $("form").hide();


    $('.verify-btn').click(function(e){
     e.preventDefault();
    var validate = function(data) {
        console.log(data.email.indexOf("@mail.mcgill.ca"));
        if (!(data.email.indexOf("@mail.mcgill.ca") > 0) || (data.email.indexOf("@mcgill.ca") >0)  ) {

            // Invalid username
            basicModal.error('email')
            return false

        }

        if (data.IdNumber.length !==9) {

            // Invalid password
            basicModal.error('IdNumber')
            return false

        }

        // Login valid
        basicModal.close()
        $('.verify-btn').hide()
        $( "form" ).toggle( "slow", function() {

        $('<input>').attr({
                type: 'hidden',
                id: 'email',
                name: 'email',
                value:  data.Name
            }).appendTo('form');
        $('<input>').attr({
                type: 'hidden',
                id: 'IdNumber',
                name: 'IdNumber',
                value:  data.IdNumber
            }).appendTo('form');


        $(this).data( "data-email", data.Name )
        });

        return true

    }

        basicModal.show({
            body: `
                  <p>Please Enter Your McGill ID and Name as it is stated on Your McGill ID</p>
                  <input class="basicModal__text" type="text" placeholder="McGill Email" name="email">
                  <input class="basicModal__text" type="text" placeholder="McGill ID Number" name="IdNumber">
                  `,
            class: basicModal.THEME.small,
            closable: true,
            buttons: {
                cancel: {
                    class: basicModal.THEME.xclose,
                    fn: basicModal.close
                },
                action: {
                    title: 'Confirm',
                    fn: validate
                }
            }
        })
    });

    // Initialize WOW.js Scrolling Animations
    new WOW().init();

})(jQuery); // End of use strict
