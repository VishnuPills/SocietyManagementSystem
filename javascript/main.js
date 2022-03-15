$(document).ready(function () {
  $(".nav-trigger").click(function () {
    $(".side-nav").toggleClass("visible");
  });
  var logout = document.getElementById("logout");
  logout.addEventListener("click", function () {
    if (confirm("Are you sure you want to log out?")) {
      location.href = "../html/index.html";
    } else {
      location.href = "dashboard.php";
    }
  });
});
