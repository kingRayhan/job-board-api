
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Techdiary</title>

    <style>
        body{
            background: #FDF9F3;
            font-family: monospace;
        }
        .wrapper{
            background-color: #fff;
            padding: 20px;
            border: 4px solid #ECDBC2;

        }
        h1{
            padding: 0;
            margin: 0;
        }

        a{
            color: #333333;
            font-size: 18px;
            display: block;;
            margin: 8px 0;
        }
    </style>
</head>
<body class="antialiased">
<div class="wrapper">
    <h1>Job Board API V3</h1>
    <a href="{{env('FRONTEND_URL')}}">Web Client</a>
    <a href="{{env('DOC_BASE_URL')}}">Documentation</a>
</div>
</body>
</html>
