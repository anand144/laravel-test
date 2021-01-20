<head>

  <!-- Basic -->
  <meta charset="UTF-8">

  <title>Test</title>  
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <!-- Web Fonts  -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{asset('theme/vendor/bootstrap/css/bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('theme/vendor/font-awesome/css/font-awesome.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/magnific-popup/magnific-popup.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

  <!-- Specific Page Vendor CSS -->
  <link rel="stylesheet" href="{{asset('theme/vendor/jquery-ui/jquery-ui.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/jquery-ui/jquery-ui.theme.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/select2/css/select2.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/dropzone/basic.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/dropzone/dropzone.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/summernote/summernote-bs4.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/codemirror/lib/codemirror.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/vendor/codemirror/theme/monokai.css')}}" />

  <!-- Theme CSS -->
  <link rel="stylesheet" href="{{asset('theme/css/theme.css')}}" />

  <!-- Skin CSS -->
  <link rel="stylesheet" href="{{asset('theme/css/skins/default.css')}}" />

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="{{asset('theme/css/custom.css')}}">
  @yield('css')
  <!-- Head Libs -->
  <script src="{{asset('theme/vendor/modernizr/modernizr.js')}}"></script>
  
</head>