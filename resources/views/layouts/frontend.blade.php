<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VikaTrip</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,80">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/ripples.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>
    <div class="navbar navbar-default" style="background-color: #fff; color: #777;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="javascript:void(0)">
            <img alt="Vika-Logo" src="/img/logo-vika.png" style="width: 120px; margin-top: -20%;">
          </a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">

          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input class="form-control col-md-8" placeholder="Search" type="text"><button type="submit" style="background: none; border: none;"><i class="fa fa-search"></i></button>
            </div>
          </form>
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::user())
            <li>
                <a href="bootstrap-elements.html"><i class="fa fa-envelope"></i> <span class="label label-danger">3</span></a>
            </li>
            @if(Auth::user()->cekAgent() != 0)
            <li class="dropdown"><a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home"></i> {{ Auth::user()->dataAgent()->name_agent }} <span class="label label-danger">3</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="{{ url('operator/'.Auth::user()->dataAgent()->slug) }}"><i class="fa fa-user"></i> Profile</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('create/trip') }}"><i class="fa fa-pencil"></i> Buat Trip</a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i> Penjualan</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('operator/setting/'.Auth::user()->dataAgent()->slug) }}"><i class="fa fa-gears"></i> Pengaturan</a></li>
              </ul>
            </li>
            @endif
            <li class="dropdown">
              <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">@if(Auth::user()->photo != null) <img class="circle" src="{{Cloudder::show(Auth::user()->photo, ['width'=>'25', 'crop'=>'limit'])}}" alt="icon" style="border-radius: 100%; width: 25px;"> @else <img class="circle" src="{{ asset('img/default-user.png') }}" alt="icon" style="border-radius: 100%; width: 25px;"> @endif {{Auth::user()->name}}
                <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Beranda</a></li>
                <li><a href="{{ url('profile/'.Auth::user()->slug) }}"><i class="fa fa-user"></i> Profile</a></li>
                <li class="divider"></li>
                <li><a href="javascript:void(0)"><i class="fa fa-shopping-basket"></i> Pembelian</a></li>
                <li><a href="{{ url('setting/'.Auth::user()->slug) }}"><i class="fa fa-gears"></i> Pengaturan</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </li>
              @else
                <li><a href="{{url('login')}}">Login</a></li>
                <li><a href="{{url('register')}}">Register</a></li>
              @endif
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div> 

    
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.1.1/jquery.rateyo.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="{{ asset('/js/material.min.js') }}"></script>
    <script src="{{ asset('/js/ripple.js') }}"></script>

    @yield('js')
    
    <script type="text/javascript">
        $(document).ready(function() {
          $(".hargatrip").mask("000,000,000,000,000.000.000", {reverse:true});                                
          $().UItoTop({ easingType: 'easeOutQuart' });                 
        });
    </script>

    <script type="text/javascript">
      $.material.init()
      
      var dates = $("#datefrom, #dateto").datepicker({
          minDate: "0",
          maxDate: "+2Y",
          defaultDate: "+1w",
          dateFormat: 'yy-mm-dd',
          changeMonth: true,
          changeYear: true,
          numberOfMonths: 1,
          onSelect: function(date) {
              for(var i = 0; i < dates.length; ++i) {
                  if(dates[i].id < this.id)
                      $(dates[i]).datepicker('option', 'maxDate', date);
                  else if(dates[i].id > this.id)
                      $(dates[i]).datepicker('option', 'minDate', date);
              }
          } 
      });


      $('#next1').click(function(e)
      {
          if($.trim($('#judul').val()).length ==0 || $.trim($('#tujuan').val()).length ==0|| $.trim($('#datefrom').val()).length ==0|| $.trim($('#dateto').val()).length ==0 || $.trim($('#meetpoint').val()).length ==0 ) {
            e.preventDefault();
            sweetAlert("Oops...", "Ada yang belum diisi, Mohon periksa inputan kamu", "error");
          }
      });

      $('#next2').click(function()
      {
          if($('#itin').val() == '') {
            sweetAlert("Oops...", "Ada yang belum diisi, Mohon periksa inputan kamu", "error");
            $("#itin").focus();
          }

          if($('#itindetail').val() == ''){
            sweetAlert("Oops...", "Ada yang belum diisi, Mohon periksa inputan kamu", "error");
            $("#itindetail").focus();
          }
      });

      $('#next3').click(function()
      {
          if($.trim($('#prices').val()).length ==0) {
            sweetAlert("Oops...", "Mohon isi kolom harga", "error");
          }
      });

        $(document).ready(function(){
          $('#prices').mask('000.000.000.000.000', {reverse: true});
        });

        $(document).ready(
         function()
          {
            
           $(document).on('click', '.btn-add', function(e)
           {
          e.preventDefault();

          var controlForm = $('.controls:first'),
           currentEntry = $(this).parents('.entry:first'),
           newEntry = $(currentEntry.clone()).appendTo(controlForm);

          newEntry.find('input').val('');
          controlForm.find('.entry:not(:last) .btn-add')
           .removeClass('btn-add').addClass('btn-remove')
           .removeClass('btn-success').addClass('btn-danger')
           .html('<span class="glyphicon glyphicon-minus"></span>');
           }).on('click', '.btn-remove', function(e)
           {
          $(this).parents('.entry:first').remove();

          e.preventDefault();
          return false;
           });
          }
        );

        $(document).ready(
            function () {
              $("#rateYo").rateYo({
                rating: 5,
                numStars: 5,
                starWidth: "20px",
                fullStar: true
              }).on("rateyo.set", function (e, data) {
                    $("#rate").val(data.rating);         
                });
            }
        );

        $(document).ready(function () {
          var navListItems = $('div.setup-panel div a'),
                  allWells = $('.setup-content'),
                  allNextBtn = $('.nextBtn'),
                allPrevBtn = $('.prevBtn');

          allWells.hide();

          navListItems.click(function (e) {
              e.preventDefault();
              var $target = $($(this).attr('href')),
                      $item = $(this);

              if (!$item.hasClass('disabled')) {
                  navListItems.removeClass('btn-warning').addClass('btn-default');
                  $item.addClass('btn-warning');
                  allWells.hide();
                  $target.show();
                  $target.find('input:eq(0)').focus();
              }
          });
          
          allPrevBtn.click(function(){
              var curStep = $(this).closest(".setup-content"),
                  curStepBtn = curStep.attr("id"),
                  prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

                  prevStepWizard.removeAttr('disabled').trigger('click');
          });

          allNextBtn.click(function(){
              var curStep = $(this).closest(".setup-content"),
                  curStepBtn = curStep.attr("id"),
                  nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                  curInputs = curStep.find("input[type='text'],input[type='url']"),
                  isValid = true;

              $(".form-group").removeClass("has-error");
              for(var i=0; i<curInputs.length; i++){
                  if (!curInputs[i].validity.valid){
                      isValid = false;
                      $(curInputs[i]).closest(".form-group").addClass("has-error");
                  }
              }

              if (isValid)
                  nextStepWizard.removeAttr('disabled').trigger('click');
          });

          $('div.setup-panel div a.btn-circle').trigger('click');
        });

        $(function()
        {
            $(document).on('click', '.btn-add', function(e)
            {
                e.preventDefault();

                var controlForm = $('.controls.rpt:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('Remove Friend');
            }).on('click', '.btn-remove', function(e)
            {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
          });
        });
   
    </script>

</body>
</html>
