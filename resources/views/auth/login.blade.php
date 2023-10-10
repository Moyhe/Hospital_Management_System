
@include('auth.includes.header')

	<div class="limiter">
		<div class="container-login">
			<div class="wrap-login">
				<div class="login js-tilt" data-tilt>
					<img src="{{asset('/avatars/signUp2.svg')}}" alt="IMG">
				</div>

				<form class="login-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    @method('POST')

					<span class="login-form-title">
						 Login
					</span>

					<div class="wrap-input validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input" type="text" @error('email') is-invalid @enderror name="email" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                        <span class="focus-input"></span>
						<span class="symbol-input">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input validate-input" data-validate = "Password is required">
						<input class="input @error('password') is-invalid @enderror" type="password"  name="password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <span class="focus-input"></span>
						<span class="symbol-input">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login-form-btn">
						<button class="login-form-btn" type="submit">
							{{__('Login')}}
						</button>
					</div>

					<div class="text-center pt-5">
						<span class="txt1">
							Forgot
						</span>
                        @if (Route::has('password.request'))
                        <a class="txt2" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
					</div>

					<div class="text-center pt-5">
						<a class="txt2" href="{{ route('register') }}">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

    @include('auth.includes.footer')

