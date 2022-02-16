@extends('admin.layouts.master')
@section('content')


<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-12">
        <h1>Update Category</h1>
        @include('admin.layouts.error')

            <form action="{{route('categories.update',$category->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">

                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{$category->name}}" >

                </div>

                <button class="btn btn-warning px-5">Update</button>





                </form>


        </div>
    </div>
</div>






















@endsection
