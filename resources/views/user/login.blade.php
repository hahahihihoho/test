@extends('app')

@section('content')
	<div class="form-bg container">
		<div class="row">
			<div class="col-md-12 center">
				<h1>Hai Kak!</h3>
				<h4>Silahkan masuk dan mulai rencanakan liburan di VikaTrip.</h4>
				<br/>
			</div>
				<div class="col-md-6 col-md-offset-3 bottom2p panel panel-default">
					<div class="form-horizontal center">
						<img alt="vika-Logo" src="/img/logo-vika.png" style="width: 180px;">
					</div>

						<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}" style="margin-top: -30px;">
							{{ csrf_field() }}

		                    <div class="col-md-12">

		                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		                            <div class="col-sm-12">
		                            	<div class="form-group label-floating">
			                                <label class="control-label" for="email"><i class="fa fa-envelope"></i> Email</label>
			                                <input class="form-control" id="email"  type="email" value="{{ old('email') }}" required autofocus>
			                                @if ($errors->has('email'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('email') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
		                            </div>
		                        </div>


		                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                            <div class="col-sm-12">
		                            	<div class="form-group label-floating">
			                                <label class="control-label" for="password"><i class="fa fa-lock"></i> Password</label>
			                                <input class="form-control" id="password"  type="password" required>
			                                @if ($errors->has('password'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('password') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="col-md-6 col-md-offset-4">
		                                <div class="checkbox">
		                                    <label>
		                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
		                                    </label>
		                                </div>
		                            </div>
		                        </div>

		                        <div class="">
		                        	<div class="col-sm-12">
		                            	<button class="btn btn-raised btn-warning btn-lg btn-block top4p" type="submit" >MASUK</button>
		                            </div>
		                        </div>
								<div class="">
		                        	<p class="center"><a href="{{ route('password.request') }}">Lupa password?</a></p>
		                        	<p>Belum memiliki akun VikaTrip? Daftar <a href="register">di sini</a><p>
		                        </div>
		                    </div>
		                </form>

				</div>
		</div>
	</div>
@endsection