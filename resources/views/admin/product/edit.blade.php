@extends('admin.layouts.app')

@section('style')

<link rel="stylesheet" href="{{url('public/assets/plugins/summernote/summernote-bs4.min.css')}}">

@endsection

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-12">
                  <h1>Edit Product</h1>
                </div>
              </div>
            </div>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">

             <div class="col-md-12">

                @include('admin.layouts._message')
                            <!-- general form elements -->
                            <div class="card card-primary">
                              <!-- form start -->

                              <form action="" method="POST" enctype="multipart/form-data">

                                 {{@csrf_field()}}

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Title <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" required value="{{ old('title', $product->title)}}"
                                                name="title"  placeholder="title">
                                              </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >SKU <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" required value="{{ old('sku', $product->sku)}}"
                                                name="sku"  placeholder="SKU">
                                              </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Category <span style="color: red">*</span></label>
                                                <select class="form-control" required id="ChangeCategory" name="category_id">
                                                    <option value="">Select</option>

                                                    @foreach($getCategory as $category)
                                                    <option {{ ($product->category_id == $category->id) ? 'selected' : ''}}
                                                        value="{{ $category->id}}"> {{ $category->name}} </option>
                                                    @endforeach
                                                </select>
                                              </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Sub Category <span style="color: red">*</span></label>
                                                <select class="form-control" required id="getSubCategory" name="sub_category_id">
                                                    <option value="">Select</option>

                                                    @foreach($getSubCategory as $subcategory)
                                                    <option {{ ($product->sub_category_id == $subcategory->id) ? 'selected' : ''}}
                                                        value="{{ $subcategory->id}}"> {{ $subcategory->name}} </option>
                                                    @endforeach

                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Brand <span style="color: red">*</span></label>
                                            <select class="form-control" name="brand_id">
                                                <option value="">Select</option>

                                                @foreach($getBrand as $brand)
                                                <option {{ ($product->brand_id == $brand->id) ? 'selected' : ''}}
                                                    value="{{ $brand->id}}"> {{ $brand->name}} </option>

                                                @endforeach

                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Color <span style="color: red">*</span></label>
                                                @foreach($getColor as $color)
                                                @php
                                                         $checked = '';
                                                     @endphp
                                                   @foreach ($product->getColor as $pcolor)

                                                     @if($pcolor->color_id == $color->id)
                                                     @php
                                                         $checked = 'checked';
                                                     @endphp
                                                     @endif
                                                   @endforeach
                                             <div>
                                            <label><input {{ $checked }} type="checkbox" name="color_id[]" value="{{ $color->id}}"> {{ $color->name}} </label>
                                             </div>
                                                    @endforeach
                                          </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Size <span style="color: red">*</span></label>
                                        <div>
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th> Name </th>
                                                    <th> Price </th>
                                                    <th> Action </th>
                                                </tr>
                                                </thead>

                                                <tbody id="AppendSize">
                                                    @foreach($product->getSize as $size)
                                                    <tr>
                                                        <td>
                                                            <input type="text" value="{{ $size->name }}" name="size[100][name]" placeholder="Name" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" value="{{ $size->price }}" name="size[100][price]" placeholder="Price" class="form-control">
                                                        </td>

                                                        <td>
                                                            <button type="button" class="btn btn-danger DeleteSize ">Delete</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td>
                                                            <input type="text" name="size[100][name]" placeholder="Name" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="size[100][price]" placeholder="Price" class="form-control">
                                                        </td>

                                                        <td>
                                                            <button type="button" class="btn btn-primary AddSize ">Add</button>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >Retail Price <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required value="{{ $product->price}}"
                                            name="retail_price"  placeholder="Retail Price">
                                          </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >Bulk Price <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required value="{{ $product->bulk_price}}"
                                            name="bulk_price"  placeholder="Bulk Price">
                                          </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >Box Price <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required value="{{ $product->box_price}}"
                                            name="box_price"  placeholder="Box Price">
                                          </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Image <span style="color: red">*</span></label>
                                           <input type="file" name="image[]" class="form-control" multiple accept="image/*">
                                          </div>
                                    </div>
                                </div>

                                @if(!empty($product->getImage->count()))
                                <div class="row" id="sortable">
                                    @foreach($product->getImage as $image)
                                    @if($image !== null)

                                    <div class="col-md-1 sortable_image" id="{{ $image->id }}" style="text-align: center">
                                        <img style="width: 60%;height:100px;" src="{{ $image->getlogo()}}">
                                        <a  onclick="return confirm('Are you sure you want to delete this item?');" href="{{ url('admin/product/image_delete/' .$image->id)}}" style="margin-top: 10px;" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                      @endif
                                    @endforeach
                                </div>
                                @endif

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Short Description <span style="color: red">*</span></label>
                                           <textarea name="short_description" class="form-control" placeholder="Short Description">
                                            {{ $product->short_description}}
                                           </textarea>
                                          </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Description <span style="color: red">*</span></label>
                                           <textarea name="description" class="form-control editor" placeholder="Description">
                                            {{ $product->description}}
                                           </textarea>
                                          </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Additional Information <span style="color: red">*</span></label>
                                           <textarea name="additional_info" class="form-control editor" placeholder="Additional Information">
                                            {{ $product->additional_info}}
                                           </textarea>
                                          </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Shipping & Returns<span style="color: red">*</span></label>
                                           <textarea name="shipping_returns" class="form-control editor" placeholder="Shipping & Returns">
                                            {{ $product->shipping_returns}}
                                           </textarea>
                                          </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                <div class="form-group">
                                    <label >Status <span style="color: red">*</span></label>
                                    <select class="form-control" name="status" required>
                                        <option {{ ($product->status ==0) ? 'selected' : ''}}
                                        value="0">Active</option>
                                        <option {{ ($product->status ==1) ? 'selected' : ''}}
                                        value="1">Inactive</option>
                                    </select>
                                  </div>
                                    </div>
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

  <script src="{{url('public/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script src="{{ url('public/assets/sortable/jquery-ui.js') }}"></script>

    <script type="text/javascript">

    $(document).ready(function() {
        $( "#sortable" ).sortable({
            update : function(event, ui) {
            var photo_id = new Array();
            $('.sortable_image').each(function() {
                  var id = $(this).attr('id');
                  photo_id.push(id);
            });

            $.ajax({
            type : "POST",
            url : "{{ url('admin/product_image_sortable') }}",
            data : {
                 "photo_id" : photo_id,
                 "_token": "{{ csrf_token()}}"
            },

            dataType: "json",
            success: function(data) {

            },
            error:function (data) {

            }
        });

            }
        });
    });


   <!-- $('.editor').summernote('pasteHTML', '');-->

    var i = 101;
      $('body').delegate('.AddSize', 'click', function(){
     var html = ' <tr id="DeleteSize'+i+'">\n\
            <td>\n\
            <input type="text" name="size['+i+'][name]" placeholder="Name" class="form-control">\n\
            </td>\n\
            <td>\n\
            <input type="text" name="size['+i+'][price]" placeholder="Price" class="form-control">\n\
            </td>\n\
            <td>\n\
             <button type="button" id="'+i+'" class="btn btn-danger DeleteSize ">Delete</button>\n\
             </td>\n\
              </tr>';
               i++;
              $('#AppendSize').append(html);
      });

      $('body').delegate('.DeleteSize', 'click', function(){
           var id = $(this).attr('id');
             $('#DeleteSize'+id).remove();
      });

      ChangeCategory
      $(document).on('change', '#ChangeCategory', function(e){
        var id = $(this).val();
        $.ajax({
            type : "POST",
            url : "{{ url('admin/get_sub_category')}}",
            data : {
                 "id" : id,
                 "_token": "{{ csrf_token()}}"
            },

            dataType: "json",
            success: function(data) {
                if(data.error)
                {
                    alert(data.error)
                }
                else
                {
                    $('#getSubCategory').html(data.html);
                }
            },
            error:function (xhr, status, error) {
                alert('Error:' + error);
            }
        });
      });
      </script>

  @endsection
