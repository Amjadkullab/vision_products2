@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
<div class="row justify-content">
    <div class="col-12">

        @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif

        <h1>All Products</h1>

        <table class="table">

       <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Content</th>
           <th>Image</th>
           <th>Price</th>
           <th>Category</th>
           <th>Client</th>
           <th>Created At</th>
           <th>Actions</th>
       </tr>
       @foreach ($products as $product )

       <tr>
           <td>{{$product->id}}</td>
           <td>{{$product->name}}</td>
           <td>{{$product->content}}</td>
           <td><img width="100" src="{{asset('uploads/' . $product->image)}}" ></td>
           <td>{{$product->price}}</td>
           <td>{{$product->category_id}}</td>
           <td>{{$product->client_id}}</td>
           <td>{{$product->created_at->format('d - m - y')}}</td>
           <td>
          <a class="btn btn-sm btn-primary" href="{{route('products.edit',$product->id)}}"><i class="fas fa-edit"></i></a>
           <form class="d-inline" action="{{route('products.destroy', $product->id)}}">
              @csrf
              <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>

        </form>

           </td>
       </tr>


       @endforeach









        </table>
    </div>
</div>

</div>




@endsection
