<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      // Display records on page load
      showRecords();

      // Add record button click
      $("#add").click(function() {

        // var title          = $("#title").val();
        // var isbn           = $("#isbn").val();
        // var author         = $("#author").val();
        // var publisher      = $("#publisher").val();
        // var year_published = $("#year_published").val();

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
          url: "save.php",
          data: data,
          success: function() {
            showRecords();
            $("#title").val("");
            $("#isbn").val("");
            $("#author").val("");
            $("#publisher").val("");
            $("#year_published").val("");
          }
        });
      });

      // Delete record button click
      $(document).on("click", ".delete", function() {
        var id = $(this).data('id');
        // var id = $(this).closest("tr").find(".id").text();
        if(confirm('Are you sure you want to delete this product?')){
          $.ajax({
            type: "POST",
            url: "save.php",
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

        // var id             = $(this).closest("tr").find(".id").text();
        // var title          = $(this).closest("tr").find(".title").text();
        // var isbn           = $(this).closest("tr").find(".isbn").text();
        // var author         = $(this).closest("tr").find(".author").text();
        // var publisher      = $(this).closest("tr").find(".publisher").text();
        // var year_published = $(this).closest("tr").find(".year_published").text();

        $("#edit_id").val(id);
        $("#edit_title").val(title);
        $("#edit_isbn").val(isbn);
        $("#edit_author").val(author);
        $("#edit_publisher").val(publisher);
        $("#edit_year_published").val(year_published);

      });

      // Update record button click
      $("#update").click(function() {

        // var id             = $("#edit_id").val();
        // var title          = $("#edit_title").val();
        // var isbn           = $("#edit_isbn").val();
        // var author         = $("#edit_author").val();
        // var publisher      = $("#edit_publisher").val();
        // var year_published = $("#edit_year_published").val();

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
          url : "save.php",
          data: data,
          success: function() {
            showRecords();
            $("#edit_id").val("");
            $("#edit_title").val("");
            $("#edit_isbn").val("");
            $("#edit_author").val("");
            $("#edit_publisher").val("");
            $("#edit_year_published").val("");
          }
        });
      });

      // Show all records
      function showRecords() {
        $.ajax({
          type: "GET",
          url : "save.php",
          data: {
            action: "show"
          },
          success: function(result) {
            $("#records").html(result);
          }
        });
      }
    });
  </script>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <div class="card" style="width: 100%;">
        <div class="card-body">
          <h2 class="card-title text-center">Basic Table</h2>          
          <button type="button" class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#myModalADD">Add Book</button>          
          <table class="table table-bordered" style="width:100%; margin-top: 1rem;">
            <thead>
              <tr>
                <th  class="text-center text-uppercase">Title</th>
                <th  class="text-center text-uppercase">ISBN</th>
                <th  class="text-center text-uppercase">Author</th>
                <th  class="text-center text-uppercase">Publisher</th>
                <th  class="text-center text-uppercase">Year Published</th>
                <th  class="text-center text-uppercase">Action</th>
              </tr>
            </thead>
            <tbody id="records">
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  </div>

  

  <?php include_once('modal-add.php') ?>
  <?php include_once('modal-edit.php') ?>  

</body>

</html>