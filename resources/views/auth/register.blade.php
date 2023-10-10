
@include('auth.includes.header')

	<div class="limiter">
		<div class="container-login">
			<div class="wrap-login">
				<div class="login js-tilt" data-tilt>
					<img src="{{asset('/avatars/signUp2.svg')}}" alt="IMG">
				</div>

				<form class="login-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
					<span class="login-form-title">
					 Register
					</span>


                    <div class="wrap-input validate-input">
                        <input id="name" type="text" class="input @error('name') is-invalid @enderror" placeholder="Full Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <span class="focus-input"></span>
						<span class="symbol-input">
							<i class="fa fa-person" aria-hidden="true"></i>


						</span>
                    </div>


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

                    <div class="wrap-input validate-input" data-validate = "Password is required">
						<input class="input" type="password"  name="password_confirmation" placeholder="c_Password">

                        <span class="focus-input"></span>
						<span class="symbol-input">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login-form-btn">
						<button class="login-form-btn" type="submit">
							{{__('Register')}}
						</button>
					</div>

					<div class="text-center pt-5">
						<a class="txt2" href="{{ 'login' }}">
							Already register
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

    @include('auth.includes.footer')
