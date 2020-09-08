function changeURL(url){
  window.location = url;
}
function submitURL(url){
  $('#urlForm').attr('action', url);
  $('input[name=url]').val(window.location.href);
  $('#urlForm').submit();
}
function submitForm(){
  $('input[name=url]').val(window.location.href);
  $('#adminForm').submit();
}
function submit(name){
  $('#'+name).submit();
}