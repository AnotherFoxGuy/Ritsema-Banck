$(document).ready(function() {
  // START navigation full screen
  $("#openNav").click(function() {
    document.getElementById("mobileNav").style.width = "100%";
  });

  $("#closeNav").click(function() {
    document.getElementById("mobileNav").style.width = "0%";
  });
  // END navigation full screen
});
