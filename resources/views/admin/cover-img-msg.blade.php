@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('add-coverimg-msg-page')}}"><button class="btn btn-success mb-1">Add CoverImg & MSG</button></a>
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
            <th>Title</th>
            <th>Body</th>
            <th>Btn Text</th>
            <th>Cover Img</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        @foreach($all_coverImgMsg as $coverImgMsg)
            <tr>
                <td>{{$i}}</td>
                <td>{{$coverImgMsg->title}}</td>
                <td>{{$coverImgMsg->body}}</td>
                <td>{{$coverImgMsg->btnText}}</td>
                <td><img src="{{$coverImgMsg->coverImg}}" alt="Icon image" height="80px" width="90px" class="img-responsive"></td>

                <td class="center">
                    <a class="btn btn-info btn-sm" href="{{route('edit-coverimg-msg', $coverImgMsg->id)}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="{{url('/delete-coverimg-msg', $coverImgMsg->id)}}" id="delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php $i++; ?>
        @endforeach
        </tbody>
    </table>
@endsection
