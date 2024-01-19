@extends('admin.layouts.index')
@section('admin-title','About')
@section('admin-content')


<div class="container-xxl flex-grow-1 container-p-y">
    {{-- <h4 class="fw-bold py-3 mb-4">About CMS</h4> --}}

    <div class="row">
        <div class="col-md-10">
            <div class="card mb-4">
              <h5 class="card-header">About Form</h5>
              <div class="card-body">
                <form onsubmit="return false" method="POST" id="aboutForm" name="aboutForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <input type="hidden" name="hid" name="hid" value>
                      <label for="title" class="form-label">title</label>
                      <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        placeholder="address..."
                      />
                    </div>
                    <div class="mb-3">
                      <label for="subtitle" class="form-label">subtitle</label>
                      <input
                        type="text"
                        class="form-control"
                        id="subtitle"
                        name="subtitle"
                        placeholder="address..."
                      />
                    </div>
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Image</label>
                      <input type="hidden" id="imgHid" name="imgHid" value="">
                      <input class="form-control" type="file" id="Img" name="Img" accept="image/png, image/gif, image/jpeg"/>
                    </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                  <button class="btn btn-primary float-end mt-3" type="submit">Submit</button>
                </div>
                </form>
              </div>
            </div>
          </div>
      </div>

  </div>

@endsection

@section('admin-footer')
<script type="text/javascript" src="{{ asset('assets/admin/js/cms.js') }}"></script>
@endsection