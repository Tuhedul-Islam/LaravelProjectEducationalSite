@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('cover-img-msg')}}"><button class="btn btn-success mb-1">All CoverImgMsg</button></a>
@endsection

@section('table')
    <h5 class="bg-light display-block p-2">Edit Cover Image And Message</h5>

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
                    {!! Form::model($all_coverImg, ['route' => ['update-coverimg-msg', $all_coverImg->id], 'method' => 'POST', 'files' => true]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required'=>'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('body', 'Message') !!}
                            {!! Form::text('body', null, ['class' => 'form-control', 'required'=>'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('btnText', 'Button Text') !!}
                            {!! Form::text('btnText', null, ['class' => 'form-control', 'required'=>'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('coverImg', 'Cover Image') !!}
                            {!! Form::file('coverImg') !!}
                        </div>

                        {!! Form::submit('Update CoverImgMsg', ['class' => 'btn btn-primary']) !!}
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



