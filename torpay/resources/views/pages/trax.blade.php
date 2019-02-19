@extends('layouts.app')

@section('content')

<div class="container">
    
    <ul class="nav nav-pills nav-justified">
      <li class="nav-item  ">
        <a class="nav-link active" href="/trax"> My transactions</a>
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


    <button type="button" class="btn btn-info">
        Total <span class="badge badge-light">{{$total}}</span>
      </button>

@if (count($my_trax) > 0)
    @foreach ($my_trax as $item)
  
    <div class="container bg-secondary" >
        <h2 class="text-white" >Transaction Details</h2>
       
        <div class="card">
          <div class="card-body">Transaction id:  {{$item->transaction_id}} </div>
        </div>
         <div class="card">
          <div class="card-body">Amount : #{{$item->amount}}</div>
        </div>
         <div class="card">
          <div class="card-body">Customer id :  {{$item->customer_id}} </div>
        </div>
         <div class="card">
          <div class="card-body">Status Message : {{$item->message}}</div>
        </div>
         <div class="card">
          <div class="card-body">Status Code:  {{$item->status_code}}</div>
        </div>
         <div class="card">
          <div class="card-body">Time :  {{$item->created_at}} </div>
        </div>
      </div>
      <hr>
    @endforeach
    
@else
    <h4 class="text-center bg-warning">You have not done any trasaction </h4>
@endif

</div>
    
@endsection