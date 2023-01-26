@extends('layouts.role')
@section('title')
Create New Role
@stop
@can('role-create')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create New Role</h4>
                            <a href="{{ route('admin.roles') }}" class="btn btn-primary pull-right">All Roles</a>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                @if(Session::has('error_message'))
                                <div class="alert alert-danger alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">error</div>
                                        {{Session::get('error_message')}}
                                    </div>
                                </div>
                                @endif
                                <form class="form-horizontal" action="{{ route('roles.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role Name
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" placeholder="Role Name" class="form-control" name="name">
                                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                        <div class="form-group">
                                            <strong>Permission:</strong>
                                            <div class="table"></div>
                                            <table>
                                            @foreach($permission as $value)
                                                <tr>                  
                                                <th><label>{{ $value->name }}</label></th>
                                                <td>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}</td>                                 
                                            </tr>
                                            @endforeach
                                            </table>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Create</button>
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
@endsection

@endcan