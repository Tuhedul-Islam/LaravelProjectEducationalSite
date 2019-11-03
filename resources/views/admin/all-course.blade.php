@extends("layouts.admin-layout")

@section('admin-icon')
    <a href="{{route('add-course-page')}}"><button class="btn btn-success mb-1">Add Course</button></a>
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
            <th>Title</th>
            <th>Fee</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        @foreach($all_course as $course)
            <tr>
                <td>{{$i}}</td>
                <td>{{$course->course_name}}</td>
                <td>{{$course->course_title}}</td>
                <td>{{$course->course_fee}}</td>
                <td><img src="{{$course->course_image}}" alt="course image" height="80px" width="90px" class="img-responsive"></td>
                @if($course->publication_status == 1)
                    <td class="text-white"><span class="bg-success p-1">published</span></td>
                @else
                    <td class="text-white"><span class="bg-danger p-1">unpublished</span></td>
                @endif
                <td class="center">
                    @if($course->publication_status == 1)
                        <a class="btn btn-danger btn-sm" href="{{URL::to('/active-inactive-course/'.$course->id."/".$course->publication_status)}}">
                            <i class="fa fa-thumbs-down"></i>
                        </a>
                    @else
                        <a class="btn btn-danger btn-sm" href="{{URL::to('/active-inactive-course/'.$course->id."/".$course->publication_status)}}">
                            <i class="fa fa-thumbs-up"></i>
                        </a>
                    @endif
                    <a class="btn btn-info btn-sm" href="{{route('edit-course', $course->id)}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="{{url('/delete-course', $course->id)}}" id="delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php $i++; ?>
        @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$all_course->render()}}
        </div>
    </div>{{----}}

@endsection
