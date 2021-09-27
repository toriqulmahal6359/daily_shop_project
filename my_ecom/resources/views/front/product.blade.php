@extends('front/layout')


@section('container')

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{asset('storage/media/'.$product[0]->image)}}" class="simpleLens-lens-image"><img src="{{asset('storage/media/'.$product[0]->image)}}" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          @if(isset($product_images[$product[0]->id][0]))
                            @foreach($product_images[$product[0]->id][0] as $list)
                            <a data-big-image="{{asset('storage/media/'.$list->image)}}" data-lens-image="{{asset('storage/media/'.$list->image)}}" class="simpleLens-thumbnail-wrapper">
                              <img width="40px" src="{{asset('storage/media/'.$list->image)}}">
                            </a>
                            @endforeach
                          @endif                                    
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{$product[0]->name}}</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price"><del>$ {{$product_attr[$product[0]->id][0]->price}}</del>&nbsp;&nbsp;&nbsp;</span>
                      <span class="aa-product-view-price">$ {{$product_attr[$product[0]->id][0]->mrp}}</span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                      @if($product[0]->lead_time!= '')
                        <p class="lead_time"><span>{{$product[0]->lead_time}}</span></p>
                      @endif
                    </div>
                    <p>{!!$product[0]->short_desc!!}</p>

                    @if($product_attr[$product[0]->id][0]->size_id > 0)
                    <h4>Size</h4>
                    <div class="aa-prod-view-size">
                        @php
                          $arrSize = [];
                          foreach($product_attr[$product[0]->id] as $attr)
                          {
                            $arrSize = $attr->size;
                          }
                          $arrSize = explode(" ", $arrSize);
                          $arrSize = array_keys(array_count_values(($arrSize)))
                        @endphp
                        @foreach($arrSize as $attr)
                        @if($attr != '')
                        <a href="javascript:void(0)" onclick="showColor('{{$attr}}')" id="size_{{$attr}}" class="size_link">{{$attr}}</a>
                        @endif
                        @endforeach
                    </div>
                    @endif

                    @if($product_attr[$product[0]->id][0]->color_id > 0)
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                        @foreach($product_attr[$product[0]->id] as $attr)
                        @if($attr->color!='')
                        <a href="javascript:void(0)" class="aa-color-{{strtolower($attr->color)}} product_color size_{{$attr->size}}" onclick=change_product_color_image("{{asset('storage/media/'.$attr->attr_image)}}","{{$attr->color}}")></a>
                        @endif
                        @endforeach
                    </div>
                    @endif

                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="qty" name="qty">
                          @for($i=1; $i<21; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#">{{$product[0]->model}}</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#" onclick="add_to_cart('{{$product[0]->id}}', '$product_attr[$product[0]->id][0]->size_id', '$product_attr[$product[0]->id][0]->color_id')">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                      <a class="aa-add-to-cart-btn" href="#">Compare</a>
                    </div>
                    <div id="add_to_cart_msg"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#technical_specification" data-toggle="tab">Technical Specification</a></li>
                <li><a href="#uses" data-toggle="tab">Uses</a></li>
                <li><a href="#warranty" data-toggle="tab">Warranty</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>{!!$product[0]->desc!!}</p>
                </div>
                <div class="tab-pane fade in active" id="technical_specification">
                  <p>{!!$product[0]->technical_specification!!}</p>
                </div>
                <div class="tab-pane fade in active" id="uses">
                  <p>{!!$product[0]->uses!!}</p>
                </div>
                <div class="tab-pane fade in active" id="warranty">
                  <p>{!!$product[0]->warranty!!}</p>
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4> 
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @if(isset($related_product[0]))
                        @foreach($related_product as $productArr)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productArr->slug)}}"><img width="300px" src="{{asset('/storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}"></a>
                            <a class="aa-add-card-btn"href="{{url('product/'.$productArr->slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$productArr->slug)}}">{{$productArr->name}}</a></h4>
                              @if(isset($related_product_attr[$productArr->id][0]))
                              <span class="aa-product-price">$ {{$related_product_attr[$productArr->id][0]->mrp}}</span>
                              <span class="aa-product-price"><del>$ {{$related_product_attr[$productArr->id][0]->price}}</del></span>
                              @endif
                            </figcaption>
                          </figure>                         
                          <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                          </div>
                          <!-- product badge -->
                           <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                        </li>
                        @endforeach
                        @else
                        <ul>
                          <li>
                            <figure>No Data Available</figure>
                          </li>
                        </ul>
                        @endif                                          
                 <!-- start single product item -->
                
                <!-- start single product item -->
               
                <!-- start single product item -->
                
                <!-- start single product item -->
               
                <!-- start single product item -->
               
                <!-- start single product item -->
                
                <!-- start single product item -->
                                                                                
              </ul>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <form id="frmAddToCart">
      <input type="hidden" id="size_id" name="size_id">
      <input type="hidden" id="color_id" name="color_id">
      <input type="hidden" id="product_qty" name="product_qty">
      <input type="hidden" id="product_id" name="product_id">
      @csrf
  </form>
  <!-- / product category -->

@endsection