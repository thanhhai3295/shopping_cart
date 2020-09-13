function changeStatus(event,url) {
  if(event.target.nodeName == 'LABEL') {
    $.get(url,function(data) {
      notify('Change Status Success'); 
    });
  }
}
function edit(field,url,id) {
  $.get(url,function(data) {
    var result = JSON.parse(data);
    $.each( result, function( key, value ) {
      $("#mainForm div.form-group #"+key).val(value);
    });
  });
  $("input#id").val(id);
  $("#btnForm").text('Edit');
}
function add(){
  $("input#id").val('');
  $("#btnForm").text('Add');
}
function process(field,url) {
  var arr = {};
  var id = $("input#id").val();
  $.each( field, function( key, value ) {
    arr[value] = ($("#mainForm div.form-group #"+value).val());
    $("#mainForm div.form-group #"+value).next().html('');
  });
  if(id != '') arr['id'] = id;
  $.post(url,{'form':JSON.stringify(arr),'add':true}).done(function(data) {
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