@extends('admin/dashboard')

@section('page_title', 'Manage Product')
@section('product_select', 'active')

@section('container')

@if($id > 0)
{{$image_required = ""}}
@else
{{$image_required = "required"}}
@endif

<h1 class="mb-10">Manage Product</h1>

@if(session()->has('sku_error'))
<div class="alert alert-danger" role="alert">
    {{session('sku_error')}}
</div>
@endif

@error('attr_image.*')
<div class="alert alert-danger" role="alert">
    {{$message}}
</div>
@enderror

@error('images.*')
<div class="alert alert-danger" role="alert">
    {{$message}}
</div>
@enderror

<a href="{{url('admin/product')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<div class="row m-t-30">
    <div class="col-md-12">
        <form action="{{route('product.manage_product_process')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Product Management</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Product Management</h3>
                            </div>
                            <hr>
                            <form action="{{route('product.manage_product_process')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Name</label>
                                    <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="control-label mb-1">Slug</label>
                                    <input id="slug" value="{{$slug}}" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('slug')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">Image</label>
                                    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{$image_required}}>
                                    @if($image != '')
                                            <a href="{{asset('storage/media/'.$image)}}" target="_blank"><img width="100px" src="{{asset('storage/media/'.$image)}}"></a>
                                    @endif
                                    @error('image')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="category_id" class="control-label mb-1">Category</label>
                                            <!-- <input id="category_id" value="{{$category_id}}" name="category_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required> -->
                                            <select name="category_id" id="category_id" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <option value="">Select Categories</option>
                                                @foreach($category as $list)
                                                @if($category_id == $list->id)
                                                <option selected value="{{$list->id}}">
                                                    @else
                                                <option value="{{$list->id}}">
                                                    @endif
                                                    {{$list->category_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="brand" class="control-label mb-1">Brand</label>
                                            <!-- <input id="brand" value="{{$brand}}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required> -->
                                            <select name="brand" id="brand" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <option value="">Select Brand</option>
                                                @foreach($brands as $list)
                                                        @if($brand == $list->id)
                                                        <option selected value="{{$list->id}}">{{$list->name}}</option>
                                                        @else
                                                        <option value="{{$list->id}}">
                                                        @endif
                                                    {{$list->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="model" class="control-label mb-1">Model</label>
                                            <input id="model" value="{{$model}}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('model')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">

                                </div>
                                <div class="form-group">

                                </div>
                                <div class="form-group">

                                </div> -->
                                <div class="form-group">
                                    <label for="short_desc" class="control-label mb-1">Short Description</label>
                                    <textarea name="short_desc" id="short_desc" value="{{$short_desc}}" class="form-control" autofocus required>{{$short_desc}}
                                    @error('short_desc')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="desc" class="control-label mb-1">Description</label>
                                    <textarea name="desc" id="desc" value="{{$desc}}" class="form-control" rows="5" autofocus required>{{$desc}}
                                    @error('desc')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keywords" class="control-label mb-1">Keywords</label>
                                    <textarea name="keywords" id="keywords" value="{{$keywords}}" class="form-control" rows="2" autofocus required>{{$keywords}}
                                    @error('keywords')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="technical_specification" class="control-label mb-1">Technical Specifications</label>
                                    <textarea name="technical_specification" id="technical_specification" value="{{$technical_specification}}" class="form-control" rows="5" autofocus required>{{$technical_specification}}
                                    @error('technical_specification')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="uses" class="control-label mb-1">Uses</label>
                                    <textarea name="uses" id="uses" id="uses" value="{{$uses}}" class="form-control" rows="4" autofocus required>{{$uses}}
                                    @error('uses')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="warranty" class="control-label mb-1">Warranty</label>
                                    <textarea name="warranty" id="warranty" id="warranty" value="{{$warranty}}" class="form-control" rows="1" autofocus required>{{$warranty}}
                                    @error('warranty')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="lead_time" class="control-label mb-1">Lead Time</label>
                                            <input id="lead_time" value="{{$lead_time}}" name="lead_time" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tax_id" class="control-label mb-1">Tax</label>
                                            <select name="tax_id" id="tax_id" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <option value="">Select Taxes</option>
                                                @foreach($taxes as $list)
                                                @if($tax_id == $list->id)
                                                <option selected value="{{$list->id}}">
                                                    @else
                                                <option value="{{$list->id}}">
                                                    @endif
                                                    {{$list->tax_desc}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="is_promo" class="control-label mb-1">IS Promo</label>
                                            <select name="is_promo" id="is_promo" class="form-control" aria-required="true" aria-invalid="false">
                                            @if($is_promo == '1')
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            @else
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            @endif
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="is_featured" class="control-label mb-1">IS Featured</label>
                                            <select name="is_featured" id="is_featured" class="form-control" aria-required="true" aria-invalid="false">
                                            @if($is_featured == '1')
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            @else
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            @endif
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="is_discounted" class="control-label mb-1">IS Discounted</label>
                                            <select name="is_discounted" id="is_discounted" class="form-control" aria-required="true" aria-invalid="false">
                                            @if($is_discounted == '1')
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            @else
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            @endif
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="is_tranding" class="control-label mb-1">IS Tranding</label>
                                            <select name="is_tranding" id="is_tranding" class="form-control" aria-required="true" aria-invalid="false">
                                            @if($is_tranding == '1')
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            @else
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <h2 class="mb-10">Product Images</h2>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row" id="product_images_box">
                                    @php
                                    $loop_count_num = 1
                                    @endphp
                                    @foreach($productImagesArr as $key => $val)
                                    @php
                                    $pIArr = (array)$val;
                                    @endphp
                                    <input type="hidden" id="piid" name="piid[]" value="{{$pIArr['id']}}">
                                    <div class="col-md-4 product_images_{{$loop_count_num++}}">
                                            <label for="image" class="control-label mb-1">Image</label>
                                            <input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                        @if($pIArr['images'] != '')
                                            <a href="{{asset('storage/media/'.$pIArr['images'])}}" target="_blank"><img width="100px" src="{{asset('storage/media/'.$pIArr['images'])}}"></a>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                            <label for="attr_image" class="control-label mb-1">&nbsp;&nbsp;&NonBreakingSpace;</label><br>
                                        @if($loop_count_num == 2)
                                        <button type="button" class="btn btn-success btn-lg" onclick="add_image()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                                        @else
                                            <a href="{{url('admin/product/product_images_delete/')}}/{{$pIArr['id']}}/{{$id}}">
                                            <button type="button" class="btn btn-danger btn-lg" onclick="remove_image()"><i class="fa fa-minus"></i>&nbsp; Remove</button></a>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="mb-10">Product Attribute</h2>
                <div class="col-lg-12" id="product_attr_box">
                    @php
                    $loop_count_num = 1
                    @endphp
                    @foreach($productAttrArr as $key => $val)
                    @php
                    $pAArr = (array)$val;
                    $loop_count_prev = $loop_count_num;
                    @endphp
                    <input type="hidden" id="paid" name="paid[]" value="{{$pAArr['id']}}">
                    <div class="card" id="product_attr_{{$loop_count_num++}}">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="sku" class="control-label mb-1">SKU</label>
                                        <input type="text" id="sku" name="sku[]" class="form-control" value="{{$pAArr['sku']}}" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="mrp" class="control-label mb-1">MRP</label>
                                        <input type="text" id="mrp" name="mrp[]" class="form-control" value="{{$pAArr['mrp']}}" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="price" class="control-label mb-1">Price</label>
                                        <input type="text" id="price" name="price[]" class="form-control" value="{{$pAArr['price']}}" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="size_id" class="control-label mb-1">Size</label>
                                        <select name="size_id[]" id="size_id" class="form-control">
                                            <option value="">Select Size</option>
                                            @foreach($sizes as $list)
                                            @if($pAArr['size_id'] == $list->id)
                                            <option selected value="{{$list->id}}">{{$list->size}}</option>
                                            @else
                                            <option value="{{$list->id}}">{{$list->size}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="color_id" class="control-label mb-1">Colors</label>
                                        <select name="color_id[]" id="color_id" class="form-control">
                                            <option value="">Select Color</option>
                                            @foreach($colors as $list)
                                            @if($pAArr['color_id'] == $list->id)
                                            <option selected value="{{$list->id}}">{{$list->color}}</option>
                                            @else
                                            <option value="{{$list->id}}">{{$list->color}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="qty" class="control-label mb-1">Quantity</label>
                                        <input type="text" id="qty" name="qty[]" class="form-control" value="{{$pAArr['qty']}}" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="attr_image" class="control-label mb-1">Image</label>
                                        <input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                        @if($pAArr['attr_image'] != '')
                                        <img width="100px" src="{{asset('storage/media/'.$pAArr['attr_image'])}}">
                                        @endif
                                    </div>
                                    @if($loop_count_num == 2)
                                    <div class="col-md-2">
                                        <label for="attr_image" class="control-label mb-1">&nbsp;&nbsp;&NonBreakingSpace;</label><br>
                                        <button type="button" class="btn btn-success btn-lg" onclick="add_one()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                                    </div>
                                    @else
                                    <div class="col-md-2">
                                        <label for="attr_image" class="control-label mb-1">&nbsp;&nbsp;&NonBreakingSpace;</label><br>
                                        <a href="{{url('admin/product/product_attr_delete/')}}/{{$pAArr['id']}}/{{$id}}">
                                            <button type="button" class="btn btn-danger btn-lg" onclick="remove_one()"><i class="fa fa-minus"></i>&nbsp; Remove</button></a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    var loop_count = 1;

    function add_one() {
        loop_count++
        var html = '<input type="hidden" id="paid" name="paid[]"><div class="card" id="product_attr_' + loop_count + '"><div class="card-body"><div class="form-group"><div class="row">';
        html += '<div class="col-md-2"><label for="sku" class="control-label mb-1">SKU</label><input type="text" id="sku" name="sku[]" class="form-control" aria-required="true" aria-invalid="false" required></div>';
        html += '<div class="col-md-2"><label for="mrp" class="control-label mb-1">MRP</label><input type="text" id="mrp" name="mrp[]" class="form-control" aria-required="true" aria-invalid="false" required></div>';
        html += '<div class="col-md-2"><label for="price" class="control-label mb-1">Price</label><input type="text" id="price" name="price[]" class="form-control" aria-required="true" aria-invalid="false" required></div>';
        var size_id_html = jQuery('#size_id').html();
        size_id_html = size_id_html.replace("selected", "");
        html += '<div class="col-md-3"><label for="size_id" class="control-label mb-1">Size</label><select name="size_id[]" id="size_id" class="form-control">' + size_id_html + '</select></div>';
        var color_id_html = jQuery('#color_id').html();
        color_id_html = color_id_html.replace("selected", "");
        html += '<div class="col-md-3"><label for="color_id" class="control-label mb-1">Color</label><select name="color_id[]" id="color_id" class="form-control">' + color_id_html + '</select></div>';
        html += '<div class="col-md-2"><label for="qty" class="control-label mb-1">Quantity</label><input type="text" id="qty" name="qty[]" class="form-control" aria-required="true" aria-invalid="false" required></div>';
        html += '<div class="col-md-4"><label for="attr_image" class="control-label mb-1">Image</label><input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false"></div>';

        html += '<div class="col-md-2"><label for="attr_image" class="control-label mb-1">&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_one("' + loop_count + '")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>';
        html += '</div></div></div></div>';

        jQuery('#product_attr_box').append(html)
    }

    function remove_one(loop_count) {
        jQuery('#product_attr_' + loop_count).remove();
    }

    var loop_image_count = 1;

    function add_image() {
        loop_image_count++

        var html = '<input type="hidden" id="piid" name="piid[]"><div class="col-md-4 product_images_' + loop_image_count + '"><label for="images" class="control-label mb-1">Image</label><input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false"></div>';
        html += '<div class="col-md-2 product_images_' + loop_image_count + '"><label for="attr_image" class="control-label mb-1">&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_image("' + loop_image_count + '")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>';

        jQuery('#product_images_box').append(html);
    }

    function remove_image(loop_image_count) {
        jQuery('.product_images_' + loop_image_count).remove();
    }

    CKEDITOR.replace('short_desc');
    CKEDITOR.replace('desc');
    CKEDITOR.replace('technical_specification');
    CKEDITOR.replace('uses');
</script>
@endsection