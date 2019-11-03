<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::to('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}"/> --}}

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/admin-style.css')}}" type="text/css" />

    <!-- Google font -->
    <link href="{{URL::to('https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600')}}" rel="stylesheet">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section id="form">
        <h1 class="text-center">Admin Login</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-danger text-center">
                        <?php
                        $msg = Session::get('message');
                        if ($msg){
                            echo $msg;
                            Session::put('message', null); //flush
                        }
                        ?>
                    </p>

                    <div class="admin-form col-md-6 mx-auto">
                        <form action="{{route('login')}}" method="post">
                        @csrf
                            <fieldset>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>






    <script type="text/javascript" src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

    <script src="{{URL::to('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{URL::to('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="{{URL::to('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
