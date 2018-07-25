<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ URL::asset('public/adminTheme/bootstrap/css/bootstrap.min.css') }}"> 
	
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('public/adminTheme/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ URL::asset('public/adminTheme/dist/css/skins/_all-skins.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ URL::asset('public/adminTheme/plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ URL::asset('public/adminTheme/plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ URL::asset('public/adminTheme/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ URL::asset('public/adminTheme/plugins/datepicker/datepicker3.css') }}">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
	
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ URL::asset('public/adminTheme/plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ URL::asset('public/adminTheme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
	<link href="//cdn.rawgit.com/noelboss/featherlight/1.5.0/release/featherlight.min.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		
		<!--header-->
		@include('admin.common.header')
	  
      <!-- Left side column. contains the logo and sidebar -->
		
		<!-- sidebar-->
		@include('admin.common.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
		  <?php  if(Request::segment(2)=='dashboard'){
				
				echo 'DashBoard';
				
			}else if(Request::segment(2)=='aboutus'){
				
				echo 'About Us';
				
			}else if(Request::segment(2)=='testimonial'){
				
				echo 'Testimonial';
				
			}else if(Request::segment(2)=='banner'){
				
				echo 'Banner';
				
			}else if(Request::segment(1)=='profile'){
				
				echo 'Profile';
				
			} else if(Request::segment(1)=='usermanagement'){
				
				echo 'SDL App Users';
				
			}else if(Request::segment(1)=='emailcontent'){
				
				echo 'Email Content';
				
			} else if(Request::segment(1)=='clientmanagement'){
				
				echo 'Sdl Client ';
				
			}else if(Request::segment(2)=='contactmanagement'){
				
				echo 'Contact List ';
				
			}else if(Request::segment(1)=='clientservice'){
				
				echo 'Sdl Client Service List ';
				
			}else if(Request::segment(2)=='cms'){
				
				echo 'Front line Heading';
				
			} else if(Request::segment(2)=='workcategory'){
				
				echo 'Workcategory';
				
			}else if(Request::segment(2)=='events'){
				
				echo 'Events';
				
			}
			else if(Request::segment(2)=='jainpeople'){
				
				echo 'Jain';
				
			}  ?>
            <small></small>
			@include('admin.common.errors')
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php  if(Request::segment(2)=='dashboard'){
				
				echo 'DashBoard';
				
			}else if(Request::segment(2)=='aboutus'){
				
				echo 'About Us';
				
			}else if(Request::segment(2)=='testimonial'){
				
				echo 'Testimonial';
				
			}else if(Request::segment(2)=='banner'){
				
				echo 'Banner';
				
			}else if(Request::segment(1)=='profile'){
				
				echo 'Profile';
				
			}else if(Request::segment(1)=='usermanagement'){
				
				echo 'SDL App Users';
				
			} else if(Request::segment(1)=='emailcontent'){
				
				echo 'Email Content';
				
			}  else if(Request::segment(1)=='clientmanagement'){
				
				echo 'Sdl Client ';
				
			}else if(Request::segment(2)=='contactmanagement'){
				
				echo 'Contact List ';
				
			}else if(Request::segment(1)=='clientservice'){
				
				echo 'Sdl Client Service List ';
				
			} else if(Request::segment(2)=='cms'){
				
				echo 'Front line Heading';
				
			}else if(Request::segment(2)=='workcategory'){
				
				echo 'Workcategory';
				
			} 
			else if(Request::segment(2)=='jainpeople'){
				
				echo 'Jain';
				
			}  ?></li>
          </ol>
		  
        </section>

        <!-- Main content -->
        <section class="content">
          
		  <!-- Your Page Content Here -->
            @yield('content')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
		<!-- footer -->
		@include('admin.common.footer')
      <!-- Control Sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ URL::asset('public/adminTheme/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    
	<script src="{{ URL::asset('public/adminTheme/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ URL::asset('public/adminTheme/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
     <script src="{{ URL::asset('public/adminTheme/dist/js/app.min.js') }}"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
	<script>
	
		$(document).ready(function($){
    $('#example').DataTable({
		
		 "aaSorting": []
		
		
	});





<?php  if(Request::segment(1)=='work'){ ?>
		var val = [];
		$('#sendmail').click(function(){
			token = $('meta[name="csrf-token"]').attr('content');
		$(':checkbox:checked').each(function(i){
		val[i] = $(this).val();
		});
		urlx='{{ route('workcontroller.get_ajax')}}',
		//alert(val);
		$.ajax({
		type:'POST',
		headers: {'X-CSRF-TOKEN': token},
		url:urlx,
		data:'val='+val,

		success:function(msg){
//alert(msg);
		$(':checkbox:checked').each(function(i){
		 $(this).parent().parent().fadeOut();
		});


		}
});

		
		});
		
		$('#button').on('click', function(){
  // Change values
  $('.cb').prop('checked', ($(this).val() == 'Selectall'));
  // Change caption of this button
  $(this).val( ($(this).val() == 'Selectall' ? 'UnSelectall' : 'Selectall') );
});
		
		
		
	<?php }  ?>
//for clientservices 
<?php  if(Request::segment(1)=='clientservice'){ ?>
		var val = [];
		$('#sendmail').click(function(){
			token = $('meta[name="csrf-token"]').attr('content');
		$(':checkbox:checked').each(function(i){
		val[i] = $(this).val();
		});
		urlx='{{ route('clientservice.get_ajax')}}',
		//alert(val);
		$.ajax({
		type:'POST',
		headers: {'X-CSRF-TOKEN': token},
		url:urlx,
		data:'val='+val,

		success:function(msg){
//alert(msg);
		$(':checkbox:checked').each(function(i){
		 $(this).parent().parent().fadeOut();
		});


		}
});

		
		});
		
		$('#button').on('click', function(){
  // Change values
  $('.cb').prop('checked', ($(this).val() == 'Selectall'));
  // Change caption of this button
  $(this).val( ($(this).val() == 'Selectall' ? 'UnSelectall' : 'Selectall') );
});
		
		
		
	<?php }  ?>

} );
	<?php if(Request::segment(2)=='banner'){ ?>
		
		$('.order_class').keyup(function(){
			
		var order_id=$(this).val();
		var banner_id=$(this).next().val();
		//alert(banner_id);
			token = $('meta[name="csrf-token"]').attr('content');
			urlx='{{ route('bannerajax.post')}}',
		//alert(val);
		$.ajax({
		type:'POST',
		headers: {'X-CSRF-TOKEN': token},
		url:urlx,
		data:'order_id='+order_id+'&id='+banner_id,

		success:function(msg){

			//alert(msg);


		}
});
			
			
			
		});
		
		<?php } ?>
		<?php if(Request::segment(2)=='ourpartner'){ ?>
		
		$('.order_class').keyup(function(){
			
		var order_id=$(this).val();
		var banner_id=$(this).next().val();
		//alert(banner_id);
			token = $('meta[name="csrf-token"]').attr('content');
			urlx='{{ route('partnerajax.post')}}',
		//alert(val);
		$.ajax({
		type:'POST',
		headers: {'X-CSRF-TOKEN': token},
		url:urlx,
		data:'order_id='+order_id+'&id='+banner_id,

		success:function(msg){

			alert(msg);
			
			
		}
});
			
			
			
		});
		
		<?php }if(Request::segment(2)=='jainpeople'){ ?>
			$('.addvalue').click(function(){
			
			var email=$('#emailxx').val();
			var fnm=$('#fnmm').val();
			var lnm=$('#lnmm').val();
			//alert(banner_id);
				token = $('meta[name="csrf-token"]').attr('content');
				urlx='{{ route('jainpeople.ajaxother')}}',
			//alert(val);
			$.ajax({
			type:'POST',
			headers: {'X-CSRF-TOKEN': token},
			url:urlx,
			//data:'email='+email+'&fnm='+fnm+'&lnm='+lnm,
			data:$("#testform").serialize(),
			//dataType:'JSON',
			success:function(msg){
	
				//alert(msg);
				console.log(msg);
				//var newRowContent = "<tr><td>"+msg.fnm+"</td><td>"+msg.lnm+"</td><td>"+msg.email+"</td></tr>";

 			$(".newone").append(msg);
	
	
			}
	});
				
				
				
			});
			$('body').on('click', '.delbo', function(){
		//alert('hello');
		$(this).parent().remove();
			});

		<?php } ?>
		
	</script>
	<?php if(Request::segment(2)=='events' && Request::segment(3)!='add' && Request::segment(3)!='edit'){
		?>
		{!! $calendar->script() !!}
		<?php }?>
	<?php  if(Request::segment(4)=='edit'||Request::segment(3)=='print' ){ ?>
	<link href="//cdn.rawgit.com/noelboss/featherlight/1.5.0/release/featherlight.min.css" type="text/css" rel="stylesheet" />
	 <script src="//code.jquery.com/jquery-latest.js"></script>
	<script src="//cdn.rawgit.com/noelboss/featherlight/1.5.0/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
	<?php } ?>
	
  </body>
</html>
