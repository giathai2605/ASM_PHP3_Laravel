<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon"
        href="https://designreset.com/cork/laravel/build/assets/favicon.34dd7cba.ico" />
    <link rel="preload" as="style" href="{{ asset('build/assets/loader.c40a282a.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/loader.c40a282a.css') }}" />
    <link rel="modulepreload" href="{{ asset('build/assets/loader.ebb4c7c9.js') }}" />
    <script type="module" src="{{asset('build/assets/loader.ebb4c7c9.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="preload" as="style" href="{{ asset('build/assets/main.72b3e3e6.css') }}" />
    <link rel="preload" as="style" href="{{ asset('build/assets/main.b0573015.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/main.72b3e3e6.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/main.b0573015.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/waves/waves.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/highlight/styles/monokai-sublime.css') }}">
    <link rel="preload" as="style" href="{{ asset('build/assets/perfect-scrollbar.682153c9.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/perfect-scrollbar.682153c9.css') }}" />


    <link rel="preload" as="style" href="{{ asset('build/assets/structure.6ac30bc7.css') }}" />
    <link rel="preload" as="style" href="{{ asset('build/assets/structure.6dfd760a.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/structure.6ac30bc7.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/structure.6dfd760a.css') }}" />


    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="{{ asset('plugins/apex/apexcharts.css') }}">

    <link rel="preload" as="style" href="{{ asset('build/assets/list-group.8fe0ce4c.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/list-group.8fe0ce4c.css') }}" />
    <link rel="preload" as="style" href="{{ asset('build/assets/modules-widgets.1baf2021.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/modules-widgets.1baf2021.css') }}" />
    <link rel="preload" as="style" href="{{ asset('build/assets/list-group.40423aa1.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/list-group.40423aa1.css') }}" />
    <link rel="preload" as="style" href="{{ asset('build/assets/modules-widgets.438cac09.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/modules-widgets.438cac09.css') }}" />
    <!--  END CUSTOM STYLE FILE  -->
    <title>{{$title}}</title>
</head>

<body>

    <body class="layout-boxed">

        @include('admin.template.navbar')

        @include('admin.template.sidebar')

        @yield('content')

    </body>
    
    <script src="{{ asset('plugins/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('plugins/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ asset('plugins/waves/waves.min.js') }}"></script>
    <script src="{{ asset('plugins/highlight/highlight.pack.js') }}"></script>

    <link rel="modulepreload" href="{{ asset('build/assets/app.e5f7dcf7.js') }}" />
    <script type="module" src="{{asset('build/assets/app.e5f7dcf7.js')}}"></script>
    <!-- END GLOBAL MANDATORY STYLES -->


    <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>


    <link rel="modulepreload" href="{{ asset('build/assets/_wSix.8606dce5.js') }}" />
    <script type="module" src="{{asset('build/assets/_wSix.8606dce5.js')}}"></script>
    <link rel="modulepreload" href="{{ asset('build/assets/_wChartThree.2fe722cd.js') }}" />
    <script type="module" src="{{asset('build/assets/_wChartThree.2fe722cd.js')}}"></script>
    <link rel="modulepreload" href="{{ asset('build/assets/_wHybridOne.ff7ea50b.js') }}" />
    <script type="module" src="{{asset('build/assets/_wHybridOne.ff7ea50b.js')}}"></script>
    <link rel="modulepreload" href="{{ asset('build/assets/_wActivityFive.c9c0812e.js') }}" />
    <script type="module" src="{{asset('build/assets/_wActivityFive.c9c0812e.js')}}"></script>
    <script src="{{ asset('upload_file/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('upload_file/jquery/input-mask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('upload_file/jquery/input-mask/jquery.imputmask.date.extension.js') }}"></script>
    <script>
        $(function() {
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#avatar").change(function() {
                readURL(this, '#image_preview');
            });

        });
    </script>

</html>
