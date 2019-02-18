@extends('layouts.app')

@section('content')
    <h1>this is transaction page</h1>

     @foreach ($tranx as $item)
         <ul>
             <li>
                 {{$item}}
             </li>
         </ul>
     @endforeach
@endsection