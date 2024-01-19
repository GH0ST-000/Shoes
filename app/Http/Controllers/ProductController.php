<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Products;
use App\Models\Size;
use App\Models\Tags;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.AddProduct',[
            'tags' => Tags::all(),
            'sizes'=>Size::all(),
            'brands'=>Brand::all(),
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request){
        $tags = $this->concatenateAttributes($request->tags);
        $size = $this->concatenateAttributes($request->size);
        $brands = $this->concatenateAttributes($request->brands);
        $category = $this->concatenateAttributes($request->category);

        $data = $this->createProductDataArray($tags, $size, $brands, $category, $request);

        if (Products::create($data)) {
            return redirect()->route('admin.products')->with('message','Product Created');
        }
    }

    public function delete($id){
        $pr = Products::find($id);
        if ($pr->delete()) {
            return redirect()->route('admin.products')->with('message','Product Deleted');
        }
    }

    private function concatenateAttributes($attributes): string
    {
        $result = '';
        foreach ($attributes as $attr){
            $result .= $attr.',';
        }
        return $result;
    }

    private function createProductDataArray($tags, $size, $brands, $category, $request): array
    {
        return [
            'product_name'=>$request->product_name,
            'tags'=>$tags,
            'price'=>$request->product_price,
            'size'=>$size,
            'description'=>$request->description,
            'brands'=>$brands,
            'categories'=>$category,
            'image_url'=>$request->images[0],
            'sku'=>\Str::random(),
            'in_a_stock'=>$request->in_a_stock,
            'quantity'=>$request->quantity
        ];
    }
}
