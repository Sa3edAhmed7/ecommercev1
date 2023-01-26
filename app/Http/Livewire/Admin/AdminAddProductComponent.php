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

class AdminAddProductComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
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
    public $scategory_id;

    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
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
            'quantity' =>  'required|numeric',
            'category_id' =>  'required',
            'attr' => 'required',
            'attribute_values' => 'required',
        ]);

        if($this->image)
        {
            $this->validateOnly($fields,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
        }

        if($this->images)
        {
            $this->validateOnly($fields,[
            'images' => 'required|array',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ]);
        }
    }

    public function add()
    {
        if(!in_array($this->attr,$this->attribute_arr))
        {
            array_push($this->inputs,$this->attr);
            array_push($this->attribute_arr,$this->attr);
        }
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function storeProduct()
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
            'quantity' =>  'required|numeric',
            'category_id' =>  'required',
            'attr' => 'required',
            'attribute_values' => 'required',
        ]);

        if($this->image)
        {
            $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }

        if($this->images)
        {
            $this->validate([
            'images' => 'required|array',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg',
            ]);
        }

        $product = new Product();
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

        if($this->image)
        {
            $imageName = $product->name.'/'.uniqid() . '_' . time() . '_' . $this->image->getClientOriginalName();
            $this->image->storeAs('products',$imageName);
            $product->image = $imageName;
        }


        if($this->images)
        {
            $imagesName = '';
            foreach($this->images as $key=>$image)
            {
                $imgName = $product->name.'/'.uniqid() . '_' . time(). $key . '_' . $this->image->getClientOriginalName();
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
            $add_product = Product::latest()->first();
            Notification::send($user, new \App\Notifications\Add_Product($add_product));

        return redirect(route('admin.products'))->with(session()->flash('success_message','Product has been created successfully!'));
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
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories,'scategories'=>$scategories,'pattributes'=>$pattributes])->layout('layouts.master');
    }
}
