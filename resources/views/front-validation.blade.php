<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion</title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--Custom CSS-->
    <style>
        body {
            background-color: white;
            padding: 20px;
        }

        .card {
            border: 5px solid green;
        }

        h2 {
            font-size: 36px;
        }

        h3 {
            font-size: 30px;
        }

        h4 {
            font-size: 24px;
        }

        .btn {
            margin-top: 30px;
        }
    </style>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Validación de conocimientos FRONT') }}</div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($characters as $character)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img class="card-img-top" src="{{ $character['image'] }}" alt="{{ $character['name'] }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $character['name'] }}</h5>
                                        <p class="card-text">{{ $character['type'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2>Build anything.</h2>
            <h3>Reimagine commerce.</h3>
            <p>Millions of merchants trust Shopify to run their business - but they need developers to build the tools that help them achieve independence. Access powerful APIs to bring your ideas to life on the platform that makes commerce better for everyone.</p>
            <h4>Develop apps that solve complex merchant problems</h4>
            <p>Expansive GraphQl and Rest APIs let you integrate into Shopify's admin, online store, checkout, and more.</p>
            <h4>Integrate seamlessly into existing workflows</h4>
            <p>Embed your app's features with App Bridge. Create high quality experiences with the ready-to-build Polaris component library.</p>
            <h4>Help merchants express themselves</h4>
            <p>Use Liquid to build beautiful theme templates. Get started with Dawn

            </html>
</body>       






