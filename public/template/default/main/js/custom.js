function changePage(page){
$('input[name=filter_page]').val(page);
$('#adminForm').submit();
}

function submitForm(){
  $('input[name=url]').val(window.location.href);
  $('#adminForm').submit();
}
function submitURL(url){
  $('#urlForm').attr('action', url);
  $('input[name=url]').val(window.location.href);
  $('#urlForm').submit();
}
function submit(name){
  $('#'+name).submit();
}
$(document).ready(function() {
  $("#zoom_01").elevateZoom({
    zoomWindowWidth:500,
    zoomWindowHeight:500
  });
  // var matchesFilter = url.match(/filter=([^&]*)/);
  // var filter = matchesFilter[1];
  // var sort = document.querySelectorAll("select#sort option");
  // sort.forEach(element => {
  //   if(element.textContent.trim().toLowerCase() == filter) {
  //     element.selected = 'selected';
  //   }
  // });

  $('[data-fancybox="images"]').fancybox({
    afterLoad : function(instance, current) {
        var pixelRatio = window.devicePixelRatio || 1;

        if ( pixelRatio > 1.5 ) {
            current.width  = current.width  / pixelRatio;
            current.height = current.height / pixelRatio;
        }
    }
});
  
});