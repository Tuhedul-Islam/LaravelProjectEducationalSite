@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('about-content')}}"><button class="btn btn-success mb-1">All Content</button></a>
@endsection

@section('table')
    <h5 class="bg-light display-block p-2">Add Content</h5>

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
                    {!! Form::open(['route' => 'add-content', 'method' => 'POST', 'files' => true]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('title', 'Content Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Course Title']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('body', 'Content message') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Content Message', 'style' => 'resize:none', 'rows' => 8]) !!}
                        </div>


                        {!! Form::submit('Add Content', ['class' => 'btn btn-primary']) !!}
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



