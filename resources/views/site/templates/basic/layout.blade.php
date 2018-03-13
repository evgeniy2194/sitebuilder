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

    <div class="row">
        <div class="col-md-12">
            <p class="text-center">
                @php
                    $lc_api_token = config('sitebuilder.linkcloud_api_token');
                    $lc_user_agent = null;
                    if(isset($_SERVER['HTTP_USER_AGENT']))
                        $lc_user_agent = $_SERVER['HTTP_USER_AGENT'];

                    $lc_ip_address = null;
                    if(isset($_SERVER['REMOTE_ADDR']))
                        $lc_ip_address = $_SERVER['REMOTE_ADDR'];

                    $links = '';
                    if( ! is_null($lc_user_agent) && ! is_null($lc_ip_address))
                    {
                        $request_url = 'https://linkcloud.net/api/v1/links?api_token='.$lc_api_token.'&ip='.urlencode($lc_ip_address).'&ua='.urlencode($lc_user_agent);
                        $links = file_get_contents($request_url, false);
                    }
                    echo $links;
                @endphp
            </p>
        </div>
    </div>

</div>

</body>
</html>