@extends('admin/dashboard')

@section('page_title', 'Manage Category')
@section('category_select', 'active')

@section('container')


<h1 class="mb-10">Manage Category</h1>
<a href="{{url('admin/category')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Category Management</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Category Management</h3>
                </div>
                <hr>
                <form action="{{route('category.manage_category_process')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="category_name" class="control-label mb-1">Category name</label>
                                <input id="category_name" value="{{$category_name}}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('category_name')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                <input id="category_slug" value="{{$category_slug}}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('category_slug')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="parent_category_id" class="control-label mb-1">Parent category</label>
                                <select name="parent_category_id" id="parent_category_id" class="form-control" aria-required="true" aria-invalid="false">
                                    <option value="0">Select Categories</option>
                                    @foreach($category as $list)
                                        @if($parent_category_id == $list->id)
                                            <option value="{{$list->id}}" selected>
                                        @else
                                            <option value="{{$list->id}}">
                                        @endif
                                    {{$list->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category_image" class="control-label mb-1">Category Image</label>
                        <input id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                            @error('category_image')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            @if($category_image != '')
                                <a href="{{asset('storage/media/category/'.$category_image)}}" target="_blank">
                                <img width="100px" src="{{asset('storage/media/category/'.$category_image)}}"></a>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="is_home" class="control-label mb-1">Show in Home Page</label>
                        <input id="is_home" name="is_home" type="checkbox" aria-required="true" aria-invalid="false" style="text-align: left;" {{$is_home_selected}}>
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
</div>

@endsection