$(document).ready(function(){
  $('.navigation-title').on('click', function(event){
    if($(this).hasClass('selected')){
      $(this).toggleClass('selected');
      $(this).next('div').css(
        'display', 'none'
      );
    } else{
      $('.selected').next('div').css(
        'display', 'none'
      );
      $('.selected').toggleClass('selected');
      $(this).toggleClass('selected');

      $(this).next('div').css(
        'display', 'block'
      );
    }
  });
});
