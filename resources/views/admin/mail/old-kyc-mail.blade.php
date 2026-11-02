<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('detailsApp.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <h3>Welcome ! {{ $name }}</h3>
    <h2 class="mt-3">{{ $smsg }}</h2>
    <p class="mt-3">{{ $kycmessage }}</p>

    <h5>With Regard</h5>
    <h4>Team {{ config('detailsApp.name') }}</h4>
    <img src="{{ $message->embed(public_path() . '/logo/logo-2.png') }}" width="150" />
    <address>zuidplas, zuid-Holland <br>
        Netherlands Region - 2751</address>
    <p>+31 (853 016 212)</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
