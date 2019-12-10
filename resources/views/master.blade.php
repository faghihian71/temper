<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scotch.io GuestBook</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-findcond">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="">Temper Report</a>
            </div>
        </div>
    </nav>
    <div class="container">

            <report-component></report-component>

    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/highcharts-vue@1.3.5/dist/highcharts-vue.min.js"></script>

</body>
</html>
