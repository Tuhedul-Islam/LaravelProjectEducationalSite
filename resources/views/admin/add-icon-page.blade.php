@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('brand-icon')}}"><button class="btn btn-success mb-1">Brand Icon</button></a>
@endsection

@section('table')
    <h5 class="bg-light display-block p-2">Add Icon</h5>

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
                    {!! Form::open(['route' => 'add-icon', 'method' => 'POST', 'files' => true]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('image', 'Course Image') !!}
                            {!! Form::file('image', ['required'=>'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Publication Status') !!}
                            {!! Form::checkbox('status', 1, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'status']) !!}
                        </div>

                        {!! Form::submit('Add Icon', ['class' => 'btn btn-primary']) !!}
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



