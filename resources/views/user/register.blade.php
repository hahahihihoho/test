@extends('app')

@section('content')
	<div class="form-bg container">
		<div class="row">
			<div class="col-md-12 center">
				<h1>Sekarang giliranmu!</h3>
				<h4>Menjadi bagian dari keluarga VikaTrip.</h4>
				<br/>
			</div>
				<div class="col-md-4 col-md-offset-4 bottom2p panel panel-default">
					<div class="form-horizontal center">
						<img alt="vika-Logo" src="/img/logo-vika.png" style="width: 180px;">
					</div>

						<form role="form" method="POST" action="{{ route('register') }}" style="margin-top: -30px;">
		                    <div class="col-md-12">

		                            <div class="col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}">
		                            	<div class="form-group label-floating">
			                                <label class="control-label" for="name"><i class="fa fa-address-card"></i> Nama</label>
			                                <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required>
			                                @if ($errors->has('name'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('name') }}</strong>
			                                    </span>
			                                @endif
		                                </div>
		                            </div>


		                            <div class="col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
		                            	<div class="form-group label-floating">
			                                <label class="control-label" for="email"><i class="fa fa-envelope"></i> Email</label>
			                                <input class="form-control" id="email"  type="email" name="email" value="{{ old('email') }}" required>
			                                @if ($errors->has('email'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('email') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
		                            </div>


		                            <div class="col-sm-12 {{ $errors->has('password') ? ' has-error' : '' }}">
		                            	<div class="form-group label-floating">
			                                <label class="control-label" for="password"><i class="fa fa-lock"></i> Password</label>
			                                <input class="form-control" id="password" name="password"  type="password" required>
			                                @if ($errors->has('password'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('password') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
		                            </div>



		                        	<div class="col-sm-12">
		                            	<button class="btn btn-raised btn-warning btn-lg btn-block top4p" type="submit" >DAFTAR</button>
		                            </div>
		                        	<p class="center">Sudah memiliki akun VikaTrip ? Masuk <a href="login">di sini</a></p>

		                    </div>
		                </form>

				</div>
		</div>
	</div>
@endsection