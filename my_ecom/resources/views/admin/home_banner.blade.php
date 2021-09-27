@extends('admin/layout')

@section('page_title', 'Home Banner')
@section('home_banner_select', 'active')

@section('container')

@if(session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session('message')}}
</div>
@endif

<h1 class="mb-10">Home Banner</h1>
<a href="{{url('admin/home_banner/manage_home_banner')}}">
    <button type="button" class="btn btn-success">Add Banner</button>
</a>

<div class="row">
    <div class="col-md-12 row m-t-30">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Button Text</th>
                        <th>Button Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td><img width="100px" src="{{asset('storage/media/banner/'.$list->image)}}"></td>
                        <td>{{$list->btn_txt}}</td>
                        <td>{{$list->btn_link}}</td>
                        <td class="process">
                            <a href="{{url('admin/home_banner/manage_home_banner/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                            @if($list->status == 1)
                                <a href="{{url('admin/home_banner/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-info">Active</button></a>
                            @elseif($list->status == 0)
                                <a href="{{url('admin/home_banner/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-info">Deactive</button></a>
                            @endif
                            <a href="{{url('admin/home_banner/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
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