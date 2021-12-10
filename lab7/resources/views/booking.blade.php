@extends('master')
@section('title')
Нислэг 
@endsection

@section('content-title')
<div class="container-fluid d-flex justify-content-between">
    <h4 style="margin-left: 20px">Flight</h4>
    <h4 id="date"></h4>
</div>
@endsection


@section("script")
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#search-link").removeClass("active");
        $("#student-link").removeClass("active");
        $("#transaction-link").removeClass("active");
        $("#account-link").removeClass("active");
        $("#flight-link").addClass("active");
        var date = new Date();
        $("#date").html("<strong>Өнөөдөр:</strong> " + date.getDate() + "/" + (date.getMonth() + 1) + '/' + date
            .getFullYear())

    });
</script>
@endsection

@section('content')
<div class="container bg-light">

    <div class="container mt-4">
        <h4>Booking Flight</h4>
    </div>

    <div class="container my-4">
        <form action="validate" method="post">
            {{csrf_field()}}

            <div class="row mt-3">
                <div class="col-6">
                    <label for="">Flight ID :</label>
                    <input type="text" name="id" class="form-control" value="{{$id}}" disabled>
                </div>
                <div class="col-6">
                    <label for="">Date of Birth :</label>
                    <input type="date" name="dob" class="form-control">
                </div>
            </div>

            <div class="row  mt-3">
                <div class="col-6">
                    <label for="">Passenger fullname :</label>
                    <input type="text" name="fullname" id="" class="form-control">
                </div>

                <div class="col-6">
                    <label for="">&nbsp; </label>
                    <input type="submit" name="submit" id="" class="btn btn-primary form-control">
                </div>
            </div>
        </form>
    </div>

    @if(isset($a))
    <div>{{$a}}</div>
    @endif
</div>
@endsection