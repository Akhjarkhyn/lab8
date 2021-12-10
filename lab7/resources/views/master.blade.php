<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">   
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>
            @yield("title")
    </title>
</head>
<body>
    <div>

        <nav class="navbar text-light" style="background-color: #211f2c;">
            <div class="d-flex p-2" id="nav-logo">
                <p class="mr-3 mt-2">Сайна байна уу?</p>    
                <img src="/img/logo.png" alt="">
            </div> 
        </nav>

    <div class="sidebar">
        <a id="student-link" href="http://127.0.0.1:8000/student">Students</a>
        <a id="search-link" href="http://127.0.0.1:8000/search">Search</a>
        <a id="account-link" href="http://127.0.0.1:8000/account">Account</a>
        <a id="transaction-link" href="http://127.0.0.1:8000/transaction">Transaction</a>
        <a id="flight-link" href="http://127.0.0.1:8000/flight">Flight</a>
    </div>

    <div class="main">
        <div class="container-fluid mt-3">
            @yield("content-title")
            @yield("content")
            @yield("script")
        </div>
    </div>
</body>
</html>