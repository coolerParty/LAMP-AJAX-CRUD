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
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="update">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>