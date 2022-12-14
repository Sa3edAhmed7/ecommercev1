<x-base-layout>
    	<!--main area-->
	<main id="main" class="main-site left-sidebar">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/" class="link">home</a></li>
            <li class="item-link"><span>Confirm Password</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
            <div class=" main-content-area">
                <div class="wrap-login-item ">
                    <div class="login-form form-item form-st1">
                    <x-jet-validation-errors class="mb-4" />
                        <form class="form-login" action="{{ route('password.confirm') }}" name="frm-login" method="POST">
                            @csrf
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Confirm Password</h3>
                            </fieldset>									
                            <fieldset class="wrap-input item-width-in-half left-item ">
                                <label for="password">Password *</label>
                                <input type="password" id="password" placeholder="Password" type="password" name="password" required autocomplete="current-password" autofocus>
                            </fieldset>
                            <input type="submit" class="btn btn-sign" value="confirm" name="submit">
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

