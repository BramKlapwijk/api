<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>API by Bram Klapwijk</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ url('css/theme/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/theme/now-ui-dashboard.css?v=1.0.1') }}" rel="stylesheet"/>
    <link href="{{ url('css/custom.css') }}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
</head>

<body id="app" style="overflow-x: hidden">
<div class="wrapper backgroud">
    <div class="panel-header panel-header-lg text-center">
        <img src="{{ url('/images/atlas.png') }}" style="height: 100%;">
    </div>
    @yield('content')
    <footer class="footer">
        <div class="container-fluid">
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                , Coded by
                <a href="http://bram-klapwijk.nl" target="_blank">Bram Klapwijk</a>
                , Theme by
                <a href="https://www.invisionapp.com" target="_blank">Invision</a>,
                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
            </div>
        </div>
    </footer>
</div>
</body>
<!--   Core JS Files   -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{ url('/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- Chart JS -->
<script src="{{ url('/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ url('/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ url('js/now-ui-dashboard.js?v=1.0.1') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.full.js"></script>
<script src="{{ url('js/dashboard.js') }}"></script>
@yield('javascript')
<script>
    @if(session()->has('error'))
    notification('danger', `{{ session()->get('error') }}`);
    @elseif(session()->has('success'))
    notification('success', `{{ session()->get('success') }}`);
    @elseif(session()->has('info'))
    notification('info', `{{ session()->get('info') }}`);
    @endif
</script>

</html>