<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Melofusion</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <!-- Additional custom styles -->
    <style>
        /* Global Body Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #333;
            padding: 15px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar h3 {
            color: #fff;
            font-size: 28px;
            margin: 0;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .row {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        /* Center section buttons */
        .navbar .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar .btn {
            background-color: #007bff;
            color: #fff;
            padding: 12px 18px;
            font-size: 18px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 0 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .btn:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .navbar .btn:active {
            background-color: #003f7f;
        }

        .navbar .upload-btn {
            background-color: #28a745;
            transition: background-color 0.3s ease;
        }

        .navbar .upload-btn:hover {
            background-color: #218838;
        }

        /* Hidden for small screens */
        .hidden-xs {
            display: block;
        }

        @media (max-width: 768px) {
            .hidden-xs {
                display: none;
            }

            .navbar .container {
                flex-direction: column;
                align-items: center;
            }

            .navbar .row {
                flex-direction: column;
                align-items: center;
            }

            .navbar h3 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .navbar .btn {
                margin: 10px 0;
            }
        }

        /* Content Section */
        .content {
            margin-top: 80px; /* To avoid navbar overlap */
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            font-size: 18px;
        }

        .content h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #333;
        }

        .content p {
            line-height: 1.8;
            color: #555;
        }

        /* Button Styles for Icons */
        .fa {
            margin-right: 8px;
        }

        /* Modal Styles */
        .modal-content {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .modal-header, .modal-footer {
            background-color: #7b24a3;
            color: #fff;
            border-radius: 8px 8px 0 0;
        }

        .modal-header h5 {
            margin: 0;
            font-size: 24px;
        }

        .modal-body {
            padding: 20px;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Add some spacing for elements within content */
        .content > * {
            margin-bottom: 20px;
        }

        /* Adding hover effect on navbar items */
        .navbar .btn {
            transition: all 0.3s ease-in-out;
        }

        .navbar .btn:hover {
            background-color: #007bff;
            transform: scale(1.1);
        }

        .navbar .btn:active {
            background-color: #0056b3;
        }
    </style>
</head>

    <body>
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 hidden-xs">
                        <div class="navbar-header">
                            <a href="{{ route('google.login') }}">
                                <h3>MeloFusion</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 center">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn prev-btn" id="prev-btn">
                                    <span class="fa fa-step-backward" aria-hidden="true"></span>
                                </button>
                                <button class="btn play-btn" id="play-btn">
                                    <span class="fa fa-play" aria-hidden="true"></span>
                                </button>
                                <button class="btn pause-btn" id="pause-btn" style="display: none">
                                    <span class="fa fa-pause" aria-hidden="true"></span>
                                </button>
                                <button class="btn next-btn" id="next-btn">
                                    <span class="fa fa-step-forward" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @if (Auth::check())
                        <div class="col-md-4 hidden-xs">
                            <button class="btn upload-btn" data-toggle="modal" data-target="#upload-song-modal">
                                <span class="fa fa-plus-circle" aria-hidden="true"></span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        <div class="content">
            @yield('content')
        </div>

        @if (Auth::check())
            @include('components.upload-song-modal')
        @endif

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

        @yield('scripts')
    </body>
</html>