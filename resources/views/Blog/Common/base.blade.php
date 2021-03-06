
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="博客,论坛,社区,个人博客,技术社区,技术论坛,开源博客,开源社区,开源论坛">
  <meta name="description" content="博客,论坛,社区,个人博客,技术社区,技术论坛,开源博客,开源社区,开源论坛">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Free社区</title>
  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
  <link rel="stylesheet" href="{{asset('css/global.css')}}">
  <script  src="{{asset('layui/layui.js')}}"></script>
  <script  src="{{asset('js/jquery.min.js')}}"></script>
  <script  src="{{asset('js/common.js')}}"></script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>
  @yield('resources')
</head>
<body>

  @include('Blog.Common.header')

  @yield('main')

  @include('Blog.Common.footer')

</body>
</html>