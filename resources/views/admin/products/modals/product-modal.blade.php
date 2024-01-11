<div class="modal fade" id="productsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Products</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
            <form onsubmit="return false" method="POST" id="productsForm" name="productsForm">
                @csrf
          <div class="row">
            <input type="hidden" name="hid" id="hid" value="">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Product Name</label>
              <input type="text" id="productname" name="productname" class="form-control" placeholder="Enter Name" />
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
            </form>
      </div>
    </div>
  </div>