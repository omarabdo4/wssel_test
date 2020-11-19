        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'WsselTest') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                         <li class="nav-item"><a href="{{url("/")}}" class="nav-link">Home</a></li>
                         <li class="nav-item"><a href="{{url("/customers")}}" class="nav-link">Customers</a></li>
                         <li class="nav-item"><a href="{{url("/orders")}}" class="nav-link">Orders</a></li>
                    </ul>
                </div>
            </div>
        </nav>