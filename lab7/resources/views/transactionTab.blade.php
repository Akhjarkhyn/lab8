@extends('master')
@section('title')
    Гүйлгээ
@endsection

@section('content-title')
<div class="container-fluid d-flex justify-content-between">
    <h4 style="margin-left: 20px">TRANSACTION</h4>
    <h4 id="date"></h4>
</div>
@endsection

@section("script")
    <script  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#search-link").removeClass("active");
            $("#student-link").removeClass("active");
            $("#transaction-link").addClass("active");
            $("#account-link").removeClass("active");
            $("#flight-link").removeClass("active");
            var date = new Date();
            $("#date").html("<strong>Өнөөдөр:</strong> " + date.getDate() + "/" + (date.getMonth()+1) + '/' + date.getFullYear())

        });
    </script>    
@endsection


@section('content')
<div class="container mt-4 bg-white p-4">
    <label for="" class="h4">Create transaction</label>    
</div>

<div class="container mt-1 bg-white p-4">
    <form action="createTransaction" method="post">
        {{csrf_field()}}
        <div class="container">
            <label for="">Шилжүүлэх данс:</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="transactionFrom" id="" class="form-control"> 
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <label for="">Хүлээн авах данс:</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="transactionTo" id="" class="form-control"> 
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <label for="">Гүйлгээний дүн:</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="transactionAmount" id="" class="form-control"> 
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <label for="">Гүйлгээний утга:</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="transactionDescription" id="" class="form-control"> 
                </div>
            </div>
            <input type="submit" value="sumbit" class="btn btn-primary mt-3">    
        </div>

    </form>
    
    @if(isset($err))
        <div class = "alert alert-danger mt-2">
            {{$err}}
        </div>
    @endif


    @if ($errors -> any())
            <div class = "alert alert-danger mt-2">
                <ol>
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
    @endif

</div>

@endsection