@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('company-detail')}}"><button class="btn btn-success mb-1">Company Details</button></a>
@endsection

@section('table')
    <h5 class="bg-light display-block p-2">Add Company Details</h5>

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
                    {!! Form::open(['route' => 'add-company-details', 'method' => 'POST', 'files' => true]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Title']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('details', 'Company Details') !!}
                            {!! Form::textarea('details', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Company Details', 'style' => 'resize:none', 'rows' => 8]) !!}
                        </div>

                        {!! Form::submit('Add Details', ['class' => 'btn btn-primary']) !!}
                    </fieldset>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



