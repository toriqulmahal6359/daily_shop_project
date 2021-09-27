@extends('admin/dashboard')

@section('page_title', 'Manage Tax')
@section('tax_select', 'active')

@section('container')


<h1 class="mb-10">Manage Tax</h1>
<a href="{{url('admin/tax')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Tax Management</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Tax Management</h3>
                </div>
                <hr>
                <form action="{{route('tax.manage_tax_process')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group">
                        <label for="tax_value" class="control-label mb-1">Tax Value</label>
                        <input id="tax_value" value="{{$tax_value}}" name="tax_value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('tax_value')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="tax_desc" class="control-label mb-1">Tax Description</label>
                        <input id="tax_desc" value="{{$tax_desc}}" name="tax_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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