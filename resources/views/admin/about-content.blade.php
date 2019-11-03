@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('add-content-page')}}"><button class="btn btn-success mb-1">Add Content</button></a>
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
            <th>No</th>
            <th>Title</th>
            <th>Msg Body</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        @foreach($all_content as $content)
            <tr>
                <td>{{$i}}</td>
                <td>{{$content->title}}</td>
                <td>{{$content->body}}</td>
                <td class="center">
                    <a class="btn btn-info btn-sm" href="{{route('edit-content', $content->id)}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="{{url('/delete-content', $content->id)}}" id="delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php $i++; ?>
        @endforeach
        </tbody>
    </table>
@endsection
