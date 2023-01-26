@section('title')
    Edit Category
    @stop
@can('Edit Category')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                            <a href="{{ route('admin.categories') }}" class="btn btn-primary pull-right">All Categories</a>
                        </div>
                        <div class="card-body">
                        @if(Session::has('success_message'))
                        <div class = "alert alert-success">
                        <strong>Success</strong> {{Session::get('success_message')}}
                        </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateCategory">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" placeholder="Category Name" class="form-control" wire:model="name" wire:keyup="generateslug">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Slug</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" placeholder="Category Slug" class="form-control" wire:model="slug">
                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Parent Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" wire:model="category_id">
                                    <option value="">None</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Update</button>
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

@endcan