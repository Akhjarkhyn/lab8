@extends('master')
@section('title')
    Хайлт
@endsection

@section('content-title')
<div class="container-fluid d-flex justify-content-between">
    <h4 style="margin-left: 20px">SEARCH</h4>
    <h4 id="date"></h4>
</div>
@endsection

@section('content')
<div class="container mt-4 bg-white p-4">
    <label for="" class="h4">ОЮУТНЫ КОДООР ХАЙХ:</label>    
</div>
<div class="container mt-1 bg-white p-4" style="height: 300px;">
    <label for="" class="">Оюутны кодоо оруулна уу:</label>
    <form action="doSearch" method="post" class="d-flex">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-8">
                <input type="text" name="sid" class="form-control">
            </div>    
            <div class="col-sm-4">
                <input type="submit" value="ХАЙХ" class="btn btn-primary">
            </div>
        </div>
    </form>

             @if ($errors -> any())
            <div class = "alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

    @if(isset($a))
        <div style="width: 300px;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Code:</strong> {{@$a[0]}}</li>
                <li class="list-group-item"><strong>First Name:</strong> {{@$a[1]}}</li>
                <li class="list-group-item"><strong>Last Name:</strong> {{@$a[2]}}</li>
                <li class="list-group-item"><strong>Age:</strong> {{@$a[3]}}</li>
            </ul>
            </div>
    @elseif(isset($b))
        <p>Хайлт олдсонгүй</p> 
    @endif  

</div>
@endsection

@section("script")
    <script  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#search-link").addClass("active");
            $("#student-link").removeClass("active");
            $("#transaction-link").removeClass("active");
            $("#account-link").removeClass("active");
            $("#flight-link").removeClass("active");
            var date = new Date();
            $("#date").html("<strong>Өнөөдөр:</strong> " + date.getDate() + "/" + (date.getMonth()+1) + '/' + date.getFullYear())

        });
    </script>    
@endsection
