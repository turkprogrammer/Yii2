/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
    });
});
*/
$('.reply').on('click', function (e) {
    e.preventDefault();
    var idComment = $(this).data('comment');   
    $('#comments-parent_id').val(idComment);
    $('#comments-text').focus();
});
             