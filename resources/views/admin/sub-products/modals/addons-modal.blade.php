<div class="modal fade" id="addonModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Add-Ons</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="return false" method="POST" id="addonForm" name="addonForm" enctype="multipart/form-data">
                       
                    @csrf

                      <div class="mb-3">
                        <input type="hidden" id="hid" name="hid" value="">
                        <label class="form-label" for="basic-default-fullname">Add-on Title</label>
                        <input type="text" class="form-control" id="addontitle" name="addontitle" placeholder="title..." />
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Add-on Image</label>
                        <input type="hidden" id="imgHid" name="imgHid" value="">
                        <input class="form-control" type="file" id="addonImg" name="addonImg" accept="image/png, image/gif, image/jpeg"/>
                      </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-message">Add-on Description</label>
                      <textarea
                        id="addOndescription"
                        name="addOndescription"
                        class="form-control"
                        placeholder="description..."
                      ></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-message">Category</label>
                        <select class="form-select" id="category" name="category"
                        aria-label="Default select example">
                            <option value="">Select Category</option>
                            <option value="1">Category-1</option>
                            <option value="2">Category-2</option>
                            <option value="3">Category-3</option>
                            <option value="4">Category-4</option>
                            <option value="5">Category-5</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>
            </div>
        </div>
    </div>
