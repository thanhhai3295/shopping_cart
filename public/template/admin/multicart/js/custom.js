function changeStatus(event,url) {
  if(event.target.nodeName == 'LABEL') {
    $.get(url,function(data) {
      notify('Change Status Success'); 
    });
  }
}
function process(field,url) {
  var arr = {};
  $.each( field, function( key, value ) {
    arr[value] = ($("#mainForm div.form-group #"+value).val());
    $("#mainForm div.form-group #"+value).next().html('');
  });
  $.post(url,{'form':JSON.stringify(arr)}).done(function(data) {
    if(data == true) {
      location.reload();
    } else {
      var result = JSON.parse(data);
      $.each( result, function( key, value ) {
        $("#mainForm div.form-group #"+key).next().html(value);
      });
    }
    
  });
}
$(document).ready(function() {
  var url    = window.location.href;
  var matchesAction = url.match(/action=([^&]*)/);
  var action = matchesAction[1];
  if (action == 'form') action = 'add';
  var matchesController = url.match(/controller=([^&]*)/);
  var controller = matchesController[1];
  var parent = document.querySelectorAll('ul.sidebar-menu > li');
  var child  = document.querySelectorAll('ul.sidebar-submenu > li');
  if(action == 'dashboard') {
    parent[0].firstElementChild.classList.add('active');
  }
  child.forEach(element => {
    if (controller == (element.parentElement.parentElement.firstElementChild.textContent).trim().toLowerCase()) {
      if(element.firstElementChild.textContent.trim().toLowerCase().indexOf(action) != -1) {
        element.firstElementChild.classList.add('active');
        element.parentElement.classList.add('menu-open');
        element.parentElement.parentElement.classList.add('active');
      }
    }
  });
});