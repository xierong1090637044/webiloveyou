$(document).ready(function(){
  $('#create').click(function(){
     $('#edit').css('display',"block");
     $('#mask').css('display',"block");
  })

  $('#mask').click(function(){
      $('#edit').css('display',"none");
      $('#mask').css('display',"none");
  })
});
