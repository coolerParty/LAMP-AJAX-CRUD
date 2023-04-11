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
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="add">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>