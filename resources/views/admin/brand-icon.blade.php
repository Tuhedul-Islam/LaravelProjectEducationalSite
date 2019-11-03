@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('add-icon-page')}}"><button class="btn btn-success mb-1">Add Icon</button></a>
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
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        @foreach($all_icon as $icon)
            <tr>
                <td>{{$i}}</td>
                <td><img src="{{$icon->icon}}" alt="Icon image" height="80px" width="90px" class="img-responsive"></td>
                @if($icon->publication_status == 1)
                    <td class="text-white"><span class="bg-success p-1">published</span></td>
                @else
                    <td class="text-white"><span class="bg-danger p-1">unpublished</span></td>
                @endif
                <td class="center">
                    @if($icon->publication_status == 1)
                        <a class="btn btn-danger btn-sm" href="{{URL::to('/active-inactive-icon/'.$icon->id."/".$icon->publication_status)}}">
                            <i class="fa fa-thumbs-down"></i>
                        </a>
                    @else
                        <a class="btn btn-danger btn-sm" href="{{URL::to('/active-inactive-icon/'.$icon->id."/".$icon->publication_status)}}">
                            <i class="fa fa-thumbs-up"></i>
                        </a>
                    @endif
                    <a class="btn btn-info btn-sm" href="{{route('edit-icon', $icon->id)}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="{{url('/delete-icon', $icon->id)}}" id="delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
@endsection
