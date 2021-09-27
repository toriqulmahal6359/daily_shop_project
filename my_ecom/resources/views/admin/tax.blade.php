@extends('admin/layout')

@section('page_title', 'Tax')
@section('tax_select', 'active')

@section('container')

@if(session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session('message')}}
</div>
@endif

<h1 class="mb-10">Tax</h1>
<a href="{{url('admin/tax/manage_tax')}}">
    <button type="button" class="btn btn-success">Add Tax</button>
</a>

<div class="row">
    <div class="col-md-12 row m-t-30">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tax Value</th>
                        <th>Tax Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->tax_value}}</td>
                        <td>{{$list->tax_desc}}</td>
                        <td class="process">
                            <a href="{{url('admin/tax/manage_tax/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                            @if($list->status == 1)
                                <a href="{{url('admin/tax/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-info">Active</button></a>
                            @elseif($list->status == 0)
                                <a href="{{url('admin/tax/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-info">Deactive</button></a>
                            @endif
                            <a href="{{url('admin/tax/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
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