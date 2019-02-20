@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              

              

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
            <a class="nav-link active" href="/trax">My transactions</a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link active " href="/paynow">pay now</a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link active " href="/dash">Dashboard</a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link active " href="/profile">Profile</a>
          </li>
          
        </ul><br>
      </div>

      
        {{-- my dashboard --}}
     
 
            <div class="bg-secondary">
                    <div class="jumbotron bg-secondary text-white">
                            <h1 class="text-center"></h1> 
                            <p class="text-center ">welcome to your dashboard</p> 
                          </div>   
            <div class="container bg-white ">
                    <h2> </h2>
                           
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th>Details</th>
                          <th> :</th>
                          <th>Result</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><h4>Successful Transactiions</h4>  </td>
                          <td> :</td>
                          <td><h4> {{$success_ful_trax}}</h4></td>
                        </tr>
                        <tr>
                          <td><h4>All my transactions</h4> </td>
                          <td> :</td>
                          <td><h4>{{$my_total_trax}}</h4></td>
                        </tr>
                        <tr>
                          <td> <h4>Failed transaction</h4></td>
                          <td> :</td>
                          <td> <h4>{{$failed}}</h4></td>
                        </tr>
                        <tr>
                          <td> <h4>Last Transaction made </h4></td>
                          <td> :</td>
                          <td> <h6> {{$last_tranx}} </h6></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
               
</div>
@endsection
