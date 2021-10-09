@extends('layouts.app')

@section('content')

    <section>
<span> Welcome back, {{$user->first_name . ' ' . $user->last_name}} </span>
    </section>
    <br>
    Previous orders:
    <br>
    @foreach ($user->orders as $order)
    <a href="/order/{{$order->id}}">
    <div>
    ordernr: {{$order->id}}
    orderdate: {{$order->created_at}}
    status: {{$order->status}}
    total: {{$order->total_price}}
    {{-- TODO - link to order show page --}}
    </div>
    <a>
    <br>
    @endforeach

@endsection