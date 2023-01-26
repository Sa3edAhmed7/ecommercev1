@section('title')
    Change Password
    @stop
@can('Change Password')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Change Password</h4>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary pull-right">Dashboard</a>
                        </div>
                        <div class="card-body">
                            <div class="table">

                            @if(Session::has('password_success'))
                                <div class="alert alert-success alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">success</div>
                                        {{Session::get('password_success')}}
                                    </div>
                                </div>
                                @endif

                                @if(Session::has('password_error'))
                                <div class="alert alert-danger alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">error</div>
                                        {{Session::get('password_error')}}
                                    </div>
                                </div>
                                @endif
                                <form class="form-horizontal" wire:submit.prevent="changePassword">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="password" placeholder="Current Password" name="current_password" class="form-control"
                                                wire:model="current_password">
                                            @error('current_password') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">New Password
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="password" placeholder="New Password" name="password" class="form-control"
                                                wire:model="password">
                                            @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Confirm Password
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control"
                                                wire:model="password_confirmation">
                                            @error('password_confirmation') <p class="text-danger">{{$message}}</p> @enderror
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

@endcan