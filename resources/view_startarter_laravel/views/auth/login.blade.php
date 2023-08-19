
@extends('layouts.appfix')
@section('body')
@php
    $publicUrl = url('/').'/templates/scutum-admin/scutum_v2.1.0/admin/html/dist/';   
@endphp
<body>
    <style>
		.appLoading {background:#bdbdbd}
		.appLoading body {visibility:hidden;overflow:hidden;max-height: 100%;}
	</style>
	<script>
		var html = document.getElementsByTagName('html')[0];
		html.className += ' appLoading';
	</script>

	<!-- UIkit js -->
	<script src="{{$publicUrl}}assets/js/uikit.min.js"></script>

	<div class="uk-flex uk-flex-center uk-flex-middle sc-login-page-wrapper" style="background:#EEEEEE !important;">
		<div class="uk-width-2-3@s uk-width-1-2@m uk-width-1-3@l uk-width-1-4@xl">
			<div class="uk-card">
				<div class="uk-card-body">
					<div class="uk-flex uk-flex-center uk-flex-middle">
						<div class="uk-width-3-4">
							<div class="sc-login-page-logo">
								<img src="{{asset('images/logo_myduma.png')}}" alt="" >
								{{-- <h2>MYDUMA</h2> --}}
							</div>
						</div>
					</div>
					<div id="sc-login-form" class="sc-toggle-login-register sc-toggle-login-password">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

						<div class="sc-login-page-inner">
							<div class="uk-margin-medium">
								<label for="sc-login-username">Email atau Nomor HP</label>
                                <input id="email" type="text" class="uk-input" data-sc-input name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="uk-margin-medium">
								<label for="sc-login-password">Password</label>
                                <input id="password" type="password" class="uk-input" data-sc-input name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- @if (Route::has('password.request'))
								    <div class="uk-margin-small-top uk-text-small uk-text-right@s"><a href="{{ route('password.request') }}" class="sc-link" data-uk-toggle="target: .sc-toggle-login-password; animation: uk-animation-scale-up">Forgot Password?</a></div>
                                @endif     --}}
                            </div>
                            <div class="uk-margin-large-top">
                                <button type="submit" class="sc-button sc-button-large sc-button-block sc-button-danger">Sign In </button>
                        </form>
								{{-- <div class="uk-margin-large-top uk-text-center">
                                    <span class="sc-color-secondary">Don't have an account?</span>
                                    <div><a href="{{ route('register') }}" class="sc-text-semibold" >Sign Up</a></div>
                                </div> --}}
							</div>
						</div>
					</div>
					
					<div id="sc-password-form" class="sc-toggle-login-password" hidden>
						<div class="sc-login-page-inner">
							<div class="uk-margin-medium">
								Please enter your email address. You will receive a link to reset your password.
							</div>
							<div class="uk-margin-medium">
								<label for="sc-reset-email">Email</label>
								<input id="sc-reset-email" type="text" class="uk-input" data-sc-input>
							</div>
							<div class="uk-margin-large-top">
								<button class="sc-button sc-button-large sc-button-block sc-button-primary">Reset Password</button>
								<div class="uk-margin-large-top uk-flex uk-flex-middle uk-flex-center">
									<a href="#" class="sc-text-semibold" data-uk-toggle="target: .sc-toggle-login-password; animation: uk-animation-scale-up">Back to login form</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- async assets-->
<script src="{{$publicUrl}}assets/js/vendor/loadjs.min.js"></script>
<script>
	var html = document.getElementsByTagName('html')[0];
    var publicUrlAsset="{{$publicUrl}}";
	// ----------- CSS
	loadjs([publicUrlAsset+'node_modules/uikit/dist/css/uikit.min.css', publicUrlAsset+'assets/css/login_page.min.css'], {
		success: function () {
            let publicUrlAsset="{{$publicUrl}}";
			// add id to main stylesheet
            let linkMainCss=publicUrlAsset + 'assets/css/login_page.min.css';

			var mainCSS = document.querySelectorAll("link[href='{{$publicUrl}}assets/css/login_page.min.css']");
			mainCSS[0].setAttribute('id', 'main-stylesheet');
			// show page
			setTimeout(function () {
				html.className = html.className.replace( /(?:^|\s)appLoading(?!\S)/g , '' );
			}, 100);
			// mdi icons CSS
			loadjs(publicUrlAsset+'assets/css/materialdesignicons.min.css', {
				before: function (path, scriptEl) {
					if (/(^css!|\.css$)/.test(path)) {
						document.head.insertBefore(scriptEl, mainCSS[0])
					}
					return false;
				}
			});
		},
		async: false
	});
	// mdi icons (base64) & google fonts (base64)
	loadjs([publicUrlAsset+'assets/css/fonts/mdi_fonts.css', publicUrlAsset+'assets/css/fonts/roboto_base64.css']);
	// vendor
	loadjs(publicUrlAsset+'assets/js/vendor.min.js', {
		success: function () {
			// scutum common functions/helpers
			loadjs(publicUrlAsset+'assets/js/scutum_common_laravel.min.js', {
				success: function() {
					scutum.init();
				}
			});
		}
	});
</script>

</body>
@endsection

