@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
<div class="row justify-content">
    <div class="col-12">
        <h1>Add Product</h1>
        @include('admin.layouts.error')

        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>

         <div class="mb-3">
             <textarea name="content" rows="30" class="form-control" placeholder="Content" ></textarea>
         </div>
          <div class="mb-3">
              <label for="a"> Image</label>
           <input type="file" name="image" id="a" class="form-control" placeholder="Image">
          </div>

          <div class="mb-3">
            <input type="text" name="price" class="form-control" placeholder="Price">
          </div>

          <div class="mb-3">

            <select name="category_id" class="form-control">

                <option value="" selected disabled>Selected Category</option>
                @foreach ($categories as $category )

                <option value="{{$category->id}}">{{$category->name}}</option>

                @endforeach




            </select>

          </div>


<div class="mb-3">
<select name="client_id" class="form-control" >

<option value="" selected disabled> Selected Client</option>
@foreach ($clients as $client )

<option value="{{$client->id}}">{{$client->name}}</option>

@endforeach

</select>
</div>

        <button class="btn btn-info px-5">Add</button>

        </form>
    </div>
</div>

</div>




@endsection
