@section('title')
    Edit Product
@stop
@can('Edit Product')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product</h4>
                            <a href="{{ route('admin.pages') }}" class="btn btn-primary pull-right">All Products</a>
                        </div>
                        <div class="card-body">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                <strong>Success</strong> {{Session::get('message')}}
                            </div>
                            @endif
                            <form class="form-horizontal" wire:submit.prevent="updateProduct">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product
                                        Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" placeholder="Product Name" class="form-control"
                                            wire:model="name" wire:keyup="generateslug" />
                                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product
                                        Slug</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" placeholder="Product Slug" class="form-control"
                                            wire:model="slug" />
                                        @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Short
                                        Description</label>
                                    <div class="col-sm-12 col-md-7" wire:ignore>
                                        <textarea class="form-control" id="short_description"
                                            placeholder="Short Description" wire:model="short_description"></textarea>
                                        @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Regular
                                        Price</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" placeholder="Regular Price" class="form-control"
                                            wire:model="regular_price" />
                                        @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sale
                                        Price</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" placeholder="Sale Price" class="form-control"
                                            wire:model="sale_price" />
                                        @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SKU</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" placeholder="SKU" class="form-control" wire:model="SKU" />
                                        @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="stock_status">
                                            <option value="instock">InStock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                        @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Featured</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('featured') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Quantity</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" placeholder="Quantity" class="form-control"
                                            wire:model="quantity" />
                                        @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product
                                        Image</label>
                                    <div class="col-sm-12 col-md-7">
                                    <input type="file" class="input-file" wire:model="newimage" />
                                    @if($newimage)
                                    <img src="{{ $newimage->temporaryUrl() }}" width="120" />
                                    @else
                                    <img src="{{ asset('assets') }}/images/products/{{ $image }}" width="120">
                                    @endif
                                    @error('newimage') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Gallery</label>
                                    <div class="col-sm-12 col-md-7">
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
                                    @error('newimages') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12" wire:ignore>
                                        <textarea class="form-control" id="description" placeholder="Description"
                                            wire:model="description"></textarea>
                                        @error('description') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="category_id" wire:change="changeSubcategory">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SubCategory</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="scategory_id">
                                            <option value="0">Select Category</option>
                                            @foreach ($scategories as $scategory)
                                            <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('scategory_id') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product
                                        Attributes</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="attr"
                                            wire:change.prevent="add">
                                            <option value="1">Select Attribute</option>
                                            @foreach ($pattributes as $pattribute)
                                            <option value="{{ $pattribute->id }}">{{ $pattribute->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @foreach($inputs as $key => $value)
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ $pattributes->where('id',$attribute_arr[$key])->first()->name }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text"
                                        placeholder="{{ $pattributes->where('id',$attribute_arr[$key])->first()->name }}"
                                         class="form-control input-md" wire:model="attribute_values.{{ $value }}" />
                                        @error('attribute_values.*') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>                                  
                                </div>
                                @endforeach
       
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
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

@endcan