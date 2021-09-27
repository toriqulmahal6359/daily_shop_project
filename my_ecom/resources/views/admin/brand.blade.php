@extends('admin/layout')

@section('page_title', 'Brand')
@section('brand_select', 'active')

@section('container')


@if(session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session('message')}}
</div>
@endif

<h1 class="mb-10">Brand</h1>
<a href="{{url('admin/brand/manage_brand')}}">
    <button type="button" class="btn btn-success">Add Brand</button>
</a>

<div class="row">
    <div class="col-md-12 row m-t-30">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Brand</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>
                        @if($list->image != '')
                            <img width="100px" src="{{asset('storage/media/brand/'.$list->image)}}">
                        @endif
                        </td>
                        <td class="process">
                            <a href="{{url('admin/brand/manage_brand/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                            @if($list->status == 1)
                                <a href="{{url('admin/brand/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-info">Active</button></a>
                            @elseif($list->status == 0)
                                <a href="{{url('admin/brand/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-info">Deactive</button></a>
                            @endif
                            <a href="{{url('admin/brand/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
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