<div class="modal fade" id="subproductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Sub-Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="return false" method="POST" id="subproductsForm" name="subproductsForm">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="hid" id="hid" value="">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Sub-Product Name</label>
                            <input type="text" id="subproductname" name="subproductname" class="form-control"
                                placeholder="Enter Name" />
                        </div>
                        <div class="row">
                            <div class="col mb-0">
                                <label for="exampleFormControlSelect1" class="form-label">Product</label>
                                <select class="form-select" id="productid" name="productid"
                                    aria-label="Default select example">
                                    @if (!empty($products) && count($products) > 0)
                                        @foreach ($products as $key => $data)
                                            @if ($key == 0)
                                                <option value="">Select Product</option>
                                            @endif
                                            <option value="{{ $data['id'] }}">
                                                {{ isset($data['product_name']) ? $data['product_name'] : '' }}</option>
                                        @endforeach
                                    @else
                                        <option selected="">Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    @endif
                                </select>
                            </div>
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
