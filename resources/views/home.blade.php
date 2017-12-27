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
</div>
@endsection
