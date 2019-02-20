
@extends('layouts.app')
@section('content')
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
     


@php
    // $gtpay_cust_id = {{$user_id}} ;
    $gtpay_cust_id = time().rand(123, 100);
$gtpay_tranx_id = rand(100000, 9000000);

@endphp

<div class="">




            {{-- another form --}}
            <div class=" container ">  
        <form class="payment"  action="/payment" method="POST" >
          @csrf
          <div>
        
              <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="71E128D2" />
              <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="0jpRXa0nWOikF+p5Rq1VeUSuuzEqiajfNC2aYKPDlL6C4I3QFDHMvi4y8gPvMEXogipRVDyx6z2USgOBJ1G$ "/>
      </div>
            <div class="panel panel-default credit-card-box">
              <div class="panel-heading display-table">
                <div class="row display-tr">
                  <h3 class="panel-title display-td">Torama Pay</h3>         
                  <img class="img-responsive pull-right" src="{{ asset('images/paylogo.png') }}" alt="Interswitch">
                </div>
                        <p>Torama online payment interface.</p>
              </div>
            </div>
            <br>
           
              <div class="container">
                <span class="label label-primary">Trasaction id</span>
                  <input type="show" readonly class="form-control"  name="gtpay_tranx_id" value="<?php echo $gtpay_tranx_id; ?>"  />
              </div>
              <div class="container">
                  <span class="label label-primary">Customer id</span>
              <input type="show" readonly  class="form-control"  name="gtpay_cust_id"  value="{{$user_id}}"  />
              </div>
           
              <div class="container">
                  <span class="label label-primary">Transacton amount</span>
                  <input type="show"  class="form-control"  name="gtpay_tranx_amt" placeholder="Transaction amount"  />
              </div>
              <div class="container">
                  <span class="label label-primary">Customer name</span>
                  <input type="text"  class="form-control" name="gtpay_cust_name" placeholder="your name"  value="{{ Auth::user()->name }}" />
              </div>
              <div class="container">
                  <span class="label label-primary">Memo</span>
                  <input type="text"  class="form-control"  name="gtpay_tranx_memo" placeholder="Memo. e.g school fee."  />
              </div>

           
           
           
            <a href="/home"></a>
            <button class="blueButton" style="float:right;" type="submit">Pay Now</button>
            <br><br>
        </form>
                
              <br><br><br><br>
                </div>
                
              </div>
@endsection


