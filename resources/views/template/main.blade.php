<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <title>Document</title>
</head>

<body>
 @include('template.menu')
  <main>
    <div class="container">
        <div class="content">
            @yield('container')
        </div>
    </div>
  </main>
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
