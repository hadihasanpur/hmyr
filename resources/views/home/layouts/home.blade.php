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

    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style></style>
</head>
<body>


    <div class="wrapper">

        @include('home.sections.header')

        {{-- @include('home.sections.mobile_off_canvas') --}}

        @yield('content')

        @include('home.sections.footer')

    </div>

    <!-- JavaScript-->
    {{-- <script src="{{ asset('/js/home/jquery-1.12.4.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/js/home/plugins.js') }}"></script> --}}
    {{-- <script src="{{ asset('/js/home.js') }}"></script> --}}

    {{-- Tailwinfcss js Scripts --}}
    <script>
        document.addEventListener("alpine:init", () => {
          Alpine.data("dropdown", () => ({
            open: false,
    
            toggle() {
              this.open = !this.open;
            },
          })),
            Alpine.data("darkMode", () => ({
              darkMode: false,
              nextMode: "",
    
              init() {
                this.nextMode = localStorage.nextThemeMode;
                if (localStorage.theme === "dark") {
                  this.darkMode = true;
                } else {
                  this.darkMode = false;
                }
              },
              toDarkMode() {
                localStorage.theme = "dark";
                localStorage.nextThemeMode = "system";
                this.darkMode = true;
                this.nextMode = "system";
              },
    
              toSystemMode() {
                localStorage.theme = window.matchMedia(
                  "(prefers-color-scheme: dark)"
                ).matches
                  ? "dark"
                  : "light";
                localStorage.nextThemeMode = "light";
                this.darkMode = window.matchMedia(
                  "(prefers-color-scheme: dark)"
                ).matches;
                this.nextMode = "light";
              },
    
              toLightMode() {
                localStorage.theme = "light";
                localStorage.nextThemeMode = "dark";
                this.darkMode = false;
                this.nextMode = "dark";
              },
            })),
            Alpine.data("tabs", () => ({
              tabName: "nature",
              tabs: [
                {
                  category: "nature",
                  display_category: "هتل مروارید",
                  images: [
                    "./dist/images/hotel/hotel1.jpg",
                    "./dist/images/hotel/hotel2.jpg",
                    "./dist/images/hotel/room1.jpg",
                    "./dist/images/hotel/room3.jpg",
                    "./dist/images/hotel/room5.jpg",
                    "./dist/images/hotel/room9.jpg",
                    "./dist/images/hotel/room10.jpg",
                    "./dist/images/hotel/room21.jpg",
                    "./dist/images/hotel/hptel6.jpg",
                    "./dist/images/hotel/shab.jpg",
                    "./dist/images/hotel/sham1.jpg",
                    "./dist/images/hotel/sham3.jpg",
                    "./dist/images/hotel/shish1.jpg",
                    "./dist/images/hotel/shish3.jpg",
    
                  ],
                },
                {
                  category: "technology",
                  display_category: "خانه جوان",
                  images: [
                    "./dist/images/phantom/pa2.jpg",
                    "./dist/images/phantom/pa2.png",
                    "./dist/images/phantom/pa3.jpg",
                    "./dist/images/phantom/pa4.jpg",
                    "./dist/images/phantom/ph1.jpg",
    
                  ],
                },
                {
                  category: "travel",
                  display_category: "بتن صنعت",
                  images: [
                    "./dist/images/beton/block.jpg",
                    "./dist/images/beton/das1.jpg",
                    "./dist/images/beton/kaf.jpg",
                    "./dist/images/beton/kaf4.jpg",
                  ],
                },
                {
                  category: "all",
                  display_category: "همه",
                  images: [
                    "./dist/images/nature/img_1.jpg",
                    "./dist/images/nature/img_2.jpg",
                    "./dist/images/nature/img_3.jpg",
                    "./dist/images/nature/img_4.jpg",
                    "./dist/images/technology/img_1.jpg",
                    "./dist/images/technology/img_2.jpg",
                    "./dist/images/technology/img_3.jpg",
                    "./dist/images/technology/img_4.jpg",
                    "./dist/images/travel/img_1.jpg",
                    "./dist/images/travel/img_2.jpg",
                    "./dist/images/travel/img_3.jpg",
                    "./dist/images/travel/img_4.jpg",
                  ],
                },
              ],
            }));
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    {{--  EndTailwinfcss js Scripts --}}

    @include('sweet::alert')

    @yield('script')

</body>

</html>
