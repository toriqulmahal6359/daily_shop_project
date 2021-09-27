@extends('admin/dashboard')

@section('page_title', 'Manage Color')
@section('color_select', 'active')

@section('container')


<h1 class="mb-10">Manage Color</h1>
<a href="{{url('admin/color')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Color Management</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Color Management</h3>
                </div>
                <hr>
                <form action="{{route('color.manage_color_process')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group">
                        <label for="color" class="control-label mb-1">Enter Color</label>
                        <input id="color" value="{{$color}}" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('color')
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