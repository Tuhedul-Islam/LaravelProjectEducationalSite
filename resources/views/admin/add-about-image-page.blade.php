@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('about-image')}}"><button class="btn btn-success mb-1">Images</button></a>
@endsection

@section('table')
    <h5 class="bg-light display-block p-2">Add Image</h5>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-success text-center">
                    <?php
                    $msg = Session::get('message');
                    if ($msg){
                        echo $msg;
                        Session::put('message', null); //flush
                    }
                    ?>
                </p>

                <div class="admin-for col-md-8 ">
                    {!! Form::open(['route' => 'add-about-image', 'method' => 'POST', 'files' => true]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('image', 'About Image') !!}
                            {!! Form::file('image', ['required'=>'required']) !!}
                        </div>

                        {!! Form::submit('Add Image', ['class' => 'btn btn-primary']) !!}
                    </fieldset>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



