@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
<div class="row justify-content">
    <div class="col-12">

        @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif

        <h1>All Clients</h1>

        <table class="table">

       <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Created At</th>
           <th>Actions</th>
       </tr>
       @foreach ($clients as $client )

       <tr>
           <td>{{$client->id}}</td>
           <td>{{$client->name}}</td>
           <td>{{$client->created_at->format('d - m - y')}}</td>
           <td>
          <a class="btn btn-sm btn-primary" href="{{route('clients.edit',$client->id)}}"><i class="fas fa-edit"></i></a>
           <form class="d-inline" action="{{route('clients.destroy', $client->id)}}">
              @csrf
              <button class="btn btn-m btn-danger"><i class="fas fa-times"></i></button>

        </form>

           </td>
       </tr>


       @endforeach









        </table>
    </div>
</div>

</div>




@endsection
