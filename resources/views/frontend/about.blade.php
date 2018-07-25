@extends('frontend.master',['aboutdata'=>$aboutdata,'contactdata'=>$contactdata])
@section('content')

<section class="inner-page-header wow fadeInDown">
	<div class="container"><h1>about us <br><span></span></h1></div>
</section>


 <main>
        <section class="page-title-banner">
            <img src="{{url('uploads/aboutus')}}/{{ $aboutdata[0]->aboutimage }}" alt="About Jain Dharm">
            <div class="ptb-txt">
                <h1 class="ptb-txt-hd">About <span>Jain Dharm</span></h1>
                <div class="ptb-breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li class="active"><a href="#">About Jain Dharm</a></li>
                    </ul>
                </div>
            </div>
        </section>
        
        <section class="page-side-links">
            <div class="container">
                <div class="psl-row">
                    <ul>
                        <?php $i=0; ?>
                        @foreach($aboutcatdata as $dtx)
                       
                        <li><a @if(Request::segment(2)==$dtx->slug)class="active"@endif href="{{ url('/about')}}/{{$dtx->slug}}">{{$dtx->title}}</a></li>
                        <?php  $i++;?>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        
        <section class="innerpg-content">
           {!!$aboutdata[0]->page_content !!}
        </section>
        
    </main>
   



@stop()
