@extends('layouts.theme')

@section('content')
<div class="banner-top">
	<div class="container">
		<h3 >Login</h3>
		<h4><a href="index.html">Home</a><label>/</label>Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Login</h3>
					<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    {{ csrf_field() }}
						<div class="key">
							<input placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                     @endif
							<div class="clearfix"></div>
						</div>
						<div class="key">
						<input id="password" type="password" class="form-control" name="password" required>
              @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Login">
					</form>
				</div>
				<div class="forg">
					<a href="#"class="forg-left">Forgot Password</a>
					<a href="{{route('register')}}" class="forg-right">Register</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>
@endsection
