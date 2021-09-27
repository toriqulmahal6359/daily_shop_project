@extends('admin/dashboard')

@section('page_title', 'Manage Home Banner')
@section('home_banner_select', 'active')

@section('container')


<h1 class="mb-10">Manage Home Banner</h1>
<a href="{{url('admin/home_banner')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Banner Management</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Banner Management</h3>
                </div>
                <hr>
                <form action="{{route('home_banner.manage_home_banner_process')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="btn_txt" class="control-label mb-1">Button Text</label>
                                <input id="btn_txt" value="{{$btn_txt}}" name="btn_txt" type="text" class="form-control" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="col-md-6">
                                <label for="btn_link" class="control-label mb-1">Button Link</label>
                                <input id="btn_link" value="{{$btn_link}}" name="btn_link" type="text" class="form-control" aria-required="true" aria-invalid="false">        
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label mb-1">Banner Image</label>
                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                            @error('image')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            @if($image != '')
                                <a href="{{asset('storage/media/banner/'.$image)}}" target="_blank">
                                <img width="100px" src="{{asset('storage/media/banner/'.$image)}}"></a>
                            @endif
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