@extends('admin.layouts.master')
@section('content')


<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-12">
        <h1>Add Category</h1>
        @include('admin.layouts.error')
        
            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="mb-3">

                    <input type="text" name="name" class="form-control" placeholder="Name" >

                </div>

                <button class="btn btn-info px-5">Add</button>





                </form>


        </div>
    </div>
</div>






















@endsection
