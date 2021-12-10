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
<div class="container">
    <div class="container">
        <form action="dosearch" method="post">
            {{csrf_field()}}

            <div class="row mt-3">
                <div class="col-6">
                    <label for="">From :</label>
                    <input type="text" name="departureAirport" class="form-control">
                </div>
                <div class="col-6">
                    <label for="">To :</label>
                    <input type="text" name="arrivalAirport" class="form-control">
                </div>
            </div>

            <div class="row  mt-3">
                <div class="col-6">
                    <label for="">When :</label>
                    <input type="date" name="departureDate" id="" class="form-control">
                </div>

                <div class="col-6">
                    <label for="">Passenger Number</label>
                    <input type="number" name="availablePassenger" id="" class="form-control">
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Search" class="btn btn-primary col-4 form-control"
                    style="margin: 20px auto;">
            </div>
        </form>
    </div>

    @if(isset($a))
    <div class="container">
        <table class="table table-hover mt-2">
            <tr>
                <th>№</th>
                <th>From where</th>
                <th>To where</th>
                <th>when</th>
            </tr>
            @foreach($a as $e)
            <tr>
                <td style="width: 12%">{{$e->id}}</td>
                <td style="width: 20%">{{$e->departureAirport}}</td>
                <td style="width: 20%">{{$e->arrivalAirport}}</td>
                <td style="width: 20%">{{$e->departureDate}}</td>
                <td style="width: 28%"><a href="{{url('booking')}}/{{$e->id}}" class="badge badge-warning">Buy Ticket</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif
</div>
@endsection