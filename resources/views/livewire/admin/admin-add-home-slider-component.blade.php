@section('title')
    Add New Slide
    @stop
@can('Add New Slide')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Slide</h4>
                            <a href="{{ route('admin.homeslider') }}" class="btn btn-primary pull-right">All Slides</a>
                        </div>
                        <div class="card-body">
                        <div class="table">
                            @if(Session::has('success_message'))
                                <div class="alert alert-success alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">success</div>
                                        {{Session::get('success_message')}}
                                    </div>
                                </div>
                                @endif
                                @if(Session::has('error_message'))
                                <div class="alert alert-danger alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">error</div>
                                        {{Session::get('error_message')}}
                                    </div>
                                </div>
                                @endif
                            <form class="form-horizontal" wire:submit.prevent="storeSlider">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" placeholder="Title" class="form-control"
                                            wire:model="title">
                                        @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subtitle</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" placeholder="Subtitle" class="form-control"
                                            wire:model="subtitle">
                                        @error('subtitle') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" placeholder="Price" class="form-control"
                                            wire:model="price">
                                        @error('price') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" placeholder="Link" class="form-control"
                                            wire:model="link">
                                        @error('link') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" class="input-file" wire:model="image" />
                                        @if($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120" />
                                        @endif
                                        @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="status">
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                        @error('status') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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