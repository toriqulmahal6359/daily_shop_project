@extends('front/layout')
@section('container')

<!-- Cart view section -->
<section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form id="frmPlaceOrder">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    @if(session()->has('FRONT_USER_LOGIN')==null)
                      <input type="button" class="aa-browse-btn" value="Login" data-toggle="modal" data-target="#login-modal">
                      <br><br><br>OR<br><br><br>
                    @endif
                    <!-- Coupon section -->

                    <!-- Login section -->

                    <!-- Billing Details -->
                    
                    <!-- Shipping Address -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="accordion" href="collapseFour">
                            User Information Address
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                         <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Name*" name="name" value="{{$customers['name']}}" required>
                              </div>                             
                            </div>
                          </div> 

                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*" name="email" value="{{$customers['email']}}" required>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Mobile Number*" name="mobile" value="{{$customers['mobile']}}" required>
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                              <label for="address">Address<span>*</span></label>
                                <textarea cols="8" rows="3" name="address" required>{{$customers['address']}}</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select>
                                  <option value="0">Select Your Country</option>
                                  <option value="1">Australia</option>
                                  <option value="2">Afganistan</option>
                                  <option value="3">Bangladesh</option>
                                  <option value="4">Belgium</option>
                                  <option value="5">Brazil</option>
                                  <option value="6">Canada</option>
                                  <option value="7">China</option>
                                  <option value="8">Denmark</option>
                                  <option value="9">Egypt</option>
                                  <option value="10">India</option>
                                  <option value="11">Iran</option>
                                  <option value="12">Israel</option>
                                  <option value="13">Mexico</option>
                                  <option value="14">UAE</option>
                                  <option value="15">UK</option>
                                  <option value="16">USA</option>
                                </select>
                              </div>                             
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Appartment, Suite etc.">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="City / Town*" name="city" value="{{$customers['city']}}" required>
                              </div>
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="State*" name="state" value="{{$customers['state']}}" required>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Postcode / ZIP*" name="zip" value="{{$customers['zip']}}" required>
                              </div>
                            </div>
                          </div> 
                           <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3">Special Notes</textarea>
                              </div>                             
                            </div>                            
                          </div>              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php
                        $totalPrice = 0;
                      @endphp
                        @foreach($cart_data as $list)
                          @php
                            $totalPrice = $totalPrice + ($list->price * $list->qty);
                          @endphp
                        <tr>
                          <td>{{$list->name}}<strong> x  {{$list->qty}}</strong>
                            <br><span class="cart_color">{{$list->color}}</span>
                          </td>
                          <td>${{$list->price * $list->qty}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr class="hide coupon_show_box">
                          <th>Coupon Code <a href="javascript:void(0)" class="remove_coupon_code_link" onclick="remove_coupon_code()">Remove</a></th>
                          <td id="coupon_code_str"></td>
                        </tr>
                        <tr class="hide coupon_show_box">
                          <th>Value</th>
                          <td id="coupon_code_value"></td>
                        </tr>
                        <tr>
                          <th>Total</th>
                          <td id="total_price">$ {{$totalPrice}}</td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <h4>Coupon Code</h4>
                    <div class="aa-payment-method coupon_code">
                      <input type="text" placeholder="Coupon Code" class="aa-coupon-code apply_coupon_code_box" name="coupon_code" id="coupon_code">
                      <input type="button" value="Apply Coupon" class="aa-browse-btn apply_coupon_code_box" onclick="applyCouponCode()">
                      <div id="coupon_code_msg"></div>
                    </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">                    
                    <label for="cod"><input type="radio" id="cod" name="payment_type" value="COD"> Cash on Delivery </label>
                    <label for="instamojo"><input type="radio" id="instamojo" name="payment_type" value="Gateway"> Via instamojo </label>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">    
                    <input type="submit" value="Place Order" class="aa-browse-btn" id="btnPlaceOrder">                
                  </div>
                  <div id="order_place_msg"></div> 
                </div>
              </div>
            </div>
            @csrf
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->



@endsection