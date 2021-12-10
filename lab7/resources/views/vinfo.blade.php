@extends('master')
@section('title')
    Оюутны мэдээлэл
@endsection

@section('content-title')
<div class="container-fluid d-flex justify-content-between">
    <h4 style="margin-left: 20px">Student Info</h4>
    <h4 id="date"></h4>025-
</div>
@endsection




@section('content')
<div class="container mt-4 bg-white">
    <div style="width: 300px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Code:</strong> {{@$a[0]}}</li>
            <li class="list-group-item"><strong>First Name:</strong> {{@$a[1]}}</li>
            <li class="list-group-item"><strong>Last Name:</strong> {{@$a[2]}}</li>
            <li class="list-group-item"><strong>Age:</strong> {{@$a[3]}}</li>
        </ul>
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