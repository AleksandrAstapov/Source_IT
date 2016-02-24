
$(function(){
  
  $('.push#auth').click(function(){
    $('#modalauth').arcticmodal();
  });
  $('.push#reg').click(function(){
    $('#modalreg').arcticmodal();
    alert('Hellow world');
  });
  $('#showPass').change(function(){
    var type = $('#password').attr('type');
    if (type == 'password') {
      $('#password').attr('type','text');
    } else {
      $('#password').attr('type','password');
    }
  });
  
  function alert(text){
    $('#modalreg p.text').html('');
    $('#modalreg p.text').html(text);
  }
});