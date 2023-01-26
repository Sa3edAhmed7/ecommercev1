@extends('layouts.role')
@section('title')
Create New Account
    @stop
@can('Create New Account')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div
                    class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Create New Account</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Name">
                                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                <div class="form-group">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            placeholder="Email">
                                            @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                    <div class="form-group">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control"
                                             name="password" placeholder="Password">
                                        @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input id="password_confirmation" type="password" class="form-control"
                                            name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control" name="utype">
                                                <option value="">--</option>
                                                <option value="USR">User</option>
                                                <option value="ADM">Admin</option>
                                            </select>
                                            @error('utype') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                                        <div class="col-sm-12 col-md-7">
                                        {!! Form::select('role', $role,[], array('class' => 'form-control','multiple' ,'style'=> 'height: auto;')) !!}
                                        @error('role') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@endcan
