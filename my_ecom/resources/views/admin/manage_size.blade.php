@extends('admin/dashboard')

@section('page_title', 'Manage Size')
@section('size_select', 'active')

@section('container')


<h1 class="mb-10">Manage Size</h1>
<a href="{{url('admin/size')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Size Management</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Size Management</h3>
                </div>
                <hr>
                <form action="{{route('size.manage_size_process')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group">
                        <label for="size" class="control-label mb-1">Enter Size</label>
                        <input id="size" value="{{$size}}" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('size')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
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