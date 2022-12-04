<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
            <div class="col-md-6">
                    All Users
                    <input type="text" class="form-control" placeholder="Search..."  wire:model="searchTearm"/>
            </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.adduser') }}" class="btn btn-danger pull-right">Add New User</a>   
                </div>
                </div>
                </div>
                <div class="panel-body">
                @if(Session::has('success_message'))
                    <div class = "alert alert-success">
                    <strong>Success</strong> {{Session::get('success_message')}}
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Email_Verified</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Update Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <?php
                            $test_orig_image = "../assets/images/profile/$user->profile_photo_path";
                            $my_deafult_image ="../assets/images/profile/defualt.png";
                            ?>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><img src="<?= check_image_exists($test_orig_image, $my_deafult_image); ?>" width="60" alt="{{ $user->profile_photo_path }}" /></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->email_verified_at }}</td>
                                <td>{{ $user->utype }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                <a href="{{ route('admin.edituser',['user_id'=>$user->id]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                <a href="#" wire:click.prevent="deleteUser({{ $user->id }})" style="margin-left:10px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>

