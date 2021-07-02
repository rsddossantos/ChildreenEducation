<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/home.css')}}" />
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
        </ul>
    </div>
</nav>
<div class="container">
    <section>
        @yield('content')
    </section>
</div>
<script type="text/javascript" src="{{url('assets/js/home.js')}}"></script>
</body>
</html>
