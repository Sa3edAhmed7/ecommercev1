<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $searchTearm;

    public function deleteProduct($id)
    {
        $product =  Product::findOrFail($id);
        if($product->image)
        {
            unlink(public_path('assets/images/products'.'/'.$product->image));
        }
        if($product->images)
            {
                $images = explode(",",$product->images);
                foreach($images as $image)
                {
                    if($image)
                    {
                        unlink(public_path('assets/images/products'.'/'.$image));
                    }
                }
            }
        Product::where('id', $product->id)->delete();
        session()->flash('success_message','Product has been deleted successfully!');
    }

    public function render()
    {
        $search = '%' . $this->searchTearm . '%';
        $products = Product::where('name','LIKE',$search)
        ->orWhere('stock_status','LIKE',$search)
        ->orWhere('regular_price','LIKE',$search)
        ->orWhere('sale_price','LIKE',$search)
        ->orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
}
