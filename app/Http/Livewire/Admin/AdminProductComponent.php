<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminProductComponent extends Component
{

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


        $user = User::findOrFail(Auth::user()->id)->first();
        $delete_product = Product::latest()->first();
        Notification::send($user, new \App\Notifications\Delete_Product($delete_product));
        return redirect(route('admin.products'))->with(session()->flash('delete_message','Product has been deleted successfully!'));
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.master');
    }
}
