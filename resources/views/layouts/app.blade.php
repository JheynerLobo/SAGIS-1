<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tittle')</title>


    <!-- Fuente de google: Open Sans - Regular 400 -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--Link del boostrap-->
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!--Importar CSS y script del menú -->
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">

    @yield('css')

    @yield('custom_css')

</head>

<body>



    <!-- Nav -->
    @include('partials.navbar')
    <!-- ./Nav -->



    @yield('content')


    <!-- Footer -->
    @include('partials.footer')
    <!-- ./Footer -->

    <script src="{{ asset('js/ligthboxjs/lightbox-plus-jquery.min.js') }}"></script>
    <script src=" {{ asset('js/sesion.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    @yield('js')

    @if ($message = Session::get('alert_message'))
        <script>
            Swal.fire({
                position: 'center',
                icon: "{{ $message['icon'] }}",
                title: "{{ $message['title'] }}",
                text: "{{ $message['text'] }}",
                showConfirmButton: true,
                confirmButtonText: 'Ok',
                timer: 3500
            })
        </script>
    @endif

    @yield('custom_js')

</body>

</html>
