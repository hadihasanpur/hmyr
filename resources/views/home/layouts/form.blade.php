<!DOCTYPE html>
<html x-data="darkMode" lang="fa" dir="rtl" :class="{ 'dark' : darkMode }">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>سازمان همیاری</title>

    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="../css/boot.css" /> --}}
    <link rel="stylesheet" href="./../css/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>

    </style>
</head>

<body>
    <div class="wrapper">
        @yield('content')
    </div>

    {{-- Tailwinfcss js Scripts --}}

    @include('sweet::alert')

    @yield('script')

</body>

</html>