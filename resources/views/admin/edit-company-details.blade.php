@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('company-detail')}}"><button class="btn btn-success mb-1">Company Details</button></a>
@endsection

@section('table')
    <h5 class="bg-light display-block p-2">Edit Company Details</h5>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="admin-for col-md-8 ">
                    {!! Form::model($single_content, ['route' => ['update-company-details', $single_content->id], 'method' => 'POST', 'files' => true]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('title', 'Content Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Course Title']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('details', 'Content message') !!}
                            {!! Form::textarea('details', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Content Message', 'style' => 'resize:none', 'rows' => 8]) !!}
                        </div>

                        {!! Form::submit('Update Content', ['class' => 'btn btn-primary']) !!}
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



