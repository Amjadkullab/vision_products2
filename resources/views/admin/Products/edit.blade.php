@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-12">
            <h1>Update Client</h1>
            @include('admin.layouts.error')

     <form action="{{route('clients.update', $client->id)}}" method="post">

      @csrf
      @method('put')

      <div class="mb-3">
          <input type="text" name="name" class="form-control" value="{{$client->name}}">
      </div>

       <button class="btn btn-warning px-5">update</button>





    </form>





        </div>
    </div>
</div>





@endsection
