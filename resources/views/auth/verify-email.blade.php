<x-base-layout>
    	<!--main area-->
	<main id="main" class="main-site left-sidebar">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Verify Email</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
            <div class=" main-content-area">
                <div class="wrap-login-item ">						
                    <div class="login-form form-item form-stl">
                    @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                A new verification link has been sent to the email address.
                            </div>
                        @endif
                        <form name="frm-login" method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Verify Email</h3>										
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-login-uname">Email Address:</label>
                                <input type="email" id="frm-login-uname" name="email" placeholder="Type your email address" :value="old('email')" required autofocus>
                            </fieldset>
                            <input type="submit" class="btn btn-submit" value="Resend Verification Email" name="submit">
                        </form>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="btn btn-submit" style="background:#444444; margin-left: 25px;">
                        logout
                    </button>
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
