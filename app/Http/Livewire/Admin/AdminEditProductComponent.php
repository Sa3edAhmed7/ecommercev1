<?php

namespace App\Http\Livewire\Admin;


use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $images;
    public $category_id;
    public $newimage;
    public $newimages;
    public $product_id;
    public $scategory_id;

    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values = [];


    public function mount($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = explode(",",$product->images);
        $this->category_id = $product->category_id;
        $this->scategory_id = $product->subcategory_id;
        $this->product_id = $product->id;
        $this->inputs = $product->attributeValues->where('product_id',$product->id)->unique('product_attribute_id')->pluck('product_attribute_id');
        $this->attribute_arr = $product->attributeValues->where('product_id',$product->id)->unique('product_attribute_id')->pluck('product_attribute_id');

        foreach($this->attribute_arr as $a_arr)
        {
            $allAttributeValue = AttributeValue::where('product_id',$product->id)->where('product_attribute_id',$a_arr)->get()->pluck('value');
            $valueString = '';
            foreach($allAttributeValue as $value)
            {
                $valueString = $valueString . $value . ',';
            }
            $this->attribute_values[$a_arr] = rtrim($valueString,",");
        }
    }

    public function add()
    {
        if(!$this->attribute_arr->contains($this->attr))
        {
            $this->inputs->push($this->attr);
            $this->attribute_arr->push($this->attr);
        }
    }


    public function generateslug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' =>  'required',
            'short_description' =>  'required',
            'description' =>  'required',
            'regular_price' =>  'required|numeric',
            'sale_price' =>  'numeric',
            'SKU' =>  'required',
            'stock_status' =>  'required',
            'featured' =>  'required',
<<<<<<< HEAD
            'quantity' =>  'required',
=======
            'quantity' =>  'required|numeric',
>>>>>>> 1b84a1e (first)
            'category_id' =>  'required',
            'attribute_values.*' => 'required',
        ]);
<<<<<<< HEAD
        
=======

>>>>>>> 1b84a1e (first)
        if($this->newimage)
        {
            $this->validateOnly($fields,[
            'newimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }

        if($this->newimages)
        {
            $this->validateOnly($fields,[
            'newimages' => 'required|array',
            'newimages.*' => 'mimes:jpeg,png,jpg,gif,svg',
            ]);
        }
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' =>  'required',
            'short_description' =>  'required',
            'description' =>  'required',
            'regular_price' =>  'required|numeric',
            'sale_price' =>  'numeric',
            'SKU' =>  'required',
            'stock_status' =>  'required',
            'featured' =>  'required',
<<<<<<< HEAD
            'quantity' =>  'required',
=======
            'quantity' =>  'required|numeric',
>>>>>>> 1b84a1e (first)
            'category_id' =>  'required',
            'attribute_values.*' => 'required',
        ]);
<<<<<<< HEAD
        
=======

>>>>>>> 1b84a1e (first)
        if($this->newimage)
        {
            $this->validate([
            'newimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }

        if($this->newimages)
        {
            $this->validate([
            'newimages' => 'required|array',
            'newimages.*' => 'mimes:jpeg,png,jpg,gif,svg',
            ]);
        }
<<<<<<< HEAD
        
=======

>>>>>>> 1b84a1e (first)
        $product = Product::findOrFail($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        if($this->newimage)
        {
            unlink(public_path('assets/images/products'.'/'.$product->image));
            $imageName = $product->name.'/'.uniqid() . '_' . time() . '_' . $this->newimage->getClientOriginalName();
            $this->newimage->storeAs('products',$imageName);
            $product->image = $imageName;
        }

        if($this->newimages)
        {
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
            $imagesName = '';
            foreach($this->newimages as $key=>$image)
            {
                $imgName = $product->name.'/'.uniqid() . '_' . time(). $key . '_' . $image->getClientOriginalName();
                $image->storeAs('products',$imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }

            $product->images = $imagesName;
        }
        $product->category_id = $this->category_id;
        if($this->scategory_id)
        {
            $product->subcategory_id = $this->scategory_id;
        }
        $product->save();

        AttributeValue::where('product_id',$product->id)->delete();
        foreach($this->attribute_values as $key=>$attribute_value)
        {
            $avalues = explode(",",$attribute_value);
            foreach($avalues as $avalue)
            {
                $attr_value = new AttributeValue();
                $attr_value->product_attribute_id = $key;
                $attr_value->value = $avalue;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }


        $user = User::findOrFail(Auth::user()->id)->first();
        $edit_product = Product::latest()->first();
        Notification::send($user, new \App\Notifications\Edit_Product($edit_product));
        return redirect(route('admin.products'))->with(session()->flash('message','Product has been updated successfully!'));
    }

    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }

    public function render()
    {
        $categories = Category::all();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
        $pattributes = ProductAttribute::all();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories,'scategories'=>$scategories,'pattributes'=>$pattributes])->layout('layouts.master');

    }
}
