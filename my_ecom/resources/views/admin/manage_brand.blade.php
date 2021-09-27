@extends('admin/dashboard')

@section('page_title', 'Manage Brand')
@section('brand_select', 'active')

@section('container')

@if($id > 0)
{{$image_required = ""}}
@else
{{$image_required = "required"}}
@endif

@error('image')
<div class="alert alert-danger" role="alert">
    {{$message}}
</div>
@enderror

<h1 class="mb-10">Manage Brand</h1>
<a href="{{url('admin/brand')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Brand Management</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Brand Management</h3>
                </div>
                <hr>
                <form action="{{route('brand.manage_brand_process')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group">
                        <label for="brand" class="control-label mb-1">Brand</label>
                        <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{$image_required}}>
                        @if($image != '')
                            <img width="100px" src="{{asset('storage/media/brand/'.$image)}}">
                        @endif
                        @error('image')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
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
</div>

@endsection