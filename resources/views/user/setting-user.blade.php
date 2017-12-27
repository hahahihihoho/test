@extends('layouts.frontend')

@section('content')
	<div class="form-bg container">
		<div class="row">
				<div class="col-md-8 col-md-offset-2 bottom2p bg-white nopad">

					@if(session()->has('success_message'))
			            <div class="alert alert-success" role="alert">
			                {{session()->get('success_message')}}
			            </div>
			        @endif

			        @if(session()->has('error_message'))
			            <div class="alert alert-danger" role="alert">
			                {{session()->get('error_message')}}
			            </div>
			        @endif	

					<div class="col-md-12 panel-body">
						<h3 style="margin: 5%;" class="center orange">Setting - {{Auth::user()->name}}</h3>
					</div>
					<ul class="nav nav-pills nav-justified" style="margin-bottom: -1%;">
					  	<li class="active"><a data-toggle="tab" href="#home">Akun</a></li>
				  		<li><a data-toggle="tab" href="#payment">Password</a></li>
					</ul>
					<hr/> 
					<div class="tab-content">
						<div id="home" class="tab-pane fade in active">
							<form role="form" action="{{url('/user/update/'.Auth::user()->slug)}}" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
			                    <div class="col-md-12">
				                    <div class="col-md-12">
				                    	<h5 class="orange">Your Details</h5>
				                    </div>

			                        <div class="form-group">
			                            <div class="col-sm-6">
			                            	<div class="form-group label-floating">
				                                <label class="control-label" for="username"><i class="fa fa-user"></i> Username</label>
				                                <input class="form-control" id="username" name="name" type="text" value="{{Auth::user()->name}}" required>
			                                </div>
			                            </div>
			                            <div class="col-sm-6">
			                            	<div class="form-group label-floating">
				                                <label class="control-label" for="email"><i class="fa fa-envelope"></i> Email</label>
				                                <input class="form-control" id="email" name="email" type="text" value="{{Auth::user()->email}}" required>
				                            </div>
			                            </div>
			                        </div>

			                        <div class="form-group">
			                            <div class="col-sm-12">
			                            	<div class="form-group label-floating">
				                                <label class="control-label" for="phone"><i class="fa fa-phone"></i> Phone</label>
				                                <input class="form-control" id="phone" name="hp" value="{{Auth::user()->hp}}"  type="number" required>
				                            </div>
			                            </div>
			                        </div>

			                        <div class="form-group">
			                            <div class="col-sm-6">
			                                <h5 class="orange">Photo</h5>
			                                <br/>
			                                @if(Auth::user()->photo != null)
			                                	<img src="{{Cloudder::show(Auth::user()->photo, ['width'=>'150', 'height'=>'150', 'crop'=>'limit'])}}">
			                                @else
			                                	<img src="{{ asset('img/default-user.png') }}" width="150" height="150">
			                                @endif
			                                <input readonly="" class="form-control" placeholder="Browse..." type="text">
			                                <input class="form-control" id="photo" name="photo" placeholder="photo" type="file">
			                            </div>
			                        </div>

			                        <div class="clearfix">
			                            <button class="btn btn-raised btn-primary btn-lg btn-block top4p" type="submit" >Simpan</button>
			                        </div>
			                    </div>
			                </form>
			            </div>
			            <div id="payment" class="tab-pane fade">
							<form >
			                    
			                    <div class="col-md-12 form-content">
				                    <div class="col-md-12">
				                    	<h5 class="orange">Change Password</h5>
				                    </div>

			                        <div class="form-group">
			                            <div class="col-sm-12">
			                            	<div class="form-group label-floating">
				                                <label class="control-label" for="oldpass"><i class="fa fa-lock"></i> Password Lama</label>
				                                <input class="form-control" id="oldpass" type="password">
			                                </div>
			                            </div>
			                        </div>
			                        <div class="form-group">
			                        	<div class="col-sm-6">
			                        		<div class="form-group label-floating">
				                                <label class="control-label" for="newpass"><i class="fa fa-key"></i> Password Baru</label>
				                                <input class="form-control" id="newpass" type="password">
			                                </div>
			                            </div>

			                            <div class="col-sm-6">
			                            	<div class="form-group label-floating">
				                                <label class="control-label" for="retype"><i class="fa fa-keyboard-o"></i> Ketik Ulang Password Baru</label>
				                                <input class="form-control" id="retype" type="password">
				                            </div>
			                            </div>
			                        </div>

			                        <div class="clearfix">
			                            <button class="btn btn-raised btn-primary btn-lg btn-block top4p" type="submit" >Simpan</button>
			                        </div>
			                    </div>

			                </form>						
			            </div>
		            </div>
				</div>
		</div>
	</div>
@endsection