@extends('admin.layouts.index')
@section('admin-title','Contact')
@section('admin-content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Contact</h4>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Contact Form</h5>
              <div class="card-body">
                <form onsubmit="return false" method="POST" id="contactForm" name="contactForm">
                    @csrf
                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    placeholder="address..."
                  />
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    id="phone"
                    name="phone"
                    placeholder="phone..."
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="email..."
                  />
                </div>
                <div class="mb-3">
                  <label for="website" class="form-label">Website</label>
                  <input
                    type="text"
                    class="form-control"
                    id="website"
                    name="website"
                    placeholder="website..."
                  />
                  <button class="btn btn-primary float-end mt-3">Submit</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Contact Details</h5>
              <div class="card-body">
            
                <dl class="row mt-2">
              
                  <dt class="col-sm-3 text-truncate">ADDRESS</dt>
                  <dd class="col-sm-9">{{ isset($contactCms->address) ? $contactCms->address : '' }}</dd>

                  <dt class="col-sm-3 text-truncate">PHONE</dt>
                  <dd class="col-sm-9">
                    {{ isset($contactCms->phone) ? $contactCms->phone : '' }}
                  </dd>

                  <dt class="col-sm-3 text-truncate">EMAIL</dt>
                  <dd class="col-sm-9">{{ isset($contactCms->email) ? $contactCms->email : '' }}</dd>

                  <dt class="col-sm-3 text-truncate">WEBSITE</dt>
                  <dd class="col-sm-9">
                    {{ isset($contactCms->website) ? $contactCms->website : '' }}
                  </dd>
                </dl>
              </div>
            </div>
          </div>
      </div>
    <!--/ Responsive Table -->
  </div>

@endsection

@section('admin-footer')
<script type="text/javascript" src="{{ asset('assets/admin/js/cms.js') }}"></script>
@endsection