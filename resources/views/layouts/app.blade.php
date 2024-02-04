<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Extra details for Live View on GitHub Pages -->
    
    <title>
        {{ __('Projeto Mendes') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

    <link  rel="stylesheet" href="{{asset('css/paper-dashboard.css')}}"/>
   
    

</head>

<body class="{{ $class }}">
    
    @auth()
        @include('layouts.page_templates.auth')
        
    @endauth
    
    @guest
        @include('layouts.page_templates.guest')
    @endguest

    <!--   Core JS Files   -->
    <script src="{{asset('js/core/jquery.min.js')}}"></script>
    <script src="{{asset('js/core/popper.min.js')}}"></script>
    <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    

    
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
   
    <script src="{{asset('/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('/js/plugins/bootstrap-notify.jss')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->

    <script src="{{asset('/js/paper-dashboard.min.js?v=2.0.0')}}"></script>
   <!-- Sharrre libray -->
 
    <script src="{{asset('../demo/jquery.sharrre.js')}}"></script>
  
    <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script src="{{asset('js/chart.js')}}" ></script>
     <script src="{{asset('js/main.js')}}"></script>
    @stack('scripts')

    <script>
        function filtragem() {
             var input, filter, table, tr, td, i;
             input = document.getElementById("mylist");
             filter = input.value.toUpperCase();
             table = document.getElementById("myTable");
             tr = table.getElementsByTagName("tr");
             for (i = 0; i < tr.length; i++) {
               td = tr[i].getElementsByTagName("td")[0];
                //console.log(i, td); // add this to find out what you are comparing with
               if (td) {
                 if (td.innerHTML.toUpperCase() === filter) {  
                   tr[i].style.display = "";
                 } else {
                   tr[i].style.display = "none";
                 }
               }
             }
           }
               </script>

    @include('layouts.navbars.fixed-plugin-js')
</body>

</html>
