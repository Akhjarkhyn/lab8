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
            $("#flight-link").removeClass("active");
            $("#account-link").addClass("active");
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
                    <th>Дансны нэр</th>
                    <th>Дансны дугаар</th>
                    <th>Дансны үлдэгдэл</th>

                @foreach($account as $acc)
                <tr>
                    <td>{{$acc->id}}</td>
                    <td>{{$acc->account_name}}</td>
                    <td><a href="{{url('account')}}/{{$acc->account_number}}">{{$acc->account_number}}</a></td>
                    <td>{{$acc->account_balance}}</td>
                </tr>    
                @endforeach
            </table>
        </div>
@endsection