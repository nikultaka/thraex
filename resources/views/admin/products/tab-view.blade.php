@extends('admin.layouts.index')
@section('admin-title','Product-Details')
@section('admin-content')

<div class="container-xxl flex-grow-1 container-p-y">

<div class="card mb-4">
    <h5 class="card-header">Product Details</h5>
    <div class="card-body">
      <div class="row">
        <!-- Custom content with heading -->
        <div class="col-lg-12 mb-4 mb-xl-0">
          <div class="mt-3">
            <div class="row">
              <div class="col-md-2 col-12 mb-3 mb-md-0">
                <div class="list-group">
                  <a
                    class="list-group-item list-group-item-action active"
                    id="list-home-list"
                    data-bs-toggle="list"
                    href="#list-home">Banner</a
                  >
                  <a
                    class="list-group-item list-group-item-action"
                    id="list-profile-list"
                    data-bs-toggle="list"
                    href="#list-profile"
                    >Product Description</a
                  >
                  <a
                    class="list-group-item list-group-item-action"
                    id="list-messages-list"
                    data-bs-toggle="list"
                    href="#list-messages">Technology</a
                  >
                  <a
                    class="list-group-item list-group-item-action"
                    id="list-settings-list"
                    data-bs-toggle="list"
                    href="#list-settings">Technology(Sub-part)
                    </a>
                  <a
                    class="list-group-item list-group-item-action"
                    id="list-addon-list"
                    data-bs-toggle="list"
                    href="#list-addon">Add-Ons
                    </a>
                  <a
                    class="list-group-item list-group-item-action"
                    id="list-material-list"
                    data-bs-toggle="list"
                    href="#list-material">Materials
                    </a>
                </div>
              </div>
              <div class="col-md-10 col-12">
                <div class="tab-content p-0">
                  <div class="tab-pane fade show active" id="list-home">
                    <div class="col-xl">
                        <div class="card mb-4">
                          <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Banner</h5>
                            {{-- <small class="text-muted float-end">Default label</small> --}}
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
                  </div>
                  <div class="tab-pane fade" id="list-profile">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                  <h5 class="mb-0">Description</h5>
                                  {{-- <small class="text-muted float-end">Default label</small> --}}
                                </div>
                                <div class="card-body">
                                  <form onsubmit="return false" method="POST" id="descriptionForm" name="descriptionForm">
                                      @csrf
                                      <div class="mb-3">
                                        <input type="hidden" id="hid" name="hid" value="">
                                      <label class="form-label" for="basic-default-message">Description-1</label>
                                      <textarea
                                        id="description1"
                                        name="description1"
                                        class="form-control"
                                        placeholder="description..."
                                      ></textarea>
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label" for="basic-default-message">Description-2</label>
                                      <textarea
                                        id="description2"
                                        name="description2"
                                        class="form-control"
                                        placeholder="description..."
                                      ></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                  </form>
                                </div>
                              </div>
                        </div>
                       
                      </div>
                  </div>
                  <div class="tab-pane fade" id="list-messages">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                  <h5 class="mb-0">Technology</h5>
                                </div>
                                <div class="card-body">
                                  <form onsubmit="return false" method="POST" id="technologyForm" name="technologyForm" enctype="multipart/form-data">
                                      
                                    @csrf

                                      <div class="mb-3">
                                        <input type="hidden" id="hid" name="hid" value="">
                                        <label class="form-label" for="basic-default-fullname">Technology Title</label>
                                        <input type="text" class="form-control" id="tectitle" name="tectitle" placeholder="title..." />
                                      </div>

                                      <div class="mb-3">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input type="hidden" id="imgHid" name="imgHid" value="">
                                        <input class="form-control" type="file" id="tecImg" name="tecImg" accept="image/png, image/gif, image/jpeg"/>
                                      </div>

                                    <div class="mb-3">
                                      <label class="form-label" for="basic-default-message">Description</label>
                                      <textarea
                                        id="tecdescription"
                                        name="tecdescription"
                                        class="form-control"
                                        placeholder="description..."
                                      ></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                  </form>
                                </div>
                              </div>
                        </div>
                       
                      </div>
                  </div>
                  <div class="tab-pane fade" id="list-settings">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                  <h5 class="mb-0">Technology(Sub-part)</h5>
                                </div>
                                <div class="card-body">
                                  <form onsubmit="return false" method="POST" id="technologySubForm" name="technologySubForm">
                                    @csrf
                                      <div class="mb-3">
                                        <input type="hidden" id="hid" name="hid" value="">
                                        <label class="form-label" for="basic-default-fullname">Title</label>
                                        <input type="text" class="form-control" id="tecSubtitle" name="tecSubtitle" placeholder="title..." />
                                      </div>

                                    <div class="mb-3">
                                      <label class="form-label" for="basic-default-message">Description</label>
                                      <textarea
                                        id="tecSubdescription"
                                        name="tecSubdescription"
                                        class="form-control"
                                        placeholder="description..."
                                      ></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                  </form>
                                </div>
                              </div>
                        </div>
                       
                      </div>
                  </div>
                  <div class="tab-pane fade" id="list-addon">
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
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                  </div>
                  <div class="tab-pane fade" id="list-material">
                    <form onsubmit="return false" method="POST" id="materialForm" name="materialForm" enctype="multipart/form-data">
                       
                        @csrf

                          <div class="mb-3">
                            <input type="hidden" id="hid" name="hid" value="">
                            <label class="form-label" for="basic-default-fullname">Material Title</label>
                            <input type="text" class="form-control" id="materialtitle" name="materialtitle" placeholder="title..." />
                          </div>

                          <div class="mb-3">
                            <label for="formFile" class="form-label">Material Image</label>
                            <input type="hidden" id="imgHid" name="imgHid" value="">
                            <input class="form-control" type="file" id="materialImg" name="materialImg" accept="image/png, image/gif, image/jpeg"/>
                          </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">Material Description</label>
                          <textarea
                            id="materialdescription"
                            name="materialdescription"
                            class="form-control"
                            placeholder="description..."
                          ></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('admin-footer')
<script type="text/javascript" src="{{ asset('assets/admin/js/productDetails.js') }}"></script>
@endsection