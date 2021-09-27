@extends('front/layout')

@section('container')

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 <form action="" class="aa-login-form" id="frmUpdatePassword">

                      <label for="">New Password<span>*</span></label>
                      <input type="password" name="password" placeholder="New Password" required>
                      <div id="password_error" class="field_error"></div>

                    <button type="submit" class="aa-browse-btn" id="btnUpdatePassword">Update Password</button>
                    @csrf                    
                  </form>
                </div>
                <div id="success_msg" class="field_error"></div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->



@endsection