<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('client/assets/img/favicon.ico') }}">

<!-- ======= All CSS Plugins here ======== -->
<link rel="stylesheet" href="{{ asset('client/assets/css/plugins/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('client/assets/css/plugins/glightbox.min.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Plugin css -->
<link rel="stylesheet" href="{{ asset('client/assets/css/vendor/bootstrap.min.css') }}">

<!-- Custom Style CSS -->
<link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}">
<meta name="id_user" content="{{ isset(Auth::user()->id) ? Auth::user()->id : 'null' }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
