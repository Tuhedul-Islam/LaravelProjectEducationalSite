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
    <table class="table table-striped border table-sm table-hover">
        <thead class="thead-dark">
        <tr>
            <th>SL No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
            <tr>
                <td>{{$i}}</td>
                <td>{{$admin_info->name}}</td>
                <td>{{$admin_info->email}}</td>
                <td class="center">
                    <a class="btn btn-info btn-sm" href="{{route('edit-admin-profile', $admin_info->id)}}">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
