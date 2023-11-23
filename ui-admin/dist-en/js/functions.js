$(function () {

	'use strict' ;

	$('[placeholder]').focus(function () {
        
        $(this).attr('data-text', $(this).attr('placeholder') ) ;
        
        $(this).attr('placeholder', '') ;
        
    }).blur(function () {
        
        $(this).attr('placeholder', $(this).attr('data-text') ) ;
        
    });


    /*Confirm Message*/

    $('.confirm').click(function() {
    	
    	return confirm('Are you sure you wanna delete this object?') ;
    });
});