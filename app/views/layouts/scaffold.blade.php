<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  		{{ HTML::style('css/bootstrap.min.css'); }}

		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
			.handle { cursor:move; }
		</style>

		{{ HTML::style('css/bootstrap-responsive.min.css'); }}
        {{ HTML::style('css/bootstrap-override.css'); }}
  
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
        <![endif]-->

	</head>

	<body>

		<div class="container">
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
		</div>


        <script src="/processchecklist/js/jquery.js"></script>
        <script src="/processchecklist/js/bootstrap-transition.js"></script>
        <script src="/processchecklist/js/bootstrap-alert.js"></script>
        <script src="/processchecklist/js/bootstrap-modal.js"></script>
        <script src="/processchecklist/js/bootstrap-dropdown.js"></script>
        <script src="/processchecklist/js/bootstrap-scrollspy.js"></script>
        <script src="/processchecklist/js/bootstrap-tab.js"></script>
        <script src="/processchecklist/js/bootstrap-tooltip.js"></script>
        <script src="/processchecklist/js/bootstrap-popover.js"></script>
        <script src="/processchecklist/js/bootstrap-button.js"></script>
        <script src="/processchecklist/js/bootstrap-collapse.js"></script>
        <script src="/processchecklist/js/bootstrap-carousel.js"></script>
        <script src="/processchecklist/js/bootstrap-typeahead.js"></script>
        <script src="/processchecklist/js/jquery-ui-1.10.3/ui/jquery.ui.core.js"></script>
        <script src="/processchecklist/js/jquery-ui-1.10.3/ui/jquery.ui.widget.js"></script>
        <script src="/processchecklist/js/jquery-ui-1.10.3/ui/jquery.ui.mouse.js"></script>
        <script src="/processchecklist/js/jquery-ui-1.10.3/ui/jquery.ui.draggable.js"></script>
        <script src="/processchecklist/js/jquery-ui-1.10.3/ui/jquery.ui.sortable.js"></script>
        


        <!-- TODO: Investigate AJAX a la http://stackoverflow.com/questions/15633341/jquery-ui-sortable-then-write-order-into-a-database -->
		<script>
  		$(function() {
  		  $( "#sortable" ).sortable({
  		  	handle: ".handle",
  		  	cursor: "move",
  		    placeholder: "info"
  		  });
  		  $( "#sortable" ).disableSelection();
  		});
		</script>

	</body>

</html>