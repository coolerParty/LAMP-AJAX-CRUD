
    $(document).ready(function() {
      // Display records on page load
      showRecords();

      // Add record button click
      $("#add").click(function() {

        var data = {
          action        : "add",
          title         : $("#title").val(),
          isbn          : $("#isbn").val(),
          author        : $("#author").val(),
          publisher     : $("#publisher").val(),
          year_published: $("#year_published").val(),
          };

        $.ajax({
          type: "POST",
          url: "book_process.php",
          data: data,
          success: function(response) {
            if(response){
                alert(response)
            }else{
              showRecords();
              $("#title").val("");
              $("#isbn").val("");
              $("#author").val("");
              $("#publisher").val("");
              $("#year_published").val("");

              $('#myModalADD').modal('hide');     
            }       
          }
        });
      });

      // Delete record button click
      $(document).on("click", ".delete", function() {
        var id = $(this).data('id');
        // var id = $(this).closest("tr").find(".id").text();
        if(confirm('Are you sure you want to delete this Book?')){
          $.ajax({
            type: "POST",
            url: "book_process.php",
            data: {
              action: "delete",
              id: id
            },
            success: function() {
              showRecords();
            }
          });
        }
      });

      // Edit record button click
      $(document).on("click", ".edit", function() {

        var id             = $(this).data('id');
        var title          = $(this).data('title');
        var isbn           = $(this).data('isbn');
        var author         = $(this).data('author'); 
        var publisher      = $(this).data('publisher');
        var year_published = $(this).data('year-published'); 

        $("#edit_id").val(id);
        $("#edit_title").val(title);
        $("#edit_isbn").val(isbn);
        $("#edit_author").val(author);
        $("#edit_publisher").val(publisher);
        $("#edit_year_published").val(year_published);

      });

      // Update record button click
      $("#update").click(function() {

        var data = {
          action        : "update",
          id            : $("#edit_id").val(),
          title         : $("#edit_title").val(),
          isbn          : $("#edit_isbn").val(),
          author        : $("#edit_author").val(),
          publisher     : $("#edit_publisher").val(),
          year_published: $("#edit_year_published").val(),
        };

        $.ajax({
          type: "POST",
          url : "book_process.php",
          data: data,
          success: function(response) {
            if(response){
                alert(response);
            }else{
                showRecords();
                $("#edit_id").val("");
                $("#edit_title").val("");
                $("#edit_isbn").val("");
                $("#edit_author").val("");
                $("#edit_publisher").val("");
                $("#edit_year_published").val("");

                $('#myModalUPDATE').modal('hide');
            }
          }
        });
      });

      // Show all records
      function showRecords() {
        $.ajax({
          type: "GET",
          url : "book_process.php",
          data: {
            action: "show"
          },
          success: function(result) {
            $("#records").html(result);
          }
        });
      }
    });
  