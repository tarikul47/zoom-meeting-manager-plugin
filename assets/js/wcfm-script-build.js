jQuery(document).ready(function ($) {
  $("#timezone-select").select2();

  $("#meeting_time").timepicker();
  $("#setTimeButton").on("click", function () {
    $("#meeting_time").timepicker("setTime", new Date());
  });

  /**
   * Zoom Api ajax request
   */
  $("#message").text("");
  $("#knoiledge-set-api-form").submit(function (event) {
    event.preventDefault();
    const data = $(this).serialize();
    //console.log(data);

    // post request
    $.post(wc_knoiledege.ajaxurl, data, function (response, textStatus, jqXHR) {
      console.log(response);
      //$('#message').text(response.data).hide();
      if (response.success) {
        $("#message").text(response.data).show(0).delay(5000).hide(0);
      }else{
        $("#message").text(response.data).show(0).delay(5000).hide(0);
      }
    });
  });
});

alert("hhh");
