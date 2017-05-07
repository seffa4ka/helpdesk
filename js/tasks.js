;
var myname = $('#name');
var myemail = $('#email');
var mystatus = $('#status');

myname.click(function () {
  $.cookie("filter", "name");
  window.location.replace("/tasks");
});

myemail.click(function () {
  $.cookie("filter", "email");
  window.location.replace("/tasks");
});

mystatus.click(function () {
  $.cookie("filter", "status");
  window.location.replace("/tasks");
});
