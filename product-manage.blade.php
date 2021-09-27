        <h2 class="mb-10">Product Images</h2> 
                <div class="col-lg-12">
                    @php
                        $loop_count_num = 1
                    @endphp
                    @foreach($productImagesArr as $key => $val)
                    @php
                        $pIArr = (array)$val;
                        $loop_count_prev = $loop_count_num;
                    @endphp
                    <input type="hidden" id="piid" name="piid[]" value="{{$pIArr['id']}}">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row" id="product_images_box">
                                        <div class="col-md-4 product_images_{{$loop_count_num++}}">
                                            <label for="images" class="control-label mb-1">Image</label>
                                            <input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                            @if($pIArr['images'] != '')
                                                <img width="100px" src="{{asset('storage/media/'.$pIArr['images'])}}">
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                        <label for="attr_image" class="control-label mb-1">&nbsp;&nbsp;&NonBreakingSpace;</label><br>
                                            @if($loop_count_num == 2)
                                                <button type="button" class="btn btn-success btn-lg" onclick="add_image()"><i class="fa fa-plus"></i>&nbsp; Add</button>
                                            @else
                                                <a href="{{url('admin/product/product_images_delete/')}}/{{$pIArr['id']}}/{{$id}}">
                                                <button type="button" class="btn btn-danger btn-lg" onclick="remove_image()"><i class="fa fa-minus"></i>&nbsp; Remove</button></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                product_images_{{$loop_count_num++}}