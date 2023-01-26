@section('title')
    All Categories
    @stop
@can('All Categories')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Categories</h4>
                            @can('Add New Category')
                            <a href="{{ route('admin.addcategory') }}" class="btn btn-primary"><i class="fas fa-plus">New</i></a>
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
                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Slug</th>
                                            <th>Sub Category</th>
                                            @can('Edit Category')
                                            <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            @can('Edit Category')
                                            <td>
                                                <div class="card-body">
                                                @foreach($category->subcategories as $scategory)
                                                    <div class="dropdown d-inline">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton2" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            {{ $scategory->name }}
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item has-icon"
                                                                href="{{route('admin.editcategory',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}"><i
                                                                    class="far fa-edit"></i> Edit</a>
                                                            @can('delete category')
                                                            <a class="dropdown-item has-icon" class="btn" href="#" data-toggle="modal" data-id="{{ $scategory->id }}" data-name="{{ $scategory->name }}"
                                                            data-target="#exampleModalCenter1" wire:click="destroySubcategory({{ $scategory->id }})">
                                                            <i class="far fa-trash-alt" aria-hidden="true"></i>Trash</a>
                                                            @endcan
                                                        </div>
                                                    </div>

                                                </div>

                                        @endforeach
                                     </td>
                                     @endcan
                                     @can('Edit Category')
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
                                                                href="{{ route('admin.editcategory',['category_slug'=>$category->slug]) }}"><i
                                                                    class="far fa-edit"></i> Edit</a>
                                                            @can('delete category')
                                                            <a class="dropdown-item has-icon" class="btn" href="#" data-toggle="modal" data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                                            data-target="#exampleModalCenter2" wire:click="deleteCategory({{ $category->id }})">
                                                            <i class="far fa-trash-alt" aria-hidden="true"></i>Trash</a>
                                                            <a class="dropdown-item has-icon" href="#"><i
                                                                    class="far fa-eye"></i> View</a>
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
</div>

@endcan
