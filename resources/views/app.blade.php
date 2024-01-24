<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>thatsWE</title>


  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
  <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
  <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
  <meta name="theme-color" content="#ffffff">


  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300&amp;display=swap"
    rel="stylesheet">
  <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/user.css') }}" rel="stylesheet" />
  {{--
  <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" /> --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  @yield('styles')
  <style>
    .main {
      min-height: 100vh;
      /* Minimum height of the main content */
    }

    .bg-holder {
      background-position: center center;
      background-size: cover;
      background-repeat: no-repeat;
      height: 100vh;
    }

    @media (max-width: 768px) {

      body,
      html {
        overflow-x: auto;
        overflow-y: auto;
      }
    }

    /* Add this CSS to your stylesheet */
    @media (max-width: 991.98px) {

      /* Styles for mobile menu items background color */
      .navbar-collapse {
        background-color: #f0f0f0;
        /* Change this to your desired gray color */
      }

      .navbar-nav .nav-link {
        padding: 15px;
        /* Adjust padding as needed */
      }
    }
  </style>
</head>


<body>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="light">
      <div class="container"><a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('assets/img/icons/logo3.png') }}" alt="logo"
            style="max-width: 180px; width: 100%; height: auto;" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-center">
            <li class="nav-item"><a class="nav-link px-3" href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
            <li class="nav-item"><a class="nav-link px-3" href="{{ url('/offer') }}?#offer">{{ __('messages.get_info')
                }}</a></li>
            <li class="nav-item"><a class="nav-link px-3" href="{{ url('/recommendation') }}#recommend">{{
                __('messages.recommendation') }}</a></li>
            {{-- <li class="nav-item"><a class="nav-link px-3" href="{{ url('/about') }}">{{ __('messages.about_us')
                }}</a></li>
            <li class="nav-item"><a class="nav-link px-3" href="{{ url('/policy') }}">{{ __('messages.privacy_policy')
                }}</a></li>
            {{-- <li class="nav-item"><a class="nav-link px-3" href="{{ url('/recommendation') }}#recommend">{{
                __('messages.recommendation') }}</a></li> --}}

            <li class="nav-item"><a class="nav-link px-3" href="{{ url('/order') }}">{{
                __('messages.order') }}</a></li>
          </ul>
          <div class="col-md-4">
            <form action="{{ route('LangChange') }}" method="GET">
              @csrf
              <select class="form-control Langchange" name="locale" onchange="this.form.submit()">
                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                <option value="de" {{ app()->getLocale() == 'de' ? 'selected' : '' }}>Deutsch</option>
                <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
                <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
                <option value="tr" {{ app()->getLocale() == 'tr' ? 'selected' : '' }}>Türkçe</option>
                <option value="it" {{ app()->getLocale() == 'it' ? 'selected' : '' }}>Italiano</option>
                <option value="pt" {{ app()->getLocale() == 'pt' ? 'selected' : '' }}>Português</option>
                <option value="da" {{ app()->getLocale() == 'da' ? 'selected' : '' }}>Dansk</option>
                <option value="nl" {{ app()->getLocale() == 'nl' ? 'selected' : '' }}>Nederlands</option>
              </select>

            </form>
          </div>

        </div>


      </div>
    </nav>

    @yield('content')


    {{-- <section class="py-0" style="background-color: #6f42c1; color: white;">

      <div class="container">
        <div class="row justify-content-md-between justify-content-evenly py-3">
          <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
            <p class="fs--1 my-2 fw-bold text-200">&copy; 2024 thatsWE Inc &nbsp;&nbsp; | &nbsp;&nbsp; {{
              __('messages.website_dev') }} <a class="fw-bold text-info text-200" href="https://apnadevs.com/"
                target="_blank">ADevs </a></p>
          </div>
          <div class="col-12 col-sm-8 col-md-6">
            <p class="fs--1 my-2 text-center text-md-end text-200"><a class="fw-bold text-info text-200"
                href="{{ url('/policy') }}">{{ __('messages.privacy_policy_imprint') }}</a>
            </p>
          </div>
        </div>
      </div>
      <!-- end of .container-->

    </section> --}}


  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->




  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <!-- <script src="{{ asset('assets/vendors/popper/popper.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/anchorjs/anchor.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/is/is.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/fontawesome/all.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/lodash/lodash.min.js') }}"></script> -->
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js"></script>
  <!-- <script src="{{ asset('assets/vendors/imagesloaded/imagesloaded.pkgd.js') }}"></script>
  <script src="{{ asset('assets/vendors/gsap/customEase.js') }}"></script>
  <script src="{{ asset('assets/vendors/gsap/scrollToPlugin.js') }}"></script> -->
  <!--script(src=`${CWD}vendors/gsap/drawSVGPlugin.js`)-->
  <script src="{{ asset('assets/js/theme.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    // var url = "{{ route('LangChange') }}";
    // $(".Langchange").change(function () {
    //   window.location.href = url + "?lang=" + $(this).val();
    // });
    console.clear();
  </script>
</body>

</html>