
$('body').on("submit", '.contact-form', function (e) {
  e.preventDefault();
  debugger
  var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

  if (is_required(this_id) === true) {
    $.ajax({
      type: 'POST',
      url: "save.php",
      data: new FormData(this),
      dataType: "json",
      contentType: false,
      processData: false,
      beforeSend: function () {
        $(this_id + ' button[type=submit]').attr('disabled', 'true');
      },
      success: function (response) {
        console.log(response)
        if (response.result == 1) {
          $(this_id)[0].reset();
          toastr.success('Success!');
          $(this_id + ' button[type=submit]').removeAttr('disabled');
          setTimeout(function () { location.reload(); }, 1000);
          if ($(this_id).attr('reload-action') === 'true') {
            setTimeout(function () { location.reload(); }, 1000);
          }
        } else {
          toastr.error('Something went wrong! Please try again later!');
          $(this_id + ' input[type=submit]').removeAttr('disabled');
          $(this_id + ' button[type=submit]').removeAttr('disabled');
        }
      }
    });
  } else {
    toastr.error('Please check the required fields!');
  }

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

function is_required(this_id) {
  $('.error-span').hide();
  var inc = 0;
  $(this_id + " .required").each(function () {
    //console.log($(this).attr('name'));
    if ($(this).val() !== "undefined") {
      if ($(this).val() != null) {
        if (($(this).val()).length > 0) {

        } else {
          //console.log($(this).attr('name'));
          $(this).next("span").show();
          inc++;
        }
      } else {
        alert('Something went wrong on ' + $(this).attr('name'));
        inc++;
      }
    }
  });
  if (inc === 0) {
    return true;
  }
  return false;
}