@extends('layouts.frontend')

@section('content')
	<div class="container">
		<div class="row">

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

			<div class="col-md-12 panel panel-default">
				<div class="panel-body">
					<div class="form-horizontal bottom2p">
						<h3 style="margin: 5%;" class="center orange"><i class="fa fa-edit"></i> Buat Trip</h3>
					</div>

			        <div class="stepwizard">
			            <div class="stepwizard-row setup-panel">
			                <div class="stepwizard-step">
			                    <!-- <a class="btn btn-primary btn-circle" href="#step-1" type="button">1</a> -->
			                  	 <a class="btn btn-fab btn-fab-mini btn-warning btn-circle" href="#step-1" type="button"><h5>1</h5></a>
		                    	<p>General Info</p>
			                </div>
			                <div class="stepwizard-step">
			                    <a class="btn btn-fab btn-fab-mini btn-warning" href="#step-2" type="button" ><h5>2</h5></a>
			                    <p>Itinerary</p>
			                </div>
			                <div class="stepwizard-step">
			                    <a class="btn btn-fab btn-fab-mini btn-warning" href="#step-3" type="button" ><h5>3</h5></a>
			                    <p>Price Details</p>
			                </div>
			                <div class="stepwizard-step">
			                    <a class="btn btn-fab btn-fab-mini btn-warning" href="#step-4" type="button" ><h5>4</h5></a>
			                    <p>Additional Info</p>
			                </div>
			            </div>
			        </div>

			        <form action="{{url('create-trip')}}" method="post" role="form" class="bg-white pad1p">
			        	{{ csrf_field() }}
			            <div class="row setup-content form-content" id="step-1">
			                <div class="col-md-12">
			                    <div class="col-md-12">
			                    	<h5 class="orange">General Info</h5>
			                    </div>
			                    <div class="form-group">
			                    	<div class="col-sm-6">
				                        <div class="form-group label-floating">
										  <label class="control-label" for="judul">Judul Trip</label>
										  <input class="form-control" id="judul" name="judul" type="text" required>
										</div>
			                        </div>

			                    	<div class="col-sm-6">
				                        <div class="form-group label-floating">
										  <label class="control-label" for="tujuan"><i class="fa fa-map-marker"></i> Tujuan</label>
										  <input class="form-control" id="tujuan" name="tujuan" type="text" required>
										</div>
			                        </div>
			                    </div>

			                    <div class="form-group">
			                    	<div class="col-sm-6">
				                        <div class="form-group label-floating">
										  <label class="control-label" for="datefrom"><i class="fa fa-calendar"></i> Tanggal Mulai</label>
										  <input class="form-control" id="datefrom" name="datefrom" type="text" required>
										</div>
			                        </div>

			                    	<div class="col-sm-6">
				                        <div class="form-group label-floating">
										  <label class="control-label" for="dateto"><i class="fa fa-calendar-check-o"></i> Tanggal Selesai</label>
										  <input class="form-control" id="dateto" name="dateto" type="text" required>
										</div>
			                        </div>
			                    </div>

			                    <div class="form-group">
			                    	<div class="col-sm-6">
				                        <div class="form-group label-floating">
										  <label class="control-label" for="meetpoint"><i class="fa fa-map-pin"></i> Titik Bertemu</label>
										  <input class="form-control" id="meetpoint" name="meetpoint" type="text" required>
										</div>
			                        </div>

			                    	<div class="col-sm-6">
				                        <div class="form-group label-floating">
										  <label class="control-label" for="jlhkuota"><i class="fa fa-group"></i> Kuota (Jumlah Peserta)</label>
										  <input class="form-control" id="jlhkuota" name="jlhkuota" type="number" required>
										</div>
			                        </div>
			                    </div>

			                    <div class="form-group">
			                    	<div class="col-sm-12">
			                    		<div class="form-group label-floating">
					                        <label class="control-label" for="deskripsi"><i class="fa fa-book"></i> Deskripsi</label>
											<textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
										</div>
				                    </div>
			                    </div>

			                    <div class="form-group">
			                    	<div class="col-sm-4">
		                                <h5 class="orange">Gambar</h5>
		                                <br/>
		                                <img src="http://www.soaptheme.net/html/travelo/images/shortcodes/team/david.png" width="150" height="150">
		                                <input readonly="" class="form-control" placeholder="Browse..." type="text">
	       								<input id="inputFile" multiple="" type="file">
		                                <input class="form-control" id="photo" placeholder="photo" type="file" name="photo">
		                            </div>
			                    </div>

			                   <!--  <div class="form-group">

			                    	<div class="col-sm-12">
										<h5 class="orange">Aktivitas <i>(Pilih. minimal 1 pilihan)</i></h5>
					                    	<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Backpacking
													</label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Beach Exploring
													</label>
												</div>
											</div>
					                    	<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Cave Exploring
													</label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														City Walk
													</label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Culinary
													</label>
												</div>
											</div>
					                    	<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Cultural Trip
													</label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Diving
													</label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Family Vacation
													</label>
												</div>
											</div>
					                    	<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Hiking
													</label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Historical Places
													</label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Island Hopping
													</label>
												</div>
											</div>
					                    	<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Mountain Climbing
													</label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Photography
													</label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Rafting
													</label>
												</div>
											</div>
					                    	<div class="col-md-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes">
														Snorkeling
													</label>
												</div>
											</div>
		
									</div>
			                    </div> -->

			                    <button class="btn btn-raised btn-warning nextBtn btn-lg pull-right" type="button" id="next1">Next</button>
			                </div>
			            </div>

			            <div class="row setup-content form-content" id="step-2">
							
			                    <div class="col-md-12">
			                    	<div class="col-md-12">
			                    		<h5 class="orange">Itinerary</h5>
			                    	</div>
			                        <div class="controls"> 
										<div class="form-group">
											<div class="entry input-group">

												<div class="col-sm-12">
													<div class="form-group label-floating">
													  <label class="control-label" for="tujuan"><i class="fa fa-pencil-square"></i> Judul, e.g Hari 1 - Pergi Diving</label>
													  <input class="form-control" id="judulitin" name=judulitin[] type="text" required>
													</div>	
												</div>

												<div class="col-sm-12">
													<div class="form-group label-floating">
													  <label class="control-label" for="tujuan"><i class="fa fa-book"></i> Detail Itinerary</label>
													  <textarea class="form-control" id="itindetail" name="itindetail[]" type="text" required></textarea>
													</div>
												</div>
												
												<span class="input-group-btn">
													<button class="btn btn-success btn-add" type="button" style="font-size: 8px; padding: 5px;">
														<i class="glyphicon glyphicon-plus"></i>
													</button>
												</span>

											</div>
									   </div>
									</div>
			                        <button class="btn btn-raised btn-default prevBtn btn-lg pull-left" type="button">Previous</button>

			                        <button class="btn btn-raised btn-warning nextBtn btn-lg pull-right" type="button" id="next2">Next</button>
			                    </div>
			 
			            </div>

			            <div class="row setup-content form-content" id="step-3">
			                <div class="col-md-12">
			                	<div class="col-md-12">
			                    	<h5 class="orange">Price Details</h5>
			                    </div>
			                    <div class="form-group">
			                    	<div class="col-sm-6">
			                    		<div class="form-group label-floating">
					                        <label class="control-label"><i class="fa fa-money"></i> Harga Trip /Pax</label>
					                        <input class="form-control" id="prices" name="prices" min="10000" required="required" type="text">
					                    </div>
			                        </div>

			                    	<div class="col-sm-12">
			                    		<div class="form-group label-floating">
					                        <label class="control-label"><i class="fa fa-check-square"></i> Harga Termasuk</label>
					                        <textarea class="form-control" maxlength="100" id="includes" name="includes"></textarea>
				                        </div>
			                        </div>

			                        <div class="col-sm-12">
			                        	<div class="form-group label-floating">
					                        <label class="control-label"><i class="fa fa-times-rectangle"></i> Harga Tidak Termasuk</label>
					                        <textarea class="form-control" maxlength="100" id="notincludes" name="notincludes"></textarea>
				                        </div>
			                        </div>

			                        <div class="col-sm-12">
			                        	<div class="form-group label-floating">
					                        <label class="control-label"><i class="fa fa-tags"></i> Ketentuan dan Persyaratan</label>
					                        <textarea class="form-control" maxlength="100" id="terms" name="terms"></textarea>
				                        </div>
			                        </div>
			                    </div>
			                </div>
		                    <div class="col-md-12">
		                        <button class="btn btn-raised btn-default prevBtn btn-lg pull-left" type="button">Previous</button>

		                        <button class="btn btn-raised btn-warning nextBtn btn-lg pull-right" type="button" id="next3">Next</button>
		                    </div>

			            </div>


			            <div class="row setup-content form-content" id="step-4">
			                <div class="col-md-12">
			                	<div class="col-md-12">
			                    	<h5 class="orange">Additional Info</h5>
			                    </div>
			                    <div class="form-group">
			                    	<div class="col-sm-12">
			                    		<div class="form-group label-floating">
					                        <label class="control-label"><i class="fa fa-suitcase"></i> Perlengkapan yang Dibutuhkan</label>
					                        <textarea class="form-control" name="equipment" maxlength="100"></textarea>
				                        </div>
			                        </div>

			                        <div class="col-sm-12">
			                        	<div class="form-group label-floating">
					                        <label class="control-label"><i class="fa fa-bullhorn"></i> Informasi Lainnya</label>
					                        <textarea class="form-control" name="info" maxlength="100"></textarea>
				                        </div>
			                        </div>

			                        <div class="col-sm-12">
			                        	<div class="form-group">

												<div class="checkbox">
													<label>
														<input type="checkbox" name="optionsCheckboxes" required>
														Saya telah membaca dan menyetujui Ketentuan Layanan.
													</label>
												</div>

										</div>
			                        </div>
			                    </div>
			                </div>
		                    <div class="col-md-12">
		                        <button class="btn btn-raised btn-default prevBtn btn-lg pull-left" type="button">Previous</button>

		                        <button class="btn btn-raised btn-warning nextBtn btn-lg pull-right" type="submit" id="createtrip">CREATE TRIP</button>
		                    </div>

			            </div>

			        </form>
				</div>
		    </div>
		</div>
	</div>
@endsection