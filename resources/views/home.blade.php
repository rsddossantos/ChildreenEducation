<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/home.css')}}" />
    <link rel="icon" type="image/png" href="{{url('assets/images/favicon.png')}}" />
    <script src="{{url('assets/js/jquery.js')}}"></script>
    <script src="{{url('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2e4a70;width: 100%">
    <h4>Childreen Education</h4>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            @foreach ($child as $item)
                <li class="nav-item">
                    <a class="nav-link @php echo $item->active==1 ?'active':'' @endphp" href="{{url('/list')}}/{{$item->id}}">{{$item->name}}</a>
                </li>
            @endforeach
                <li class="nav-item">
                    <a class="nav-link @php echo isset($report) ?'active':'' @endphp" href="{{url('/report')}}">CASTIGOS</a>
                </li>
        </ul>
    </div>
</nav>
<div class="container">
    <section>
        @yield('content')
    </section>
</div>
<!--Modal Confirm-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Marcação</h5>
            </div>
            <div class="modal-body" id="myModalLabel">Confirmar</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="modal-btn-si">OK</button>
                <button type="button" class="btn btn-default" id="modal-btn-no">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{url('assets/js/home.js')}}"></script>
</body>
</html>
