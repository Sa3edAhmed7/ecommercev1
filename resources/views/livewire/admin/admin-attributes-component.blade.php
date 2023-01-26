@section('title')
    All Attributes
    @stop
@can('All Attributes')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Attributes</h4>
                            @can('Add New Attribute')
                            <a href="{{ route('admin.add_attribute') }}" class="btn btn-primary"><i
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
                                            <th>Name</th>
                                            <th>Created At</th>
                                            @can('Edit Attribute')
                                            <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pattributes as $pattribute)
                                        <tr>
                                            <td>{{ $pattribute->id }}</td>
                                            <td>{{ $pattribute->name }}</td>
                                            <td>{{ $pattribute->created_at }}</td>
                                            @can('Edit Attribute')
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
                                                                href="{{ route('admin.edit_attribute',['attribute_id'=>$pattribute->id]) }}"><i
                                                                    class="far fa-edit"></i> Edit</a>
                                                                @can('delete attribute')
                                                            <a class="dropdown-item has-icon" class="btn" href="#"
                                                                data-toggle="modal" data-id="" data-name=""
                                                                data-target="#exampleModalCenter1"
                                                                onclick="confirm ('Are you sure, You want to delete this attribute?') || event.stopImmediatePropagation()" wire:click.prevent="deleteAttribute({{ $pattribute->id }})">
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
