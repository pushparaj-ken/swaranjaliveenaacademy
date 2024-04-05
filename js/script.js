
$('.contact-form').submit(function (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: "save.php",
    data: new FormData(this),
    dataType: "json",
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.result == 1) {
        toastr.success('Thanks for reaching us ! We will contact you soon');
        setTimeout(function () {
          location.reload();
        }, 1000);
      } else {
        toastr.error('Something went wrong! Please try again later!');
      }
    }
  });

});



document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'complete') {
    setTimeout(function () {
      document.getElementById('interactive');
      document.getElementById('loader').style.visibility = "hidden";
    }, 150000);
  }
}
