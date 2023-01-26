@section('title')
    Links App
    @stop
@can('Links App')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Links App</h4>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary pull-right">Dashboard</a>
                        </div>
                        <div class="card-body">
                            <div class="table">
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-has-icon alert-dismissible fade show" role="alert">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">success</div>
                                        {{Session::get('message')}}
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
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
                                <form class="form-horizontal" wire:submit.prevent="saveLinkApp">

                                <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Google Play
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" placeholder="Google Play Link" class="form-control"
                                                wire:model="googleplay">
                                            @error('googleplay') <p class="text-danger">{{$message}}</p>  @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">App Store
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" placeholder="App Store Link" class="form-control"
                                                wire:model="appstore">
                                            @error('appstore') <p class="text-danger">{{$message}}</p>  @enderror
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
        </div>
    </section>
</div>

@endcan