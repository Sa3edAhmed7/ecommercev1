@section('title')
All Users
@stop
@can('All Users')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Users</h4>
                            @can('Create New Account')
                            <a href="{{ route('users.create') }}" class="btn btn-primary"><i
                                    class="fas fa-plus">New</i></a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                @if(Session::has('success_message'))
                                <div class="col-12 col-sm-6 col-lg-6">
                                    <div class="card" id="mycard-dimiss">
                                      <div class="card-header">
                                        <h4 class="text-success">Success</h4>
                                        <div class="card-header-action">
                                          <a data-dismiss="#mycard-dimiss" class="btn btn-icon btn-success" href="#"><i
                                              class="fas fa-times"></i></a>
                                        </div>
                                      </div>
                                      <div class="card-body bg bg-success">
                                        <p style="color:#ffffff;"><strong>{{Session::get('success_message')}}.</strong></p>
                                      </div>
                                    </div>
                                  </div>
                                  @endif

                                  @if(Session::has('update_message'))
                                <div class="col-12 col-sm-6 col-lg-6">
                                    <div class="card" id="mycard-dimiss">
                                      <div class="card-header">
                                        <h4 class="text-info">Success</h4>
                                        <div class="card-header-action">
                                          <a data-dismiss="#mycard-dimiss" class="btn btn-icon btn-info" href="#"><i
                                              class="fas fa-times"></i></a>
                                        </div>
                                      </div>
                                      <div class="card-body bg bg-info">
                                        <p style="color:#ffffff;"><strong>{{Session::get('update_message')}}.</strong></p>
                                      </div>
                                    </div>
                                  </div>
                                  @endif


                                  @if(Session::has('delete_message'))
                                <div class="col-12 col-sm-6 col-lg-6">
                                    <div class="card" id="mycard-dimiss">
                                      <div class="card-header">
                                        <h4 class="text-danger">Success</h4>
                                        <div class="card-header-action">
                                          <a data-dismiss="#mycard-dimiss" class="btn btn-icon btn-danger" href="#"><i
                                              class="fas fa-times"></i></a>
                                        </div>
                                      </div>
                                      <div class="card-body bg bg-danger">
                                        <p style="color:#ffffff;"><strong>{{Session::get('delete_message')}}.</strong></p>
                                      </div>
                                    </div>
                                  </div>
                                  @endif

                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                    <!-- <input type="text" class="form-control" style="width:50%; margin:auto; padding:auto;" placeholder="Search..."  wire:model="searchTearm"/> -->
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Email_Verified</th>
                                            <th>Type</th>
                                            <th>Role</th>
                                            <th>Date</th>
                                            <th>Update Date</th>
                                            @can('Edit Your account')
                                            <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                        @if($user->utype != 'USR')
                                        <?php
                                            $test_orig_image = "{{asset('assets')}}/images/profile/{{ $user->profile_photo_path }}";
                                            $my_deafult_image ="../assets/images/profile/$user->profile_photo_path";
                                            ?>

                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td><img src="<?= check_image_exists($test_orig_image, $my_deafult_image); ?>"
                                                    width="60" alt="" /></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->email_verified_at }}</td>
                                            <td>{{ $user->utype }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            @can('Edit Your account')
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
                                                                href="{{ route('users.edit',$user->id) }}"><i
                                                                    class="far fa-edit"></i> Edit</a>
                                                            @can('delete user')
                                                            <a class="dropdown-item has-icon" class="btn" href="#"
                                                                data-toggle="modal" data-id="{{ $user->id }}"
                                                                data-name="{{ $user->name }}"
                                                                data-target="#exampleModalCenter1"
                                                                wire:click="deleteUser({{ $user->id }})">
                                                                <i class="far fa-trash-alt"
                                                                    aria-hidden="true"></i>Trash</a>
                                                            @endcan
                                                        </div>
                                                    </div>

                                                </div>

                                            </td>
                                            @endcan
                                        </tr>
                                        @else
                                        @endif
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
</div>
@endcan
