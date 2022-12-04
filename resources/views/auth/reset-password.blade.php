<x-base-layout>
    	<!--main area-->
	<main id="main" class="main-site left-sidebar">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/" class="link">home</a></li>
            <li class="item-link"><span>Reset Password</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
            <div class=" main-content-area">
                <div class="wrap-login-item ">
                    <div class="login-form form-item form-st1">
                    <x-jet-validation-errors class="mb-4" />
                        <form class="form-login" action="{{ route('password.update') }}" name="frm-login" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Reset Password</h3>
                            </fieldset>									
                            <fieldset class="wrap-input">
                                <label for="frm-reg-email">Email Address*</label>
                                <input type="email" id="frm-login-uname" name="email" placeholder="Type your email address" name="email" :value="old('email', $request->email)" required autofocus> 
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half left-item ">
                                <label for="password">Password *</label>
                                <input type="password" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half ">
                                <label for="password_confirmation">Confirm Password *</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            </fieldset>
                            <input type="submit" class="btn btn-sign" value="Reset Password" name="register">
                        </form>
                    </div>											
                </div>
            </div><!--end main products area-->		
        </div>
    </div><!--end row-->

</div><!--end container-->

</main>
<!--main area-->
</x-base-layout>
