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
<div class="container">
        @if ($gtpay_tranx_status_code != '00')
        <ul class="list-group">
                        <h3 class="bg-danger text-center">Transaction failed!</h3>
                <li class="list-group-item active">Transaction status code : {{$gtpay_tranx_status_code}} </li>
                <li class="list-group-item"> Customer id : {{$gtpay_cust_id}} </li>
                <li class="list-group-item"> Transaction  message : {{$gtpay_tranx_status_msg}} </li>
                <li class="list-group-item"> Customer name : {{$gtpay_echo_data}} </li>
                <li class="list-group-item">  Transaction Amount : {{$gtpay_tranx_amt}} </li>
                <li class="list-group-item">  Transaction id : {{$gtpay_tranx_id}} </li>
              </ul>
        @else
        <ul class="list-group">
              
                <h3 class="bg-success text-center">Transaction Successful!</h3>
                <li class="list-group-item active">Transaction status code : {{$gtpay_tranx_status_code}} </li>
                <li class="list-group-item"> Customer id : {{$gtpay_cust_id}} </li>
                <li class="list-group-item"> Transaction  message : {{$gtpay_tranx_status_msg}} </li>
                <li class="list-group-item"> Customer name : {{$gtpay_echo_data}} </li>
                <li class="list-group-item">  Transaction Amount : {{$gtpay_tranx_amt}} </li>
                <li class="list-group-item">  Transaction id : {{$gtpay_tranx_id}} </li>
              </ul>
        @endif


    
</div>
@endsection