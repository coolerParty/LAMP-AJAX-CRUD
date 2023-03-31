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

        var title = $("#title").val();
        var isbn = $("#isbn").val();
        var author = $("#author").val();
        var publisher = $("#publisher").val();
        var year_published = $("#year_published").val();

        var data = {
          action        : "add",
          title         : title,
          isbn          : isbn,
          author        : author,
          publisher     : publisher,
          year_published: year_published
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
        var id = $(this).closest("tr").find(".id").text();
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
      });

      // Edit record button click
      $(document).on("click", ".edit", function() {

        var id = $(this).closest("tr").find(".id").text();
        var title = $(this).closest("tr").find(".title").text();
        var isbn = $(this).closest("tr").find(".isbn").text();
        var author = $(this).closest("tr").find(".author").text();
        var publisher = $(this).closest("tr").find(".publisher").text();
        var year_published = $(this).closest("tr").find(".year_published").text();

        $("#edit_id").val(id);
        $("#edit_title").val(title);
        $("#edit_isbn").val(isbn);
        $("#edit_author").val(author);
        $("#edit_publisher").val(publisher);
        $("#edit_year_published").val(year_published);

      });

      // Update record button click
      $("#update").click(function() {

        var id = $("#edit_id").val();
        var title = $("#edit_title").val();
        var isbn = $("#edit_isbn").val();
        var author = $("#edit_author").val();
        var publisher = $("#edit_publisher").val();
        var year_published = $("#edit_year_published").val();

        var data = {
          action: "update",
          id    : id,
          title  : title,
          isbn  : isbn,
          author : author,
          publisher : publisher,
          year_published : year_published,
        };
        $.ajax({
          type: "POST",
          url: "save.php",
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
          url: "save.php",
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
    <h2>Basic Table</h2>
    <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <div class="float-right"><button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#myModalADD">Add</button></div>

    <table class="table" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>title</th>
          <th>ISBN</th>
          <th>Author</th>
          <th>Publisher</th>
          <th>Year Publisher</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="records">
        
      </tbody>
    </table>
  </div>

  <!-- Modal Add -->
  <div class="modal fade" id="myModalADD" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title">
          </div>

          <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" id="isbn">
          </div>

          <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author">
          </div>

          <div class="form-group">
            <label for="publisher">Publisher:</label>
            <input type="text" class="form-control" id="publisher">
          </div>

          <div class="form-group">
            <label for="year_published">Year Published:</label>
            <input type="integer" class="form-control" id="year_published">
          </div>

          <button type="button" class="btn btn-default" id="add">Submit</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal Update -->
  <div class="modal fade" id="myModalUPDATE" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Edit</h4>
        </div>
        <div class="modal-body">
        <input type="hidden" class="form-control" id="edit_id">

          <div class="form-group">
            <label for="edit_title">Title:</label>
            <input type="text" class="form-control" id="edit_title">
          </div>

          <div class="form-group">
            <label for="edit_isbn">ISBN:</label>
            <input type="text" class="form-control" id="edit_isbn">
          </div>

          <div class="form-group">
            <label for="edit_author">Author:</label>
            <input type="text" class="form-control" id="edit_author">
          </div>

          <div class="form-group">
            <label for="edit_publisher">Publisher:</label>
            <input type="text" class="form-control" id="edit_publisher">
          </div>

          <div class="form-group">
            <label for="edit_year_published">Year Published:</label>
            <input type="number" class="form-control" id="edit_year_published">
          </div>

          <button type="button" class="btn btn-default" id="update">Submit</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</body>

</html>