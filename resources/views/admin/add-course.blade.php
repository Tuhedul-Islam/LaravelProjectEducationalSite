@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('all-course')}}"><button class="btn btn-success mb-1">All Course</button></a>
@endsection

@section('table')
    <h5 class="bg-light display-block p-2">Add Course</h5>

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
                    {!! Form::open(['route' => 'add-course', 'method' => 'POST', 'files' => true]) !!}

                        <fieldset>
                            <div class="form-group">
                                {!! Form::label('name', 'Course Name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Course Name']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('title', 'Course Title') !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Course Title']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('fee', 'Course Fee') !!}
                                {!! Form::number('fee', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Course Fee']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('image', 'Course Image') !!}
                                {!! Form::file('image', ['required'=>'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('status', 'Publication Status') !!}
                                {!! Form::checkbox('status', 1, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'status']) !!}
                            </div>

                            {!! Form::submit('Add Course', ['class' => 'btn btn-primary']) !!}
                        </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



