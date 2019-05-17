<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> @yield('title') </title>
    <link type="text/css" href="{{ asset('/css/design.css') }}" rel="stylesheet">
</head>

<body>
    @yield('content')

    @section('scripts')
        <script
            src="https://code.jquery.com/jquery-3.4.0.min.js"
            integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous">
        </script>
    @show
</body>
</html>
