@extends('layouts.frontend')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 bg-white bottom2p nopad">

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

				<div class="col-md-4 bg-white">
					<div class="col-md-12 bg-white">
						<div class="content">
							<div class="content center pad10p">
								@if($user->photo != null)
									<img src="{{Cloudder::show($user->photo, ['width'=>'150', 'height'=>'150', 'crop'=>'limit'])}}" class="img-circle" style="width: 50%;">
								@else
									<img src="{{ asset('img/default-user.png') }}" class="img-circle" style="width: 50%;">
								@endif
								<h4>{{$user->name}} 
									@if(Auth::user()) 
										@if($user->id == Auth::user()->id) 
											<a href="{{ url('setting/'.Auth::user()->slug) }}"><i class="fa fa-gears"></i></a>
										@endif
									@endif
								</h4>
								@if(Auth::user()) 
									@if($user->id != Auth::user()->id)
										<button type="button" class="btn btn-default btn-raised btn-block top4p"><i class="glyphicon glyphicon-envelope"></i> Kirim Pesan</button>
									@else
										@if($user->agent == null)
											<button type="button" class="btn btn-default btn-raised btn-block top4p"><i class="material-icons">store</i> Buat Agent</button>
										@endif
									@endif
								@else
									<button type="button" class="btn btn-default btn-raised btn-block top4p"><i class="glyphicon glyphicon-envelope"></i> Kirim Pesan</button>
								@endif
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-8 bg-white"> 
					<div class="media full">
						<div class="wrapper">
							<img src="http://www.soaptheme.net/html/travelo/images/cruise/gallery/7.jpg" style="height: 350px; width: 100%;"/>
    					</div>
					</div>
				</div>

			</div>
		</div>

		@if($user->agent != null)
			<div class="row">
				<div class="well">
					<div class="center">
				    	<i class="material-icons">store</i> <h4><a href="{{ url('agent/'.$user->agent->slug) }}">{{$user->agent->name_agent}}</a></h4>
				    	<h5 class="white"><div id="rateYo" style="margin: 0 auto;"></div></h5>
				    </div>
				</div>
			</div>
		@endif
	
	</div>
@endsection