$(document).bind('keydown', function(e) {
    if(e.ctrlKey && (e.which == 83)) {
      e.preventDefault();
      
      $(".loading-screen").show();
      var dataForm = $('#form').serialize();
      $.ajax({
          type: 'POST',
          url: "proses/save.php",
          data: dataForm,
          cache: false,
          success: function (data) {
              $(".loading-screen").hide();
          }
      });
      
      return false;
    }
});