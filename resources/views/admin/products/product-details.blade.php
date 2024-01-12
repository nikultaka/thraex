@extends('admin.layouts.index')
@section('admin-title','Product-Details')
@section('admin-content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Banner Settings</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Banner</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form onsubmit="return false" method="POST" id="bannerSettingForm" name="bannerSettingForm" enctype="multipart/form-data">
                @csrf
              <div class="mb-3">
                <input type="hidden" id="hid" name="hid" value="">
                <label class="form-label" for="basic-default-fullname">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="title..." />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Sub-Title</label>
                <input type="text" class="form-control" id="subTitle" name="subTitle" placeholder="Sub-title..." />
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Banner Image</label>
                <input type="hidden" id="imgHid" name="imgHid" value="">
                <input class="form-control" type="file" id="bannerImg" name="bannerImg" accept="image/png, image/gif, image/jpeg"/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-message">Banner Description</label>
                <textarea
                  id="banneDescription"
                  name="banneDescription"
                  class="form-control"
                  placeholder="banner description..."
                ></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
        </div>
      </div>
     

      <div class="row gy-3">
        <div class="col-lg-6 col-md-6">
        <h5 class="card-header">Banner Section</h5>
        </div>
    </div>
      <div class="table-responsive text-nowrap">
        <table class="table" id="productDetailsTable">
          <thead class="table-dark">
            <tr class="text-nowrap">
              <th>#id</th>
              <th>Title</th>
              <th>Sub-Title</th>
              <th>Image</th>
              <th>Description</th>
              <th>Details Of</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- @include('admin.products.modals.product-modal') --}}
@endsection

@section('admin-footer')
<script type="text/javascript" src="{{ asset('assets/admin/js/productDetails.js') }}"></script>
@endsection