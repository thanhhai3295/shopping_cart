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