<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Fonts -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <!-- Styles -->

    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <li class="nav-item active">
        <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }} <span class="sr-only">(current)</span></a>
      </li>
      @endforeach

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">{{__('messages.Login')}}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{__('messages.Register')}}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                {{__('messages.Add your offer')}}
                </div>
                @if(Session::has('success'))
<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>    <br>      
  @endif              
     <form method="POST" action="{{route('store')}} "enctype='multipart/form-data'>
     @csrf

     <div class="form-group">
    <label for="exampleInputEmail1">choose photo</label>
    <input type="file" class="form-control" name="photo"">
    @error('photo')
    <div class="alert alert-warning" role="alert">
  {{$message}}
</div>
    @enderror
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">{{__('messages.Offer name_ar')}}</label>
    <input type="text" class="form-control" name="name_ar"  placeholder="{{__('messages.Offer name_ar')}}">
    @error('name_ar')
    <div class="alert alert-warning" role="alert">
  {{$message}}
</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">{{__('messages.Offer name_en')}}</label>
    <input type="text" class="form-control" name="name_en"  placeholder="{{__('messages.Offer name_en')}}">
    @error('name_en')
    <div class="alert alert-warning" role="alert">
  {{$message}}
</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">{{__('messages.Offer price')}}</label>
    <input type="text" class="form-control" name="price"  placeholder="{{__('messages.Offer price')}}">
    @error('price')
    <div class="alert alert-warning" role="alert">
  {{$message}}
</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">{{__('messages.Offer details_ar')}}</label>
    <input type="text" class="form-control" name="details_ar" placeholder="{{__('messages.Offer details_ar')}}">
    @error('details_ar')
    <div class="alert alert-warning" role="alert">
  {{$message}}
</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">{{__('messages.Offer details_en')}}</label>
    <input type="text" class="form-control" name="details_en" placeholder="{{__('messages.Offer details_en')}}">
    @error('details_en')
    <div class="alert alert-warning" role="alert">
  {{$message}}
</div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
</form>         
                  
                
            </div>
        </div>
    </body>
</html>
