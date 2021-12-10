@extends('master')
@section('title')
    Оюутны жагсаалт
@endsection

@section('content-title')
<div class="container-fluid d-flex justify-content-between">
    <h4 style="margin-left: 20px">STUDENT LIST</h4>
    <h4 id="date"></h4>
</div>
@endsection


@section('content')
<div class="container mt-4 bg-white">
    <div style="width: 300px;">
        <ol class="list-group list-group-flush">
            @foreach($a as $student)
                <li class="list-group-item"><a href="{{url('student')}}/{{$student[0]}}">{{$student[0]}}</a></li>
            @endforeach
        </ol>
    </div>
</div>
@endsection

@section("script")
    <script  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#student-link").addClass("active");
            $("#search-link").removeClass("active");
            $("#transaction-link").removeClass("active");
            $("#account-link").removeClass("active");
            $("#flight-link").removeClass("active");
            var date = new Date();
            $("#date").html("<strong>Өнөөдөр:</strong> " + date.getDate() + "/" + (date.getMonth()+1) + '/' + date.getFullYear())

        });
    </script>    
@endsection