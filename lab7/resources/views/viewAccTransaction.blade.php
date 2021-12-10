@extends('master')
@section('title')
    Данс
@endsection

@section('content-title')
<div class="container-fluid d-flex justify-content-between">
    <h4 style="margin-left: 20px">ACCOUNT</h4>
    <h4 id="date"></h4>
</div>
@endsection


@section("script")
    <script  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#search-link").removeClass("active");
            $("#student-link").removeClass("active");
            $("#transaction-link").removeClass("active");
            $("#account-link").addClass("active");
            $("#flight-link").removeClass("active");
            var date = new Date();
            $("#date").html("<strong>Өнөөдөр:</strong> " + date.getDate() + "/" + (date.getMonth()+1) + '/' + date.getFullYear())

        });
    </script>    
@endsection

@section('content')
        <div class="container">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Хэнээс</th>
                    <th>Хэнд</th>
                    <th>Дүн</th>
                    <th>Гүйлгээний утга</th>

                @foreach($transaction as $a)
                <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->transaction_from}}</td>
                    <td>{{$a->transaction_to}}</td>
                    <td>{{$a->transaction_amount}}</td>
                    <td>{{$a->transaction_description}}</td>
                </tr>    
                @endforeach
            </table>
        </div>
@endsection