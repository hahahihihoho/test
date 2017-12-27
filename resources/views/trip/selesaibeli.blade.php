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
					    <h3 class="panel-title"><i class="fa fa-info-circle"></i> Sukses Beli - Trip To Sabang Island</h3>
					  </div>

					  <div class="panel-body">
				  		<div class="row">
							
							<div class="col-md-6">
					        	
				                <h5><b>Order Trip To Sabang Island Sukses!</b></h5>
				                <blockquote>
					                <h5>Harga /Pax : Rp.2.000.000</h5>
					                <h5>Kuota yang dipesan : 1 Pax</h5>
					                <h5>Total : Rp.2.000.000</h5>
				                </blockquote>

					        </div>

					        <div class="col-md-6">
					        	<div class="col-md-12">
					            	<h4 class="pull-right text-primary">Kode Unik : 123</h4>
								</div>
								<div class="col-md-12">
					            	<h4 class="pull-right text-danger">Total Bayar: Rp. 2.000.123</h4>
					           	</div>
					            
					        </div>
						</div>
						    	
						<div class="row">
							<div class="col-md-12">
						        <p>* Mohon segera melakukan pembayaran sesuai dengan <b>TOTAL BAYAR</b> yang tertera</p>
						        <p>* Orderan Anda akan dibatalkan otomatis dalam 6 jam berikutnya (13 May 2017 22:33:59 WIB) jika Anda belum melakukan konfirmasi pembayaran</p>
						        <br/>
				    			<h4 class="center text-success">Mohon Transfer <span class="text-warning">Rp. 2.000.123</span> ke rekening BCA <span class="text-info">123456789 A.n PT. Vika Trip</span></h4>
					    		
						    </div>
						</div>
					  </div>

					
					  <div class="panel-footer">
					  	<button type="button" class="btn btn-raised btn-primary pull-lef" data-dismiss="modal">Konfirmasi Nanti</button>
					  	<a href="confirm-payment"><button type="button" class="btn btn-raised btn-warning btn-lg pull-right">Konfirmasi Pembayaran</button></a>
					  </div>

					</div>
				</div>
		</div>
	</div>
@endsection