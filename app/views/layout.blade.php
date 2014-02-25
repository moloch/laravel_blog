<html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
</script>
<script type="text/javascript">
  var $SCRIPT_ROOT = "{{ URL::to('/') }}";
</script>
    <body>
        <a href="{{ URL::to('/') }}">
        	<h1>Laravel Blog</h1>
        </a>
        @yield('content')
    </body>
</html>