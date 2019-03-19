<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Developer Web - Marco Antonio García Cabrera</title>
        <link rel="stylesheet" href="css/app.css" type="text/css">
        <script async type="text/javascript" src="js/app.js"></script>
    </head>
    <body>
       <div id="app">
            <div class="container">
                @yield('profile')
                @yield('skills')

                <div class="row">
                  <div class="col-md-7"><h3>Experiencia Laboral</h3><hr></div>
                  <div class="col-md-5"></div>
                  <div class="col-md-6 text-center digitas justify-content-center align-self-center">
                      <a href="https://www.digitas.com/en-us/offices/mexico-city" target="_blank">Digitas México</a>
                  </div>
                  <div class="col-md-6">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra lectus at fermentum pretium. Sed tincidunt lectus nunc, at accumsan lorem finibus non. Nam velit nisl, vulputate sed purus non, luctus ornare tortor. Morbi tincidunt pretium ex ut congue. Vivamus placerat libero non ante aliquet gravida. Morbi odio turpis.
                  </div>
                  <div class="col-md-6">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra lectus at fermentum pretium. Sed tincidunt lectus nunc, at accumsan lorem finibus non. Nam velit nisl, vulputate sed purus non, luctus ornare tortor. Morbi tincidunt pretium ex ut congue. Vivamus placerat libero non ante aliquet gravida. Morbi odio turpis.
                  </div>
                  <div class="col-md-6 text-center">
                      <a href="https://www.cpavision.mx/cpareview/cpa/" target="_blank">CPA Vision</a>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>
