@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-12">
            <h1>Update Product</h1>
            @include('admin.layouts.error')

     <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">

      @csrf
      @method('put')

      <div class="mb-3">
          <input type="text" name="name" class="form-control" value="{{old('name',$product->name)}}">
      </div>

      <div class="mb-3">
        <textarea name="content"rows="10" class="form-control" >{{old('content',$product->content)}}</textarea>
      </div>

      <div class="mb-3">
          <label >Image</label>
          <input type="file" name="image" class="form-control" value="{{old('image',$product->image)}}">
          <img width="100" class="mt-1" src="{{asset('uploads/' . $product->image)}}" alt="">
      </div>
      <div class="mb-3">
          <input type="text" name="price" class="form-control" value="{{old('price',$product->price)}}">
      </div>

      <div class="mb-3">
        <select name="category_id" class="form-control">

            <option value="" selected disabled>Selected Category</option>

            @foreach ($categories as $category )
            <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}} >{{$category->name}}</option>

            @endforeach

                  </select>
      </div>

      <div class="mb-3">
      <select name="client_id" class="form-control" >

      <option value="" selected disabled>Selected Client</option>
      @foreach ($clients as $client)
      <option value="{{$client->id}}" {{$product->client_id == $client->id ? 'selected' : '' }} >{{$client->name}}</option>

      @endforeach



      </select>

      </div>










       <button class="btn btn-warning px-5">update</button>





    </form>





        </div>
    </div>
</div>





@endsection
