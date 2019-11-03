@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('why-us')}}"><button class="btn btn-success mb-1">WhyUs Content</button></a>
@endsection

@section('table')
    <h5 class="bg-light display-block p-2">Edit Content</h5>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="admin-for col-md-8 ">
                    {!! Form::model($single_content, ['route' => ['update-whyus-content', $single_content->id], 'method' => 'POST', 'files' => true]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('title', 'Content Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Course Title']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('message', 'Content message') !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Content Message', 'style' => 'resize:none', 'rows' => 8]) !!}
                        </div>

                        {!! Form::submit('Update Content', ['class' => 'btn btn-primary']) !!}
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



