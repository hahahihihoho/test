@extends('layouts.frontend')

@section('content')
	<div class="form-bg container">
		<div class="row">
				<div class="col-md-10 col-md-offset-1 bottom2p nopad">

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
					
					<div class="panel panel-warning">
					  <div class="panel-heading">
					    <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Beli - {{$data->judul_trip}}</h3>
					  </div>

					  <div class="panel-body">
					    <div class="col-md-4">
							<img src="http://www.soaptheme.net/html/travelo/images/cruise/gallery/7.jpg" style="width:100%;" />
						</div>
						<div class="col-md-8">
					        <div class="col-md-12">
				                <div class="form-group label-floating">
								  <label class="control-label" for="meetpoint"><i class="fa fa-map-pin"></i> Harga</label>
								  <input class="form-control" id="meetpoint" type="text" value="{{$data->price}}" required disabled />
								</div>
				            </div>

				        	<div class="col-md-12">
				                <div class="form-group label-floating">
								  <label class="control-label" for="jlhkuota"><i class="fa fa-group"></i> Jumlah Peserta</label>
								  <input class="form-control" id="jlhkuota" type="number" required>
								</div>
				            </div>

				            <div class="col-md-12">
				            	<h2 class="pull-right">TOTAL : Rp. 2.000.000</h2>
				            </div>

				        </div>
					  </div>

					  <div class="panel-footer">
					  	<button type="button" class="btn btn-raised btn-primary pull-lef" data-dismiss="modal">Batal</button>
					  	<a href="finish-order"><button type="button" class="btn btn-raised btn-warning btn-lg pull-right">Beli Trip</button></a>
					  </div>

					</div>
				</div>
		</div>
	</div>
@endsection