<!DOCTYPE html>
<html lang="en">

<head>
    <title>Alpha Rent</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="Alpha Rent - Perusahaan rental kendaraan yang telah menyediakan solusi mobilitas yang handal dan efisien sejak didirikan. Sebagai pemimpin dalam industri ini, Alpha Rent menawarkan armada kendaraan terkini yang dirawat dengan baik, mulai dari mobil ekonomi hingga kendaraan mewah, memenuhi berbagai kebutuhan pelanggan dengan berbagai selera dan anggaran." />
    <meta name="keywords"
        content="Alpha Rent - Perusahaan rental kendaraan yang telah menyediakan solusi mobilitas yang handal dan efisien sejak didirikan. Sebagai pemimpin dalam industri ini, Alpha Rent menawarkan armada kendaraan terkini yang dirawat dengan baik, mulai dari mobil ekonomi hingga kendaraan mewah, memenuhi berbagai kebutuhan pelanggan dengan berbagai selera dan anggaran." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Alpha Rent - Perusahaan rental kendaraan yang telah menyediakan solusi mobilitas yang handal dan efisien sejak didirikan. Sebagai pemimpin dalam industri ini, Alpha Rent menawarkan armada kendaraan terkini yang dirawat dengan baik, mulai dari mobil ekonomi hingga kendaraan mewah, memenuhi berbagai kebutuhan pelanggan dengan berbagai selera dan anggaran." />
    <meta property="og:url" content="https://rent-alpha.com/" />
    <meta property="og:site_name" content="Alpha | Rent Batam" />
    <link rel="canonical" href="https://rent-alpha.com/" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />


    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    {{-- Sweet alert --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- live chat --}}

    <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "e72e959c-79cd-4537-92aa-9b1b009e79e1";
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>

</head>

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <script>
        var defaultThemeMode = "dark"; // Mengubah default ke "dark"
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>


    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        @include('layouts.header')
        @yield('content')
    </div>


    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

</body>

</html>
