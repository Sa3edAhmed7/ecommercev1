@section('title')
    All Products
    @stop
@can('All Products')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Products</h4>
                            @can('Add New Product')
                            <a href="{{ route('admin.addproduct') }}" class="btn btn-primary"><i
                                    class="fas fa-plus">New</i></a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(Session::has('success_message'))
                                <div class="alert alert-success alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Success</div>
                                        {{Session::get('success_message')}}
                                    </div>
                                </div>
                                @endif

                                @if(Session::has('update_message'))
                                <div class="alert alert-info alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Success</div>
                                        {{Session::get('update_message')}}
                                    </div>
                                </div>
                                @endif

                                @if(Session::has('delete_message'))
                                <div class="alert alert-danger alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Success</div>
                                        {{Session::get('delete_message')}}
                                    </div>
                                </div>
                                @endif
                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                <!-- <input type="text" class="form-control" style="width:50%; margin:auto; padding:auto;" placeholder="Search..."  wire:model="searchTearm"/> -->
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Stock</th>
                                            <th>Price</th>
                                            <th>Sale Price</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            @can('Edit Product')
                                            <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        @php
                                        $test_orig_image = "../assets/images/products/$product->name/$product->image";
                                        $my_deafult_image ="../assets/images/products/$product->image";
                                        @endphp
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td><img src="<?= check_image_exists($test_orig_image, $my_deafult_image); ?>"
                                                    width="60" alt="{{ $product->name }}" /></td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->stock_status }}</td>
                                            <td>{{ $product->regular_price }}</td>
                                            <td>{{ $product->sale_price }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->created_at }}</td>
                                            @can('Edit Product')
                                            <td>
                                            <div class="card-body">
                                                    <div class="dropdown d-inline">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton2" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-spin fa-cog"></i>

                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item has-icon"
                                                                href="{{ route('admin.editproduct',['product_slug'=>$product->slug]) }}"><i
                                                                    class="far fa-edit"></i> Edit</a>
                                                                    @can('delete product')
                                                            <a class="dropdown-item has-icon" class="btn" href="#"
                                                                data-toggle="modal" data-id="{{ $product->id }}"
                                                                data-name="{{ $product->name }}"
                                                                data-target="#exampleModalCenter1" wire:click="deleteProduct({{ $product->id }})">
                                                                <i class="far fa-trash-alt"
                                                                    aria-hidden="true"></i>Trash</a>
                                                                @endcan
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                            @endcan
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endcan
