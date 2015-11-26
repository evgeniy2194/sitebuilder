@include('layouts.partials.head')

@include('layouts.partials.navbar')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('flash::message')
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('layouts.partials.sidebar')
            @yield('sidebar')
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>

@include('layouts.partials.foot')
