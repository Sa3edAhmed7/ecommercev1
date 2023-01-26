@section('title')
    Manage Home Categories
    @stop
@can('Manage Home Categories')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Manage Home Categories</h4>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary pull-right">Dashboard</a>
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
                                <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Choose Categories</label>
                                    <div class="col-sm-12 col-md-7" wire:ignore>
                                        <select class="sel_categories form-control select2" name="categories[]" multiple="multiple" wire:model="selected_categories">
                                        <option value="0">Choose Categories</option>
                                        @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Of Products</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" placeholder="No Of Products" class="form-control"
                                                wire:model="numberofproducts">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    $(document).ready(function(){
        $('.sel_categories').select2();
        $('.sel_categories').on('change',function(e){
            var data = $('.sel_categories').select2("val");
            @this.set('selected_categories',data);
        });
    });
</script>
@endpush

@endcan