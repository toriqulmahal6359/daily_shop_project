@extends('admin/dashboard')

@section('page_title', 'Manage Coupon')
@section('coupon_select', 'active')

@section('container')


<h1 class="mb-10">Manage Coupon</h1>
<a href="{{url('admin/coupon')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Coupon Management</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Coupon Management</h3>
                </div>
                <hr>
                <form action="{{route('coupon.manage_coupon_process')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="title" class="control-label mb-1">Title</label>
                                <input id="title" value="{{$title}}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('title')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="code" class="control-label mb-1">Code</label>
                                <input id="code" value="{{$code}}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('code')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="value" class="control-label mb-1">Value</label>
                                <input id="value" value="{{$value}}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('value')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>  
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="type" class="control-label mb-1">IS Discounted</label>
                                <select name="type" id="type" class="form-control" aria-required="true" aria-invalid="false">
                                    @if($type == 'Value')
                                        <option value="Value" selected>Value</option>
                                        <option value="Per">Per</option>
                                    @elseif($type == 'Per')
                                        <option value="Value">Value</option>
                                        <option value="Per" selected>Per</option>
                                    @else
                                        <option value="Value">Value</option>
                                        <option value="Per">Per</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="min_order_amt" class="control-label mb-1">Min Order Amt</label>
                                <input id="min_order_amt" value="{{$min_order_amt}}" name="min_order_amt" type="text" class="form-control" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="col-md-4">
                                 <label for="is_one_time" class="control-label mb-1">IS One Time</label>
                                    <select name="is_one_time" id="is_one_time" class="form-control" aria-required="true" aria-invalid="false">
                                    @if($is_one_time == '1')
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    @else
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>              
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                  
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