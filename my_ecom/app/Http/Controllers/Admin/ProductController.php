<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $result['data'] = Product::all();
        return view('admin/product', $result);
    }

    public function manage_product(Request $request, $id='')
    {
        if($id > 0)
        {
            $arr = Product::where(['id' => $id])->get();

            $result['category_id'] = $arr['0']->category_id;
            $result['image'] = $arr['0']->image;
            $result['name'] = $arr['0']->name;
            $result['slug'] = $arr['0']->slug;
            $result['brand'] = $arr['0']->brand;
            $result['model'] = $arr['0']->model;
            $result['short_desc'] = $arr['0']->short_desc;
            $result['desc'] = $arr['0']->desc;
            $result['keywords'] = $arr['0']->keywords;
            $result['technical_specification'] = $arr['0']->technical_specification;
            $result['uses'] = $arr['0']->uses;
            $result['warranty'] = $arr['0']->warranty;

            $result['lead_time'] = $arr['0']->lead_time;
            $result['tax_id'] = $arr['0']->tax_id;
            $result['is_promo'] = $arr['0']->is_promo;
            $result['is_featured'] = $arr['0']->is_featured;
            $result['is_discounted'] = $arr['0']->is_discounted;
            $result['is_tranding'] = $arr['0']->is_trending;

            $result['id'] = $arr['0']->id;

            $result['productAttrArr'] = DB::table('products_attr')->where(['product_id' => $id])->get();

            $result['productImagesArr'] = DB::table('product_images')->where(['product_id' => $id])->get();

        }
        else
        {
            $result['category_id'] = '';
            $result['image'] = '';
            $result['name'] = '';
            $result['slug'] = '';
            $result['brand'] = '';
            $result['model'] = '';
            $result['short_desc'] = '';
            $result['desc'] = '';
            $result['keywords'] = '';
            $result['technical_specification'] = '';
            $result['uses'] = '';
            $result['warranty'] = '';
            $result['id'] = 0;

            $result['lead_time'] = '';
            $result['tax_id'] = '';
            $result['is_promo'] = '';
            $result['is_featured'] = '';
            $result['is_discounted'] = '';
            $result['is_tranding'] = '';

            $result['productAttrArr'][0]['id'] = '';
            $result['productAttrArr'][0]['product_id'] = '';
            $result['productAttrArr'][0]['attr_image'] = '';
            $result['productAttrArr'][0]['sku'] = '';
            $result['productAttrArr'][0]['mrp'] = '';
            $result['productAttrArr'][0]['price'] = '';
            $result['productAttrArr'][0]['qty'] = '';
            $result['productAttrArr'][0]['size_id'] = '';
            $result['productAttrArr'][0]['color_id'] = '';
            
            $result['productImagesArr'][0]['id'] = '';
            $result['productImagesArr'][0]['images'] = '';

        }

        $result['category'] = DB::table('categories')->where(['status' => 1])->get();
        $result['sizes'] = DB::table('sizes')->where(['status' => 1])->get();
        $result['colors'] = DB::table('colors')->where(['status' => 1])->get();
        $result['brands'] = DB::table('brands')->where(['status' => 1])->get();
        $result['taxes'] = DB::table('taxes')->where(['status' => 1])->get();

        return view('admin/manage_product', $result);
    }

    public function manage_product_process(Request $request)
    {
        // return $request->post();
        // echo "<pre>";
        // print_r($request->post());
        // die();
        if($request->post('id') > 0)
        {
            $image_validation = "mimes:jpeg,jpg,png,webp";
        }
        else
        {
            $image_validation = "required|mimes:jpeg,jpg,png,webp";
        }

        $request->validate([
            'name' => 'required',
            'image' => $image_validation,
            'slug' => 'required|unique:products,slug,'.$request->post('id'),
            'attr_image.*' => 'mimes: jpeg,jpg,png,webp',
            'images.*' => 'mimes: jpeg,jpg,png,webp',
        ]);

        $paidArr = $request->post('paid');
        $skuArr = $request->post('sku');
        $mrpArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
        $size_idArr = $request->post('size_id');
        $color_idArr = $request->post('color_id');
        $mrpArr = $request->post('mrp');

        foreach($skuArr as $key => $val)
        {
            $check = DB::table('products_attr')->
            where('sku', '=', $skuArr[$key])->
            where('id', '!=', $paidArr[$key])->
            get();

            if(isset($check[0]))
            {
                $request->session()->flash('sku_error', $skuArr[$key].' SKU already Used');
                return redirect(request()->headers->get('referer'));
            }
        }

        if($request->post('id') > 0)
        {
            $model = Product::find($request->post('id'));
            $msg = 'Product Updated Successfully';
        }
        else
        {
            $model = new Product();
            $msg = 'Product Inserted Successfully';
        }

        if($request->hasfile('image'))
        {
            if($request->post('id') > 0){
                $arrImage = DB::table('products')->where(['id' => $request->post('id')])->get();
                if(Storage::exists('/public/media/'.$arrImage[0]->image)){
                    Storage::delete('/public/media/'.$arrImage[0]->image);
                }
            }

            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media', $image_name);
            $model->image = $image_name;
        }

        $model->category_id = $request->post('category_id');
        $model->name = $request->post('name');
        $model->slug = $request->post('slug');
        $model->brand = $request->post('brand');
        $model->model = $request->post('model');
        $model->short_desc = $request->post('short_desc');
        $model->desc = $request->post('desc');
        $model->keywords = $request->post('keywords');
        $model->technical_specification = $request->post('technical_specification');
        $model->uses = $request->post('uses');
        $model->warranty = $request->post('warranty');

        $model->lead_time = $request->post('lead_time');
        $model->tax_id = $request->post('tax_id');
        $model->is_promo = $request->post('is_promo');
        $model->is_featured = $request->post('is_featured');
        $model->is_discounted = $request->post('is_discounted');
        $model->is_tranding = $request->post('is_tranding');

        $model->status = 1;
        $model->save();
        $pid = $model->id;

        // product attribute start
        $paidArr = $request->post('paid');
        $skuArr = $request->post('sku');
        $mrpArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
        $size_idArr = $request->post('size_id');
        $color_idArr = $request->post('color_id');
        $mrpArr = $request->post('mrp');

        foreach($skuArr as $key => $val)
        {
            $productAttrArr['product_id'] = $pid;
            $productAttrArr['sku'] = $skuArr[$key];
            $productAttrArr['mrp'] = (int)$mrpArr[$key];
            $productAttrArr['price'] = (int)$priceArr[$key];
            $productAttrArr['qty'] = (int)$qtyArr[$key];
            if($size_idArr[$key] == ''){
                $productAttrArr['size_id'] = '';
            }else{
                $productAttrArr['size_id'] = $size_idArr[$key];
            }

            if($color_idArr[$key] == ''){
                $productAttrArr['color_id'] = '';
            }else{
                $productAttrArr['color_id'] = $color_idArr[$key];
            }

            if($request->hasFile("attr_image.$key")){

                if($paidArr[$key] != ''){
                    $arrImage = DB::table('products_attr')->where(['id' => $paidArr[$key]])->get();
                    if(Storage::exists('/public/media/'.$arrImage[0]->attr_image)){
                        Storage::delete('/public/media/'.$arrImage[0]->attr_image);
                    }
                }

                $rand = rand('111111111', '999999999');
                $attr_image = $request->file("attr_image.$key");
                $ext = $attr_image->extension();
                $image_name = $rand.'.'.$ext;
                $request->file("attr_image.$key")->storeAs('/public/media', $image_name);
                $productAttrArr['attr_image'] = $image_name;
            }else{
                $productAttrArr['attr_image'] = '';
            }
            
            if($paidArr[$key] != ''){
                DB::table('products_attr')->where(['id' => $paidArr[$key]])->update($productAttrArr);
            }else{
                DB::table('products_attr')->insert($productAttrArr);
            }
        }
        //product_attr end

        //product images start

        $piidArr = $request->post('piid');
        foreach($piidArr as $key => $val)
        {
            $productImagesArr['product_id'] = $pid;
            if($request->hasFile("images.$key")){

                if($piidArr[$key] != ''){
                    $arrImage = DB::table('product_images')->where(['id' => $piidArr[$key]])->get();
                    if(Storage::exists('/public/media/'.$arrImage[0]->images)){
                        Storage::delete('/public/media/'.$arrImage[0]->images);
                    }
                }

                $rand = rand('111111111', '999999999');
                $images = $request->file("images.$key");
                $ext = $images->extension();
                $image_name = $rand.'.'.$ext;
                $request->file("images.$key")->storeAs('/public/media', $image_name);
                $productImagesArr['images'] = $image_name;

            }else{
                $productImagesArr['images'] = '';
            }

            if($piidArr[$key] != ''){
                DB::table('product_images')->where(['id' => $piidArr[$key]])->update($productImagesArr);
            }else{
                DB::table('product_images')->insert($productImagesArr);
            }
            
        }

        //product images end

        $request->session()->flash('message', $msg);
        return redirect('admin/product');
    }

    public function delete(Request $request, $id)
    {
        $model = Product::find($id);
        $model->delete();
        
        $request->session()->flash('message', 'Product has been deleted');
        return redirect('admin/category');
    }

    public function status(Request $request, $status, $id)
    {
        $model = Product::find($id);
        $model->status = $status;
        $model->save();

        $request->session()->flash('message', 'Product status has been updated Successfully !!!');
        return redirect('admin/product');
    }

    public function product_attr_delete(Request $request, $paid, $pid)
    {
        $arrImage =DB::table('products_attr')->where(['id' => $paid])->get();
        if(Storage::exists('/public/media/'.$arrImage[0]->attr_image)){
            Storage::delete('/public/media/'.$arrImage[0]->attr_image);
        }
        DB::table('products_attr')->where(['id' => $paid])->delete();
        return redirect('admin/product/manage_product/'.$pid);
    }

    public function product_images_delete(Request $request, $piid, $pid)
    {
        $arrImage =DB::table('product_images')->where(['id' => $piid])->get();
        if(Storage::exists('/public/media/'.$arrImage[0]->images)){
            Storage::delete('/public/media/'.$arrImage[0]->images);
        }
        DB::table('product_images')->where(['id' => $piid])->delete();
        return redirect('admin/product/manage_product/'.$pid);
    }

}
