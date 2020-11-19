@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-10">
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Edit Order with id of {{$order->id}}</h4>
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{url("/orders/".$order["id"])}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="amount">Amount</label>
                <input name="amount" type="number" step="0.01" class="form-control" id="amount" aria-describedby="amountHelp" placeholder="Enter Amount" value="{{$order->amount}}">
                <small id="amountHelp" class="form-text text-muted">amount</small>
            </div>
            <div class="form-group">
                <label for="shoptype">Shop Type</label>
                <select name="shoptype" class="form-control" id="shoptype">
                    @foreach ($shoptypes as $shoptype)
                        
                    <option value="{{$shoptype->id}}" {{$shoptype->id == $order->shoptype_id ? 'selected': ''}}>{{$shoptype->type}}</option>
                    @endforeach
                </select>
              </div>
            <div class="form-group">
                <label>Customer Name : {{$order->customer->name}}</label>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@endsection