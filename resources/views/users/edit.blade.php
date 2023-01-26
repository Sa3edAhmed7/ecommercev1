@extends('layouts.role')
@section('title')
    Edit Your account
    @stop
@can('Edit Your account')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div
                    class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Edit Your account</h4>
                        </div>
                        <div class="card-body">
                        <form class="form-horizontal" action="{{ route('users.update', $user->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('put')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                                </div>

                                <input id="utype" type="hidden" class="form-control" name="utype" placeholder="Utype" value="{{$user->utype}}">

                                <div class="form-group">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                                    <div class="col-sm-12 col-md-7">
                                {!! Form::select('role', $role,$userRole, array('class' => 'form-control','multiple','style'=> 'height: auto;')) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Update
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
