@extends("layouts.admin-layout")

@section('admin-icon')
    <p class="text-success text-center display-block bg-light">
        <?php
        $msg = Session::get('message');
        if ($msg){
            echo $msg;
            Session::put('message', null); //flush
        }
        ?>
    </p>
@endsection

@section('table')
    <h5 class="bg-light display-block p-2">Edit Admin Info</h5>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="admin-for col-md-8 ">
                    {!! Form::model($admin_info, ['route' => ['update-admin-profile', $admin_info->id], 'method' => 'POST', 'files' => true]) !!}

                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('name', 'Admin Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => 'Course Title']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('pass', 'Admin Password') !!}
                            {!! Form::text('pass', null, ['class' => 'form-control', 'required'=>'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Admin Email') !!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'required'=>'required', 'disabled' => 'disabled']) !!}
                        </div>

                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
