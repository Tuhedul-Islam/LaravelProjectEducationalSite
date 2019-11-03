@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('all-course')}}"><button class="btn btn-success mb-1">All Course</button></a>
@endsection

@section('table')
    <h5 class="bg-light display-block p-2">Edit Course</h5>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="admin-for col-md-8 ">
                    {!! Form::open(['url' => 'update-course/'.$single_course->id, 'method' => 'POST', 'files' => true]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('name', 'Course Name') !!}
                            {!! Form::text('name', $single_course->course_name, ['class' => 'form-control', 'required'=>'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('title', 'Course Title') !!}
                            {!! Form::text('title', $single_course->course_title, ['class' => 'form-control', 'required'=>'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('fee', 'Course Fee') !!}
                            {!! Form::number('fee', $single_course->course_fee, ['class' => 'form-control', 'required'=>'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('image', 'Course Image') !!}
                            {!! Form::file('image') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Publication Status') !!}
                            {!! Form::checkbox('status', 1, ['class' => 'form-control', 'required'=>'required']) !!}
                        </div>

                        {!! Form::submit('Update Course', ['class' => 'btn btn-primary']) !!}
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



