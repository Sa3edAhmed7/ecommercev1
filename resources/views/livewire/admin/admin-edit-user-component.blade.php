
    <!--main area-->
	<main id="main" class="main-site left-sidebar">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{route('admin.dashboard')}}" class="link">Dashboard</a></li>
            <li class="item-link"><span>Edit User</span></li>
        </ul>
    </div>
    @if(Session::has('success_message'))
    <div class = "alert alert-success">
    <strong>Success</strong> {{Session::get('success_message')}}
    </div>
    @endif

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
            <div class=" main-content-area">
                <div class="wrap-login-item ">
                    <div class="register-form form-item ">
                        <form class="form-stl" wire:submit.prevent="updateUser">
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Edit Your account</h3>
                                <h4 class="form-subtitle">Personal infomation</h4>
                            </fieldset>									
                            <fieldset class="wrap-input">
                                <label>Name*</label>
                                <input type="text" name="name" placeholder="Name" wire:model="name">
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label>Email Address*</label>
                                <input type="email" name="email" placeholder="Email address" name="email" wire:model="email">
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half ">
                                <label>Type *</label>
                                <select name="utype" wire:model="utype">
                                    <option value="">--</option>
                                    <option value="USR">User</option>
                                    <option value="ADM">Admin</option>
                                </select>
                            </fieldset>
                            <input type="submit" class="btn btn-sign" value="Update">
                        </form>
                    </div>											
                </div>
            </div><!--end main products area-->		
        </div>
    </div><!--end row-->

</div><!--end container-->

</main>
<!--main area-->