<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="background-color: darkkhaki;">
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: beige;">
            <div class="container-fluid">
                <a class="navbar-brand roboto-bold" href="{{ route('Welcome') }}" style='font-size: 2rem'>iCare</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    </ul>

                    <form class="form d-flex" method="post" action="{{ route('Logout') }}" accept-charset="UTF-8">

                        {{ csrf_field() }}

                        <div class="align-middle">
                            <button type="submit" class="btn btn-primary ms-5 pt-1" style="margin-top: 33px">Logout</button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
        <div class="row container-fluid">
            @if(Session::has('matches'))
            <h1 class="roboto-bold mt-5">Interested Customers:</h1>
            <table class="table" style='background-color: whitesmoke'>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Customer First Name</th>
                        <th scope="col">Customer Last Name</th>
                        <th scope="col">Customer email</th>
                        <th scope="col">Customer Phone Number</th>
                        <th scope="col">Service</th>
                        <th scope="col">Current Payments</th>
                        <th scope="col">Has Contract</th>
                        <th scope="col">Description</th>
                        <th scope="col">Remove Row</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matches as $match)
                    <tr>
                        <th scope="row" class="table-active">{{$match->first_name}}</th>
                        <td class="table-active">{{$match->last_name}}</td>
                        <td class="table-active">{{$match->email}}</td>
                        <td class="table-active">{{$match->phone_no}}</td>
                        <td class="table-active">{{$match->service_type}}</td>
                        <td class="table-active">{{ empty($match->current_cost) ? 0 : $match->current_cost}}</td>
                        <td class="table-active">{{ ($match->contract_exp == "None" || $match->contract_exp == null) ? "No" : "Yes"}}</td>
                        <td class="table-active">{{ empty($match->description) ? "No Description" : $match->description}}</td>
                        <td class="table-active"><a class="btn btn-danger" href="http://localhost/icaretobymclenon/public/dashboard/remove/interest/<?=$match->cust_id?>/<?=$match->service_type?>/<?=($match->contract_exp == null) ? "None" : $match->contract_exp ?>" role="button">Remove</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h1 class="text-center mt-5">You currently have no new notifications. <br> Here is a list of general information regarding customer services in the area.</h1>
            @endif
            
            <h1 class="roboto-bold mt-5">All Registered Services:</h1>
            <table class="table" style='background-color: whitesmoke'>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Service</th>
                        <th scope="col">Current Payments</th>
                        <th scope="col">Is Looking</th>
                        <th scope="col">Has Contract</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($custs as $cust)
                <tr>
                        <th scope="row" class="table-active">{{$cust->service_type}}</th>
                        <td class="table-active">{{ empty($cust->current_cost) ? 0 : $cust->current_cost}}</td>
                        <td class="table-active">{{$cust->looking}}</td>
                        <td class="table-active">{{ ($cust->contract_exp == "None" || $cust->contract_exp == null) ? "No" : "Yes"}}</td>
                    </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </body>
</html>
