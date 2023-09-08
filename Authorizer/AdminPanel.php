<style>
  .form-group {
    margin-bottom: 1rem;
  }

  .form-control-file {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    margin-bottom: .3rem;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    background-color: #fff;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
  }

  .form-control-file:focus {
    border-color: #777;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  }
</style>



<div class="mt-3" style="max-width: 35rem; margin: 0 auto;">
  <h3 class="text-center" style="color: #A8171A; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Upload Quiz Content</h3>
  <div>
    <form action="#" method="POST" id="uploadfile" enctype="multipart/form-data">
      <div class="form-group mb-3">
        <input type="text" class="form-control" id="topicName" name="topicName" placeholder="Topic Name" required>
      </div>
      <div class="form-group mb-3">
        <textarea class="form-control" id="topicDescription" name="topicDescription" rows="3" placeholder="Topic Description" required></textarea>
      </div>
      <div class="form-group mb-3">
        <label for="photoName">Upload Photo</label>
        <input type="file" class="form-control-file" id="photoName" name="photoName" accept="image/*" required>
      </div>
      <div class="form-group mb-3">
        <label for="fileName">Upload CSV File</label>
        <input type="file" class="form-control-file" id="fileName" name="fileName" accept=".csv" required>
      </div>
      <button type="submit" class="btn btn-primary">Upload</button>
    </form>
  </div>
</div>
