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

			<div class="col-md-8">
				<div class="col-md-12 bg-white bottom4p"> 
					<div class="content clearfix">
						<div class="pull-left">
							<h3 style="margin: 5%;">{{$data->judul_trip}}
								@if(Auth::user())
									@if($data->agent->user_id == Auth::user()->id)
										<a href="{{url('edit/trip/'.$data->judul_trip)}}"><i class="fa fa-pencil" style="font-size: 13px;"></i></a>
									@endif
								@endif
							</h3>
						</div>
						<div class="pull-right">
							<span class="label label-success pull-right" style="margin: 15%; padding: 8%;">Open Trip</span>
						</div>
					</div>
					<div class="media full">
						@if($data->photo == null) 
							<img src="{{ asset('img/default-pic.png') }}" width="750" height="500"/>
						@else
							<img src="{!! Cloudder::show($data->photo, ['width'=>'750', 'height'=>'500', 'crop'=>'limit']) !!}" alt="{!! $data->judul_trip !!}" class="img-responsive centerpos">
						@endif
					</div>
				</div>

				<div class="col-md-12 bg-white bottom4p">
					<ul class="nav nav-pills nav-justified">
					  <li class="active"><a data-toggle="tab" href="#deskripsi" >Deskripsi</a></li>
					  <li><a data-toggle="tab" href="#facility" >Fasilitas</a></li>
					  <li><a data-toggle="tab" href="#itin">Itinerary</a></li>
					  <li><a data-toggle="tab" href="#rules">Aturan & Ketentuan</a></li>
					  <li><a data-toggle="tab" href="#review">Review</a></li>
					</ul>

					<div class="tab-content">
					  <div id="deskripsi" class="tab-pane fade in active">
					  	<?php echo nl2br($data->deskripsi); ?>
					  </div>
					  <div id="facility" class="tab-pane fade">
					    <h3>Include</h3>
					    <?php echo nl2br($data->include); ?>
					  </div>
					  <div id="itin" class="tab-pane fade">
					    <h3>HARI 1</h3>
					    <p>
						Makan Siang, Makan Malam Sudah Termasuk
						13:00 Tiba di Lombok International Airport anda akan langsung dijemput dan diantar  untuk melakukan SASAK TOUR mengunjungi Desa Adat Sukarare, Pantai Kuta,Tanjung Aan dan berfoto di lokasi paling fotogenic yaitu bukit merese dan makan siang di ANDA Restaurant Kuta.
						19:00 Makan Malam di Ayam Taliwang Khas Lombok
						21:00 Check In Hotel/Istirahat
						</p>

						<h3>HARI 2</h3>
						<p>
						Makan Pagi, Makan Malam Sudah Termasuk
						09:00 Dijemput di Hotel untuk menyebrang ke Gili Trawangan.diperjalanan anda dapat melihat keindahan Pantai Senggigi dan Bukit Malimbu dan sempatkan untuk berfoto
						13:00 Check In di Hotel Gili Trawangan
						15:00 Anda bisa mengeksplor kawasan Gili Trawangan dengan menyewa sepeda (biaya tidak termasuk sekitar Rp.100.000 Per Hari)
						17:00 Anda bisa menuju area Ombak Sunset untuk melihat keindahan salah satu sunset terbaik dan berfoto di Ayunan Pantai yang sangat fenomenal.
						20:00 Makan Malam di Juku Marlin Restaurant Gili Trawangan
						22:00 Istirahat
						</p>

						<h3>HARI 3</h3>
						<p>
						Makan Pagi,Makan Malam Sudah Termasuk
						09:00 Bersiap untuk Snorekling
						10:00 Anda akan dipandu untuk melakukan Snorekling di 3 Gili yaitu Gili Trawangan, Gili Meno dan Gili Air
						15:00 Kembali ke Hotel Check Out
						17:00 Menyebrang kembali ke Lombok anda akan dijemput dan diantar ke hotel sekaligus makan malam di Local Resto Mataram
						21:00 Istirahat
						</p>

						<h3>HARI 4</h3>
						<p>
						09:00 Check Out Hotel kemudian diantar menuju Pusat Oleh Oleh dan Souvenir Khas lombok di Cakranegara.
						14:00 Diantar menuju Airport Lombok International
						17:00 Kembali ke Kota asal
						</p>
					  </div>

					  <div id="rules" class="tab-pane fade">
					  	<?php echo nl2br($data->syarat); ?>
					  	<br/>
					    <h4>BELUM TERMASUK</h4>
					    <?php echo nl2br($data->exclude); ?>
					  </div>

					  <div id="review" class="tab-pane fade">
					    <div class="row">
							<div class="col-md-3">
								<div class="content center pad10p">
									<img src="http://www.soaptheme.net/html/travelo/images/shortcodes/team/david.png" class="img-circle" style="width: 50%;">
									<p><a href="operator">Username</a></p>
									<p>12 April 2017</p>
								</div>
							</div>
							<div class="col-md-9">
								<div class="content detailreview">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
								</div>
							</div>
							<hr/>
					    </div>

					    <div class="row">
							<div class="col-md-3">
								<div class="content center pad10p">
									<img src="http://www.soaptheme.net/html/travelo/images/shortcodes/team/david.png" class="img-circle" style="width: 50%;">
									<p>Username</p>
									<p>12 April 2017</p>
								</div>
							</div>
							<div class="col-md-9">
								<div class="content detailreview">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
								</div>
							</div>
							<hr/>
					    </div>

					  </div>

					</div>
				</div>
			</div>

			<div class="col-md-4 bottom2p">
				<div class="col-md-12 bg-white">
					@if(Auth::user())
						@if($data->agent->user_id != Auth::user()->id)
							<div class="content">
								<button class="btn btn-raised btn-warning btn-lg btn-block top4p" type="button" data-toggle="modal" data-target="#beli-dialog">Beli</button>
							</div>
							<hr/>
						@endif
					@else
						<div class="content">
							<button class="btn btn-raised btn-warning btn-lg btn-block top4p" type="button" data-toggle="modal" data-target="#beli-dialog">Beli</button>
						</div>
						<hr/>
					@endif
					<div class="content top4p">
						<h3 class="center">Rp. <span class="hargatrip">{{$data->price}}</span> /Pax</h3>

						<div class="clearfix">
							<span class="pull-left">
								<p><i class="glyphicon glyphicon-map-marker"></i> Lokasi</p>
								<p><i class="glyphicon glyphicon-calendar"></i> Dari tanggal</p>
								<p><i class="glyphicon glyphicon-calendar"></i> Sampai tanggal</p>
								<p><i class="glyphicon glyphicon-user"></i> Kuota</p>
								<p><i class="glyphicon glyphicon-record"></i> Meeting point</p>
							</span>
							<span class="pull-right">
								<p>{{$data->tujuan}}</p>
								<p>{{Carbon\Carbon::parse($data->tgl_mulai)->format('d-M-Y')}}</p>
								<p>{{Carbon\Carbon::parse($data->tgl_selesai)->format('d-M-Y')}}</p>
								<p>{{$data->kuota}} orang</p>
								<p>{{$data->meeting_point}}</p>
							</span>
						</div>
						<hr/>
						<div class="clearfix">
							<span class="pull-left">
								<div id="rateYo"></div>
							</span>
							<span class="pull-right">
								<p>50 Reviews</p>
							</span>
						</div>

					</div>
				</div>
			</div>


			<div class="col-md-4 bottom2p">
				<div class="col-md-12 bg-white">
					<div class="content top4p">
						<h4 class="center">Trip Operator</h4>
						<hr/>
						<div class="content center pad10p">
							@if($data->agent->photo == null)
								<img src="{{ asset('img/default-user.png') }}" class="img-circle" style="width: 50%;">
							@else
								<img src="{{Cloudder::show($data->agent->photo, ['width'=>'132', 'crop'=>'limit'])}}" class="img-circle">
							@endif
							<p><a href="{{url('operator/'.$data->agent->slug)}}">{{$data->agent->name_agent}}</a></p>
							<i class="glyphicon glyphicon-ok-circle" style="color: rgb(255, 96, 0);font-size: 22px;"></i> <U>TERVERIFIKASI</U></p>

							@if(Auth::user())
								@if(Auth::user()->cekthisAgent($data->agent->slug) < 1)
									@if($data->follow == '0')
										<button type="button" class="btn btn-success btn-raised btn-block top4p"><i class="glyphicon glyphicon-plus"></i> Follow</button>
									@else
										<button type="button" class="btn btn-danger btn-raised btn-block top4p"><i class="glyphicon glyphicon-minus"></i> Unfollow</button>
									@endif
								@endif
							@else
								<button type="button" class="btn btn-success btn-raised btn-block top4p"><i class="glyphicon glyphicon-plus"></i> Follow</button>
							@endif

							<button type="button" class="btn btn-default btn-raised btn-block top4p"><i class="glyphicon glyphicon-envelope"></i> Kirim Pesan</button>
						</div>

					</div>
				</div>
			</div>
		</div>


		<div class="col-md-12">
            <h2 class="text-center" style="letter-spacing: 2px; margin-bottom: 30px;">Trip Terkait</h2>
            @if($data != null)
                @foreach($data->related as $related)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-2">
                                @if($related->photo == null) 
                                    <img src="{{ asset('img/default-pic.png') }}" width="150" height="80"/>
                                @else
                                    <img src="{!! Cloudder::show($related->photo, ['width'=>'180', 'height'=>'80', 'crop'=>'limit']) !!}" alt="{!! $related->judul_trip !!}" class="img-responsive centerpos">
                                @endif
                            </div>

                            <div class="col-md-10">
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                        <h4 style="margin: 0;"><a href="{{url('trip/'.$related->slug)}}"> {{$related->judul_trip}}</a>
                                        &nbsp;

                                        </h4>
                                        <p style="margin: 0 0 5px 0;font-size: 12px;"><i>{{Carbon\Carbon::parse($related->created_at)->format('d-M-Y')}}</i></p>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-raised btn-warning btn-lg btn-block top4p" type="button" style="margin: 0;">Rp. <span class="hargatrip">{{$related->price}}</span> /Pax</button>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12 list-item">
                                        <ul>
                                            <li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>{{$related->tujuan }}</li>
                                            <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{$related->kuota}} Orang</li>
                                            <li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>{{Carbon\Carbon::parse($related->tgl_mulai)->format('d-M-Y')}} - {{Carbon\Carbon::parse($related->tgl_selesai)->format('d-M-Y')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            @else
                <p class="text-center">Belum ada trip terkait.</p>
            @endif
        </div>

	</div>

<div id="beli-dialog" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-shopping-cart"></i> Beli - {{$data->judul_trip}}</h4>
      </div>
      <hr/>
      <div class="modal-body">
      	<div class="col-md-4">
			<img src="http://www.soaptheme.net/html/travelo/images/cruise/gallery/7.jpg" style="width:100%;" />
			<br>
			<p>Sisa Kuota : 5 Orang</p>
      	</div>
      	<div class="col-md-8">
	        <div class="col-md-12">
                <div class="form-group label-floating">
				  <label class="control-label" for="meetpoint"><i class="fa fa-map-pin"></i> Harga /Pax</label>
				  <input class="form-control" id="meetpoint" type="text" value="{{$data->price}}" required disabled />
				</div>
            </div>

        	<div class="col-md-12">
                <div class="form-group label-floating">
				  <label class="control-label" for="jlhkuota"><i class="fa fa-group"></i> Jumlah Peserta</label>
				  <input class="form-control" id="jlhkuota" type="number" required>
				</div>
            </div>
            <div id="totals"></div>
            <div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="optionsCheckboxes" required>
					</label>
				</div>
            </div>
            <div class="col-md-10">
				<h6>Saya telah membaca dan menyetujui Ketentuan Layanan</h6>
            </div>
        </div>
      </div>
      <hr/>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
        <a href="{{url('trip/'.$data->slug.'/buy')}}"><button type="button" class="btn btn-warning">Beli</button></a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
	<script type="text/javascript">
		$("#jlhkuota").keyup(function(){
	        var a = $('#meetpoint').val();
	        var b = $('#jlhkuota').val();
	        var hasil = a * b;
	        $('#totals').text(hasil);
	        console.log(a);
	        console.log(b);
	      });
	</script>
@endsection