@if(Session::has('success'))
  <script type="text/javascript">
   var label = '{{ Session::get('success') }}';
   alert(label);
  </script>
@endif

@if(Session::has('error'))
 <script type="text/javascript">
 	var label = '{{ Session::get('error') }}';
    alert(label);  
 </script>
@endif