<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>

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

<section>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="{{url('/dashboard')}}">
            <?php
            use App\BrandIcon;
            $icon = BrandIcon::where('publication_status', 1)->first();
            ?>
            <img src="{{!empty($icon)? $icon->icon:asset('frontend/img/ait-logo-small.png')}}" alt="logo" class="img-responsive brand-img">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Session::get('admin_name')}}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('admin-profile')}}">Profile</a>
                        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</section>


<section>
    <div class="row ml-2">
        <div class="col-sm-2 ait-edit">
            <div class="my-2 profile">
                <img src="{{asset('frontend/img/course07.jpg')}}" alt="logo" class="img-responsive profile-img">
            </div>
            <ul class="list-group list-unstyled">
                <li class="list-group-item list-group-item-action active disabled">
                    <a href="#" class="text-white">AIT Edit Zone</a>
                </li>
                <a href="{{route('brand-icon')}}"><li class="list-group-item list-group-item-action">Brand Icon</li></a>
                <a href="{{route('cover-img-msg')}}"><li class="list-group-item list-group-item-action">Cover Img & message</li></a>
                <a href="{{route('about-content')}}"><li class="list-group-item list-group-item-action">About Content</li></a>
                <a href="{{route('about-image')}}"><li class="list-group-item list-group-item-action">About Image</li></a>
                <a href="{{route('all-course')}}"><li class="list-group-item list-group-item-action">All Course</li></a>
                <a href="{{route('why-us')}}"><li class="list-group-item list-group-item-action">WhyUs Content</li></a>
                <a href="{{route('company-detail')}}"><li class="list-group-item list-group-item-action">Company Details</li></a>
                {{--<a href="#"><li class="list-group-item list-group-item-action">Contact Us</li></a>--}}
            </ul>
        </div>
        <div class="col-sm-9 mt-3">
            <h2 class="text-center text-success">Admin Panel</h2>

            <div class="row-fluid">
                @yield('admin-icon')
                <div class="clearfix"></div>
            </div><!--/row-->

            <div class="border p-2">
                @yield('table')
            </div>
        </div>
    </div>
</section>

<footer>
    <p class="text-center bg-dark py-2 text-white">Tuhedul Islam &copy; 2019</p>
</footer>

<script type="text/javascript" src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS-->
<script src="{{URL::to('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{URL::to('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{URL::to('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.2/bootbox.min.js')}}"></script>
<script>
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Are You Sure to Delete", function (confirmed) {
            if(confirmed){
                window.location.href = link;
            };
        });
    });
</script>

</body>
</html>
