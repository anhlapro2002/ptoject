<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\category;
use App\Models\productsdetail;
use App\Models\Ram;
use App\Models\Rom;
use App\Models\Cpu;
use App\Models\GPU;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Sử dụng model Products để lấy dữ liệu
        $obj = new Products();
        $products = $obj ->index()->paginate(5);
        return view('products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        $categories = (new Category())->index();
        $cpus = (new Cpu())->index();
        $gpus = (new Gpu())->index();
        $rams = (new Ram())->index();
        $roms = (new Rom())->index();
        return view('products.add', compact('categories', 'cpus', 'gpus', 'rams', 'roms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Create a unique name for the image
            $image->move(public_path('img'), $imageName); // Move the image to the public/img directory
        } else {
            $imageName = 'default.jpg'; // Provide a default image if none is uploaded
        }
    
        // Create a new product
        $product = new Products();
        $product->store(array_merge($request->all(), ['image' => $imageName]));
    
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products, Request $request)
    {   
        $productId = $request->id;
        $edit = $products->edit($productId);
        $categories = (new Category())->index();
        $cpus = (new Cpu())->index();
        $gpus = (new Gpu())->index();
        $rams = (new Ram())->index();
        $roms = (new Rom())->index();
        return view('Products.edit', compact('edit','products', 'categories', 'cpus', 'gpus', 'rams', 'roms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsRequest  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, Products $products)
    { 
        $id = $request->id;
        $imageName = $products->image; // Giữ giá trị cũ cho trường image

        // Xử lý ảnh mới nếu có
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Tạo tên duy nhất cho ảnh
            $image->move(public_path('img'), $imageName); // Di chuyển ảnh đến thư mục public/img

            // Xóa ảnh cũ nếu có và không phải là ảnh mặc định
            if ($products->image && $products->image != 'default.jpg') {
                $oldImagePath = public_path('img') . '/' . $products->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        // Cập nhật thông tin sản phẩm
        $products->name = $request->name;
        $products->description = $request->description;
        $products->status = $request->status;
        $products->CatId = $request->CatId;
        $products->CpuId = $request->CpuId;
        $products->GpuId = $request->GpuId;
        $products->RamId = $request->RamId;
        $products->RomId = $request->RomId;
        $products->image = $imageName; // Đặt giá trị của image

        // Cập nhật sản phẩm trong bảng 'products'
        $products->updateprd($id);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
