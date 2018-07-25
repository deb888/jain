<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5, shrink-to-fit=no">
    <?php  if(Request::segment(1)=='home' || Request::segment(1)==''){ ?>
    @foreach ($homedata as $home_banner)
    <meta name="keywords" content="{{ $home_banner->meta_keyword }}">
    <meta name="description" content="{{ $home_banner->meta_description }}">
    <title>{{ $home_banner->seo_title }}</title>
    @endforeach
    <?php } ?>
    <title>Jain Dharm Online</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/css/bootstrap.min.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/css/style.css') }}">
   
</head>

<body>
@include('frontend.common.header')



@yield('content')



@include('frontend.common.footer',['contactdata'=>$contactdata])

      <!-- Events Popup Modal Start -->
      <div class="modal fade" id="eventPopupModal" tabindex="-1" role="dialog" aria-labelledby="eventPopupModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-clg" role="document">
        <div class="modal-content">
            <div class="modal-body">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div class="events-modal-cc">                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="emcc-col">
                                <img src="{{ URL::asset('public/frontend/images/current-events-icon.svg')}}" alt="Today's Festivals">
                                <div class="emcc-hd">
                                    <span class="td">Today's</span> <span class="hl-txt">Festival &amp; Events</span> <span class="date">(01.06.2018)</span>
                                </div>
                                <ul>
                                    <li>Ashtahnika Vidhan Begins <span>(01/06 - 05/06)</span></li>
                                    <li>Rohini Vrat</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="emcc-col">
                                <img src="{{ URL::asset('public/frontend/images/upcoming-events-icon.svg')}}" alt="Upcoming Festivals">
                                <div class="emcc-hd">
                                    <span class="td">Upcoming</span> <span class="hl-txt">Festival &amp; Events</span> <span class="date">(05.06.2018)</span>
                                </div>
                                <ul>
                                    <li>Ashtahnika Vidhan Ends <span>(01/06 - 05/06)</span></li>
                                    <li>Rohini Vrat</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- Events Popup Modal Start -->

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{ URL::asset('public/frontend/js/popper.min.js')}}"></script>
    <script src="{{ URL::asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            setTimeout(function(){
                $('#eventPopupModal').modal('show');
            }, 1000);            
        });
    </script>

</body>
</html>