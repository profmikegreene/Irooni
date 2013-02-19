/* Author: Michael Greene

*/
// JavaScript Document
/* <![CDATA[ */

//Begin jQuery
$(function() {
/* ==================================================================
*
*   Variables
*
* -----------------------------------------------------------------*/
	var $mask = $('#mask');
	var $nav  = $('#nav');
	var $body = $('body');

	var $top = 0;
		if($body.hasClass('logged-in')) {
			$top = 28;
		}

	var $fadeIn = $('#feature').find('.fadeIn');

	var $windowWidth = $(window).width();

    var $controlForm = $('#controlForm');

    var $pageContent = $('#pageContent');
/* ==================================================================
*
*   Initiation Dropdown menus used across the site
*
* -----------------------------------------------------------------*/
$(function() {
    $nav.find('li.menu-item').hover(function(e) {
        $(this).find('ul.sub-menu')
            .show();
    }, function(){
        $(this).find('ul.sub-menu')
            .hide();
    });
});

/* ==================================================================
*
*   Home page fadeIn's
*
* -----------------------------------------------------------------*/
 var InfiniteRotator =
    {
        init: function()
        {
            //initial fade-in time (in milliseconds)
            var initialFadeIn = 1000;

            //interval between items (in milliseconds)
            var itemInterval = 4000;

            //cross-fade time (in milliseconds)
            var fadeTime = 2000;

            //count number of items
            var numberOfItems = $fadeIn.length;

            //set current item
            var currentItem = 0;

            //show first item
            $fadeIn.eq(currentItem).fadeIn(initialFadeIn);

            //loop through the items
            var infiniteLoop = setInterval(function(){
                $fadeIn.eq(currentItem).fadeOut(fadeTime);

                if(currentItem == numberOfItems -1){
                    currentItem = 0;
                }else{
                    currentItem++;
                }
                $fadeIn.eq(currentItem).fadeIn(fadeTime);

            }, itemInterval);
        }
    };

    InfiniteRotator.init();

/* ==================================================================
*
*   Session List Ajax
*
* -----------------------------------------------------------------*/
    $controlForm.submit(function(e){
        e.preventDefault();
        var $sortBy = $controlForm.find('#sortBy option:selected').val();
        var $room = $controlForm.find('#filterByRoom option:selected').val();
        var $cat = $controlForm.find('#cat option:selected').val();
        // var $audience = $controlForm.find('#audience option:selected').val();
        var $blogID = $controlForm.find('#blogID').val();
        $request = $.ajax({
            type: 'POST',
            url: '/wp-content/themes/Irooni/inc/ajax.php',
            data: ({
                'sortBy'    : $sortBy,
                'room'      : $room,
                'cat'       : $cat,
                // 'audience'  : $audience,
                'blogID'    : $blogID
            }),
            success: function(returnData){
                $pageContent.hide();
                $pageContent.html(returnData);
                $pageContent.fadeIn();
            }
        });
    });

});//end jQuery





/* ]]> */











