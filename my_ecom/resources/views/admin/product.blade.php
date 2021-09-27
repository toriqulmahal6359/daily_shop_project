@extends('admin/layout')

@section('page_title', 'Product')
@section('product_select', 'active')

@section('container')

@if(session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session('message')}}
</div>
@endif

<h1 class="mb-10">Product</h1>
<a href="{{url('admin/product/manage_product')}}">
    <button type="button" class="btn btn-success">Add Product</button>
</a>

<div class="row">
    <div class="col-md-12 row m-t-30">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Short Description</th>
                        <th>Description</th>
                        <th>Keywords</th>
                        <th>Technical Specification</th>
                        <th>Uses</th>
                        <th>Warranty</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->category_id}}</td>
                        <td>
                        @if($list->image != '')
                            <img width="100px" src="{{asset('storage/media/'.$list->image)}}">
                        @endif
                        </td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->brand}}</td>
                        <td>{{$list->model}}</td>
                        <td>{{$list->short_desc}}</td>
                        <td>{{$list->desc}}</td>
                        <td>{{$list->keywords}}</td>
                        <td>{{$list->technical_specifications}}</td>
                        <td>{{$list->uses}}</td>
                        <td>{{$list->warranty}}</td>
                        <td class="process">
                            <a href="{{url('admin/product/manage_product/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                            @if($list->status == 1)
                                <a href="{{url('admin/product/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-info">Active</button></a>
                            @elseif($list->status == 0)
                                <a href="{{url('admin/product/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-info">Deactive</button></a>
                            @endif
                            <a href="{{url('admin/product/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>

@endsection