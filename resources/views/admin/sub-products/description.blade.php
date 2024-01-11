@extends('admin.layouts.index')
@section('admin-title','Description')
@section('admin-content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Sub-Product's Description</h4>
    <!-- Responsive Table -->
    <div class="card">
        <div class="row gy-3">
            <div class="col-lg-6 col-md-6">
            <h5 class="card-header">Sub-Products</h5>
            </div>
            <div class="col-lg-6 col-md-6">
                <button type="button" class="btn btn-primary float-end mt-2 ms-2" id="addSubProduct">
                               Add Sub-Product
                </button>
            </div>
        </div>
      <div class="table-responsive text-nowrap">
        <table class="table" id="subproductsTable">
          <thead class="table-dark">
            <tr class="text-nowrap">
              <th>#id</th>
              <th>Sub-Product Name</th>
              <th>Product Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Responsive Table -->
  </div>

  @include('admin.sub-products.modals.subproduct-modal')
@endsection

@section('admin-footer')
<script type="text/javascript" src="{{ asset('assets/admin/js/subproducts.js') }}"></script>
@endsection