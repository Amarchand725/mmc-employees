<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="icon" href="{{ asset('public/assets/images/logo.png') }}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
   {{--  <!-- Header -->
    @include('layouts.website.header')
    <!-- Header End --> --}}

    @yield('content')


    {{--     <!-- Footer -->
    @include('layouts.website.footer')
    <!-- Footer End --> --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
    @stack('js')
    <script>
        $(document).on('click', '.remove-btn-two',function(){
            $(this).parents('.dynamic-repeater-three').remove();
        });


    </script>
</body>
</html>
