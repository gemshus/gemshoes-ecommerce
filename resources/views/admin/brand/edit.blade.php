@extends('admin.layouts.app')

@section('style')

@endsection

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-12">
                  <h1>Edit Brand</h1>
                </div>
              </div>
            </div>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">

                          <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                              <!-- form start -->

                              <form action="" method="POST">

                                 {{@csrf_field()}}

                                <div class="card-body">
                                  <div class="form-group">
                                    <label >Brand Name <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" required value="{{ old('name', $getRecord->name)}}"
                                    name="name"  placeholder="Brand Name">
                                  </div>

                                  <div class="form-group">
                                    <label >Slug <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" required value="{{ old('slug', $getRecord->slug)}}"
                                    name="slug"  placeholder="Slug Ex. URL">

                                    <div style="color: red">{{ $errors->first('slug')}} </div>

                                  </div>

                                  <div class="form-group">
                                    <label >Status <span style="color: red">*</span></label>
                                    <select class="form-control" name="status" required>
                                        <option {{ (old('status', $getRecord->status) == 0) ? 'selected' : ''}} value="0"> Active</option>
                                        <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : ''}} value="1"> Inactive</option>
                                    </select>
                                  </div>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label >Meta Title <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" required value="{{ old('meta_title', $getRecord->meta_title)}}"
                                    name="meta_title"  placeholder="Meta Title">
                                  </div>

                                  <div class="form-group">
                                    <label >Meta Description</label>
                                    <textarea class="form-control" placeholder="Meta Description" name="meta_description">{{ old('meta_description',$getRecord->meta_description) }}</textarea>
                                  </div>

                                  <div class="form-group">
                                    <label >Meta Keywords</label>
                                    <input type="text" class="form-control"  value="{{ old('meta_kewords',$getRecord->meta_keywords)}}"
                                    name="meta_keywords"  placeholder="Meta Keywords">
                                  </div>

                                <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
</div>
  @endsection
  @section('script')
  @endsection
