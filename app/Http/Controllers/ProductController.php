<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
   
    /**
     * List products (Admin + Customer)
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index',compact('products'));
    }

    /**
     * Admin only
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Admin only
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'stock' => 'required|integer',
        ]);

        if($request->hasFile('image')){
            $imageUrl = self::uploadImage($request->file('image'));
            if (isset($imageUrl) && $imageUrl) {
                $validated['image'] = $imageUrl;
            }            
        }

        Product::create($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Admin only
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Admin only
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'stock' => 'required|integer',
        ]);

        if($request->hasFile('image')){
        $imageUrl = self::uploadImage($request->file('image'));
            if (isset($imageUrl) && $imageUrl) {
                $validated['image'] = $imageUrl;
            }            
        }

        $product->update($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Admin only
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    private static function uploadImage($image)
    {
        $image = Image::make($image)->resize(322, 180, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('jpg');

        $apiKey = config('app.image_api_key');
        $url = 'https://freeimage.host/api/1/upload';

        $imageData = base64_encode(file_get_contents($image->getRealPath()));

        $response = \Http::withOptions(['verify' => false])->asForm()->post($url, [
            'key' => $apiKey,
            'source' => $imageData,
        ]);

        // return $response;

        if ($response->successful()) {
            $data = $response->json();
            return $data['image']['url'];
        }

        return null;
    }
}
