<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="book_js.js"></script>
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
            <tbody id="records"></tbody>
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