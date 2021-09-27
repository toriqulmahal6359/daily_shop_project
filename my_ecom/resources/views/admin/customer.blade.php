@extends('admin/layout')

@section('page_title', 'Customer')
@section('customer_select', 'active')

@section('container')


@if(session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session('message')}}
</div>
@endif

<h1 class="mb-10">Customer</h1>

<div class="row">
    <div class="col-md-12 row m-t-30">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->mobile}}</td>
                        <td>{{$list->city}}</td>
                        <td class="process">
                            <a href="{{url('admin/customer/show/')}}/{{$list->id}}"><button type="button" class="btn btn-success">View</button></a>
                            @if($list->status == 1)
                                <a href="{{url('admin/customer/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-info">Active</button></a>
                            @elseif($list->status == 0)
                                <a href="{{url('admin/customer/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-info">Deactive</button></a>
                            @endif
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