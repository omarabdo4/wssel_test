@extends('layouts.app')

@section('content')
@foreach ($customers as $customer)    
<div class="modal fade" id="sendModal{{$customer["id"]}}" tabindex="-1" role="dialog" aria-labelledby="sendModalLabel{{$customer["id"]}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sendModalLabel{{$customer["id"]}}">Are you sure you want to send this user's information to it@wssel.com ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>        
        <button class="btn btn-danger" onclick="document.getElementById('send-form{{$customer["id"]}}').submit();">
            Yes
        </button>
        <form id="send-form{{$customer["id"]}}" action="{{url("/customers/".$customer["id"])}}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </div>
  </div>
</div>                                  
@endforeach

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-10">
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">All Customers</h4>
    </div>
    <div class="card-body">
        @isset($customers)
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">age</th>
                    <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <th scope="row">{{$customer->id}}</th>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->age}}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="actionMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Choose Action
                                    </a>
        
                                    <div class="dropdown-menu" aria-labelledby="actionMenu">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sendModal{{$customer->id}}">
                                            Send
                                        </a>
                                    </div>
                                </div>        
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1>No Customers found</h1>
        @endisset
    </div>
</div>

        </div>
    </div>
</div>

@endsection