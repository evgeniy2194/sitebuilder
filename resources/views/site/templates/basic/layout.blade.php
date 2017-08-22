<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            @yield('page-header')
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            @yield('content')
        </div>
        <div class="col-md-4">
            @yield('sidebar')
        </div>
    </div>

</div>

</body>
</html>