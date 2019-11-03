@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('why-us')}}"><button class="btn btn-success mb-1">WhyUs Content</button></a>
@endsection

@section('table')
    <h5 class="bg-light display-block p-2">Add WhyUs Content</h5>

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
                    {!! Form::open(['route' => 'add-why-us', 'method' => 'POST', 'files' => true]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('title', 'Content Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Title']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('message', 'Content message') !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Content Message', 'style' => 'resize:none', 'rows' => 8]) !!}
                        </div>


                        {!! Form::submit('Add Content', ['class' => 'btn btn-primary']) !!}
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



