<!DOCTYPE html>
<html x-data="darkMode" lang="fa" dir="rtl" :class="{ 'dark' : darkMode }">
<head>
    <meta charset="utf8mb4_0900_ai_ci" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> سازمان همیاری شهرداریهای آذربایجان‌غربی</title>

    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="dark:bg-slate-800 bg-slate-100">
    <div class="dark:bg-gray-800 dark:border-gray-700 ">
        @include('home.sections.banner')
        @include('home.sections.header')
        {{-- @include('home.sections.mobile_off_canvas') --}}
        @yield('search')
        @yield('content')
          @yield('pictorial')
        @yield('level1')
        @yield('level2')
        @yield('level3')
        @yield('allposts')
        @yield('links')
        @yield('auctions')
        @yield('projects')
        @yield('auction')
        @yield('allpictorials')
        @yield('profile')
        @include('home.sections.footer')
    </div>
    <!-- JavaScript-->
    {{-- <script src="{{ asset('/js/home/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('/js/home/plugins.js') }}"></script>
    <script src="{{ asset('/js/home.js') }}"></script> --}}

    {{-- Tailwinfcss js Scripts --}}
    <script>
        document.addEventListener("alpine:init", () => {
          Alpine.data("dropdown", () => ({
            open: false,
    
            toggle() {
              this.open = !this.open;
            },
          })),
            Alpine.data('darkMode', () => ({
              darkMode: false,
              nextMode: '',
    
              init() {
                if('nextThemeMode' in localStorage){
                      this.nextMode = localStorage.nextThemeMode;
                }else{
                    this.nextMode = 'dark'
                }

                if (localStorage.theme ==='dark') {
                  this.darkMode = true;
                } else {
                  this.darkMode = false;
                }
              },
              toDarkMode() {
                localStorage.theme = 'dark';
                localStorage.nextThemeMode = 'system';
                this.darkMode = true;
                this.nextMode = 'system';
              },
    
              toSystemMode() {
                localStorage.theme = window.matchMedia(
                  "(prefers-color-scheme: dark)"
                ).matches
                  ? 'dark'
                  : 'light';
                localStorage.nextThemeMode = 'light';
                this.darkMode = window.matchMedia(
                  '(prefers-color-scheme: dark)'
                ).matches;
                this.nextMode = 'light';
              },
    
              toLightMode() {
                localStorage.theme = 'light';
                localStorage.nextThemeMode = 'dark';
                this.darkMode = false;
                this.nextMode = 'dark';
              },
            })),
            Alpine.data("tabs", () => ({
              tabName: "hotel",
              tabs: [
                {
                  category: "hotel",
                  display_category: "هتل مروارید",
                  
                },
                {
                  category: "javan",
                  display_category: "خانه جوانی",
                },
                {
                  category: "beton",
                  display_category: "بتن صنعت",
                },
                {
                  category: "all",
                  display_category: "همه",
                },
              ],
            }));
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        function imageData() {
        return {
        previewUrl: "",
        updatePreview() {
        var reader,
        files = document.getElementById("profile_photo_path").files;
        
        reader = new FileReader();
        
        reader.onload = e => {
        this.previewUrl = e.target.result;
        };
        
        reader.readAsDataURL(files[0]);
        },
        clearPreview() {
        document.getElementById("profile_photo_path").value = null;
        this.previewUrl = "";
        }
        };
        }
    </script>
    {{-- EndTailwinfcss js Scripts --}}
    
    @include('sweet::alert')

    @yield('script')

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>
</html>