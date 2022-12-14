<div>
    <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                <div class="col-md-6">
                    Edit Product
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All Products</a>
                </div>
                </div>
                </div>
                <div class="panel-body">
                @if(Session::has('message'))
                    <div class = "alert alert-success">
                    <strong>Success</strong> {{Session::get('message')}}
                    </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="updateProduct">
                        <div class="form-group">
                        <label class="col-md-4 control-label">Product Name</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug" />
                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Product Slug</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug" />
                    @error('slug') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Short Description</label>
                        <div class="col-md-4" wire:ignore>
                    <textarea class="form-control" id="short_description" placeholder="Short Description" wire:model="short_description"></textarea>
                    @error('short_description') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>


                <div class="form-group">
                        <label class="col-md-4 control-label">Regular Price</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price" />
                    @error('regular_price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Sale Price</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price" />
                    @error('sale_price') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">SKU</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU" />
                    @error('SKU') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>


                <div class="form-group">
                        <label class="col-md-4 control-label">Stock</label>
                        <div class="col-md-4">
                            <select class="form-control" wire:model="stock_status">
                                <option value="instock">InStock</option>
                                <option value="outofstock">Out of Stock</option>
                            </select>
                            @error('stock_status') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Featured</label>
                        <div class="col-md-4">
                    <select class="form-control" wire:model="featured">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                    </select>
                    @error('featured') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Quantity</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity" />
                    @error('quantity') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Product Image</label>
                        <div class="col-md-4">
                    <input type="file" class="input-file" wire:model="newimage" />
                    @if($newimage)
                    <img src="{{ $newimage->temporaryUrl() }}" width="120" />
                    @else
                    <img src="{{ asset('assets') }}/images/products/{{ $image }}" width="120">
                    @endif
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Product Gallery</label>
                        <div class="col-md-4">
                    <input type="file" class="input-file" wire:model="newimages" multiple />
                    @if($newimages)
                    @foreach($newimages as $newimage)
                    <img src="{{$newimage->temporaryUrl() }}" width="120" />
                    @endforeach
                    @else
                    @foreach($images as $image)
                    @if($image)
                    <img src="{{asset('assets') }}/images/products/{{ $image }}" width="120">
                    @endif
                    @endforeach
                    @endif
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Category</label>
                        <div class="col-md-4">
                    <select class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">SubCategory</label>
                        <div class="col-md-4">
                        <select class="form-control" wire:model="scategory_id">
                            <option value="0">Select Category</option>
                            @foreach ($scategories as $scategory)
                            <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                            @endforeach
                        </select>
                        @error('scategory_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                
                <div class="form-group">
                        <label class="col-md-4 control-label">Product Attributes</label>
                        <div class="col-md-3">
                        <select class="form-control" wire:model="attr" wire:change.prevent="add">
                            <option value="1">Select Attribute</option>
                            @foreach ($pattributes as $pattribute)
                            <option value="{{ $pattribute->id }}">{{ $pattribute->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @foreach($inputs as $key => $value)
                    <div class="form-group">
                            <label class="col-md-4 control-label">{{ $pattributes->where('id',$attribute_arr[$key])->first()->name }}</label>
                            <div class="col-md-3">
                        <input type="text" placeholder="{{ $pattributes->where('id',$attribute_arr[$key])->first()->name }}" class="form-control input-md" wire:model="attribute_values.{{ $value }}" />
                        </div>
                    </div>
                @endforeach

                <label class="col-md-4 control-label">Description</label>
                <div class="form-group">
                        
                        <div wire:ignore>
                    <textarea class="form-control" id="description" placeholder="Description" wire:model="description"></textarea>
                    @error('description') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@push('scripts')
<script>
    $(function(){
        tinymce.init({
            selector:'#short_description',
            setup:function(editor){
                editor.on('change',function(e){
                    tinyMCE.triggerSave();
                    var sd_data = $('#short_description').val();
                    @this.set('short_description',sd_data);
                });
            }
        });

        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            setup:function(editor){
                editor.on('change',function(e){
                    tinyMCE.triggerSave();
                    var d_data = $('#description').val();
                    @this.set('description',d_data);
                });
            }
        });
    });
</script>
@endpush