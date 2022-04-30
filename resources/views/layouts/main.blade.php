<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="css/css-bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <title>{{ $title }}</title>
</head>
<body>
    @include('partials.navbar')

    <div class="">
        @yield('container')
    </div>

    @include('partials.footer')

    
    <script src="js/js-bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        var nav = document.querySelector('nav');
        // var b = document.querySelector('a.nav-link');
        // var a = b.querySelector('a');

        window.addEventListener('scroll', function(){
            if(window.pageYOffset > 100){
                nav.classList.add('bg-dark', 'shadow');
                // a.classList.add('nav-link-b');
            }else{
                nav.classList.remove('bg-dark', 'shadow');
                // a.classList.remove('nav-link-b');
            }
        });
    </script>
    <script>
        $('li > a').click(function() {
             $('li').removeClass();
             $(this).parent().addClass('activenav');
         });
         
         document.querySelectorAll('a[href^="#"]').forEach(anchor => {
             anchor.addEventListener('click', function (e) {
                 e.preventDefault();
 
                 document.querySelector(this.getAttribute('href')).scrollIntoView({
                     behavior: 'smooth'
                 });
             });
         })
     </script>
</body>
</html>