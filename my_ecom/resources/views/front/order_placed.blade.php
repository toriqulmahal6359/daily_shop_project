@extends('front/layout')

@section('container')

    <!-- product category -->
    <section id="aa-product-category">
    <div class="container">
      <div class="row" style="text-align:center">
            <br><br><br><br><br><br><br>
                <br><h2>Your Order has been placed Successfully</h2><br>
                  <h2>Order ID:- {{session()->get('ORDER_ID')}}</h2><br>
            <br><br><br><br><br><br><br>
      </div>
    </div>
  </section>


@endsection