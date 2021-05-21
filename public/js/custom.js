/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
// $(function() {
//     let city = $(".input-field option:selected").text();
//     $(".input-field").on("change", function(){
//         console.log(city);
//     })
// });
$(function () {
  var test = $(".test");
  console.log(test.text());
});
$(function () {
  $(".input-field").on("change", function () {
    var city = $(".input-field select option:selected").val();
    console.log(city);
    $(".city-filter").attr("action", "/stadiums/" + city);
    $(".city-filter").trigger("submit");
  }); // $(".date-picker").on("click", function() {
  //     let date = $(this).attr("date-id");
  //     console.log(date);
  //     $(".day-times").slideToggle(100);
  // });

  $(".date-picker").on("click", function () {
    $(this).addClass("active").siblings().removeClass("active");
    var date = $(this).attr("date-id");
    $(".display-date").text(date);
    $(".day-times").hide();
    $(".day-times").slideDown(800);
  });
});
/******/ })()
;