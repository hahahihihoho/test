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
								@if($operator->photo != null)
									<img src="{{Cloudder::show($operator->photo, ['width'=>'150', 'height'=>'150', 'crop'=>'limit'])}}" class="img-circle" style="width: 50%;">
								@else
									<img src="{{ asset('img/default-user.png') }}" class="img-circle" style="width: 50%;">
								@endif
								<p>{{$operator->name_agent}}
									@if(Auth::user()->cekthisAgent($operator->slug) > 0) 
										<a href="{{url('operator/setting/'.$operator->slug)}}"><i class="fa fa-gears"></i></a>
									@endif
								</p>
								<i class="glyphicon glyphicon-ok-circle" style="color: rgb(255, 96, 0);font-size: 22px;"></i> <U>TERVERIFIKASI</u></p>
								@if(Auth::user())
									@if(Auth::user()->cekthisAgent($operator->slug) < 1)
										@if($operator->follow == '0')
											<a href="{{url('operator/follow/'.$operator->slug)}}"><button type="button" class="btn btn-success btn-raised btn-block top4p"><i class="glyphicon glyphicon-plus"></i> Follow</button></a>
										@else
											<a href="{{url('operator/unfollow/'.$operator->slug)}}"><button type="button" class="btn btn-danger btn-raised btn-block top4p"><i class="glyphicon glyphicon-minus"></i> Unfollow</button></a>
										@endif
									@endif
								@else
									<a href="{{url('operator/follow/'.$operator->slug)}}"><button type="button" class="btn btn-success btn-raised btn-block top4p"><i class="glyphicon glyphicon-plus"></i> Follow</button></a>
								@endif

								<button type="button" class="btn btn-default btn-raised btn-block top4p"><i class="glyphicon glyphicon-envelope"></i> Kirim Pesan</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-8 bg-white"> 
					<div class="media full">
						<div class="wrapper">
							<img src="http://www.soaptheme.net/html/travelo/images/cruise/gallery/7.jpg" style="height: 350px; width: 100%;"/>
							
	    						<div class="col-md-12 post-content">
	    							<div class="col-md-3 center">
		    							<h5 class="white"><i class="glyphicon glyphicon-map-marker"></i> Medan</h5>
	                				</div>
	                				<div class="col-md-3 center">
		    							<h5 class="white"><i class="glyphicon glyphicon-user"></i> 100</h5>
	                				</div> 
	                				<div class="col-md-3 center">
		    							<h5 class="white"><i class="glyphicon glyphicon-ok"></i> 55</h5>
	                				</div> 
	                				<div class="col-md-3">
		    							<h5 class="white"><div id="rateYo" style="margin: 0 auto;"></div></h5>
	                				</div>  
	    						</div>
    					</div>
					</div>
				</div>

			</div>
		</div>
	
		<div class="row">
			<div class="col-md-12 bg-white pad1p">
				<ul class="nav nav-pills nav-justified">
				  <li class="active"><a data-toggle="tab" href="#home">Open Trip</a></li>
				  <li><a data-toggle="tab" href="#facility">Private Trip</a></li>
				  <li><a data-toggle="tab" href="#itin">On Going Trip</a></li>
				  <li><a data-toggle="tab" href="#review">Review</a></li>
				  <li><a data-toggle="tab" href="#rules">Catatan Operator</a></li>
				</ul>
				<hr/>
				<div class="tab-content">
					<div id="home" class="tab-pane fade in active">
						<div class="col-md-12">
				            <h2 class="text-center" style="letter-spacing: 2px; margin-bottom: 30px;">Trip Terbaru</h2>
				            @if($data != null)
				                @foreach($data as $trip)
				                    <div class="panel panel-default">
				                        <div class="panel-body">
				                            <div class="col-md-2">
				                                @if($trip->photo == null) 
				                                    <img src="{{ asset('img/default-pic.png') }}" width="150" height="80"/>
				                                @else
				                                    <img src="{!! Cloudder::show($trip->photo, ['width'=>'180', 'height'=>'80', 'crop'=>'limit']) !!}" alt="{!! $trip->judul_trip !!}" class="img-responsive centerpos">
				                                @endif
				                            </div>

				                            <div class="col-md-10">
				                                <div class="col-md-12">
				                                    <div class="col-md-8">
				                                        <h4 style="margin: 0;"><a href="{{url('trip/'.$trip->slug)}}"> {{$trip->judul_trip}}</a>
				                                        &nbsp;
				                                        @if($trip->agent->user_id == Auth::user()->id)
				                                            <a href="{{url('edit/trip/'.$trip->judul_trip)}}"><i class="fa fa-pencil" style="font-size: 13px;"></i></a>
				                                        @endif
				                                        </h4>
				                                        <p style="margin: 0 0 5px 0;font-size: 12px;"><i>{{Carbon\Carbon::parse($trip->created_at)->format('d-M-Y')}}</i></p>
				                                    </div>
				                                    <div class="col-md-4">
				                                        <button class="btn btn-raised btn-warning btn-lg btn-block top4p" type="button" style="margin: 0;">Rp. <span class="hargatrip">{{$trip->price}}</span> /Pax</button>
				                                    </div>
				                                </div>

				                                <div class="col-md-12">
				                                    <div class="col-md-12 list-item">
				                                        <ul>
				                                            <li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>{{$trip->tujuan }}</li>
				                                            <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{$trip->kuota}} Orang</li>
				                                            <li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>{{Carbon\Carbon::parse($trip->tgl_mulai)->format('d-M-Y')}} - {{Carbon\Carbon::parse($trip->tgl_selesai)->format('d-M-Y')}}</li>
				                                        </ul>
				                                    </div>
				                                </div>
				                            </div>

				                        </div>
				                    </div>
				                @endforeach
				                {{ $data->links() }}
				            @else
				                <p class="text-center">Belum ada trip.</p>
				            @endif
				        </div>
					</div>
					<div id="facility" class="tab-pane fade">
						<h3>Fasilitas</h3>

						<p>1. Kapal Ferry Merak-Bakauheni PP & Mobil AC Bakauheni-Pahawang PP</p>
						<p>2. Sewa Kapal 2hari +Life Jacket</p>
						<p>3. Welcome Drink (Es Kelapa Muda), Makan 4x & BBQ</p>
						<p>4. Tiket Masuk Wisata + Tour</p>
						<p>5. Homestay (Shared room) & Local Guide</p>
						<p>6. Merchandise, Crew Kili Kili Adventure, Dokumentasi + Photo underwater</p>
						<p>7. Free Banner*, Free Fun Games*, Free Door Prize*, Free Kembang Api*(Minimum Grup 40pax)</p>
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
						<h4>BELUM TERMASUK</h4>
						<p>1. Transportasi menuju Pelabuhan Merak</p>
						<p>2. Sewa alata snorkeling</p>
						<p>3. Tip guide/crew</p>
						<p><b>DILARANG BAWA ANAK KECIL < 10 th</b></p>
					</div>

					<div id="review" class="tab-pane fade">
					<div class="row">
						<div class="col-md-3">
							<div class="content center pad10p">
								<img src="http://www.soaptheme.net/html/travelo/images/shortcodes/team/david.png" class="img-circle" style="width: 50%;">
								<p>Username</p>
								<p>12 April 2017</p>
							</div>
						</div>
						<div class="col-md-9">
							<div class="header"><b><a href="#">Trip To Sabang Island</a></b></div>
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
							<div class="header"><b><a href="#">Trip To Bali Island</a></b></div>
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
	</div>
@endsection