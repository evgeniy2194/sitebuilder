@include('layouts.partials.head')

@include('layouts.partials.navbar')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>

@include('layouts.partials.foot')
