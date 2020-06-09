<!DOCTYPE html>
<!--[if IE 7]>					<html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Over+the+Rainbow|Open+Sans:300,400,400italic,600,700|Arimo|Oswald|Lato|Ubuntu' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>{{ $title }} | UAFCR</title>
	
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut" href="{{ config('app.url') }}/home/images/favicon.ico" />

	<link rel="stylesheet" href="{{ config('app.url') }}/home/css/skeleton.css" media="screen" />
	<link rel="stylesheet" href="{{ config('app.url') }}/home/css/style.css" media="screen" />
	<link rel="stylesheet" href="{{ config('app.url') }}/home/css/mediaelementplayer.css" media="screen" />
	<link rel="stylesheet" href="{{ config('app.url') }}/home/fancybox/jquery.fancybox.css" media="screen" />

	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" href="{{ config('app.url') }}/home/rs-plugin/css/settings.css" media="screen" />	
	
	<!-- HTML5 SHIV + DETECT TOUCH EVENTS -->
	<script type="text/javascript" src="{{ config('app.url') }}/home/js/modernizr.custom.js"></script>
</head>
<body class="color-1 h-style-1 text-1">
	
	<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->	
	
	@include('home.partials.header')
	
	<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->	
	

<!--------------------------------Content --------------------------------------->


	@yield('content')			
		
	
	<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->			
		
	
	<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->	
	
	@include('home.partials.footer')
	
	<!-- - - - - - - - - - - - - end Bottom Footer - - - - - - - - - - - - - -->		

<!-- GET JQUERY FROM THE GOOGLE APIS -->
<script src="{{ config('app.url')}}/home/jquery/jquery.min.js"></script>
<!--[if lt IE 9]>
	<script src="js/selectivizr-and-extra-selectors.min.js"></script>
<![endif]-->
<script src="{{ config('app.url') }}/home/js/respond.min.js"></script>

 <!-- JQUERY KENBURN SLIDER  -->	
<script src="{{ config('app.url') }}/home/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>			
<script src="{{ config('app.url') }}/home/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>	
<script src="{{ config('app.url') }}/home/js/jquery.easing.1.3.js"></script>
<script src="{{ config('app.url') }}/home/js/jquery.cycle.all.min.js"></script>
<script src="{{ config('app.url') }}/home/js/mediaelement-and-player.min.js"></script>
<script src="{{ config('app.url') }}/home/js/jquery.isotope.min.js"></script>
<script src="{{ config('app.url') }}/home/fancybox/jquery.fancybox.pack.js"></script>
<script src="{{ config('app.url') }}/home/js/custom.js"></script>
<script src="{{ config('app.url') }}/home/typehead/bootstrap3-typeahead.min.js"></script>  
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        },
        highlighter: function (item, data) {
            var parts = item.split('#'),
                html = '<div class="row">';
                html += '<div class="col-md-2">';
                html += '</div>';
                html += '<div class="col-md-10 pl-0">';
                html += '<span><a href="hello.com">'+data.name+'</a></span>';
                html += '</div>';
                html += '</div>';

            return html;
        }
    });
</script>
</body>
</html>
