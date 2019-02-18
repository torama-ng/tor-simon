@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

              

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            

                   
                </div>
            </div>
        </div>
    </div>
    
<div class="container">
    
        <ul class="nav nav-pills nav-justified">
          <li class="nav-item  ">
            <a class="nav-link active" href="/transactions">Transactions</a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link active " href="/paynow">pay now</a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link active " href="history">History</a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link active " href="/profile">Profile</a>
          </li>
          
        </ul><br>
      
      
     
      </div>
      
</div>
@endsection
