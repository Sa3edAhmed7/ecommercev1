@section('title')
    Messages
    @stop
@can('Messages')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Messages</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(Session::has('message'))
                                <div class="alert alert-success alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Success</div>
                                        {{Session::get('message')}}
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
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Comment</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>       
                                            <div class="card-body">
                                            <div class="dropdown d-inline">
                                                <a type="button" class="btn btn-primary" href="{{route('admin.showcontact',['id'=>$contact->id])}}">
                                                    <i class="fa fa-envelope-open-o"></i>
                                                </a>
                                            </div>

                                                </div>
                                            </td>
                                        <td>{{ $contact->created_at }}</td>
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