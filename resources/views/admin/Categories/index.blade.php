@extends('admin.layouts.master')
@section('content')


<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-12">
        <h1>All Category</h1>

        @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif

        <table class="table">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>

@foreach ($categories as $category )


<tr>

    <td>{{$category->id}}</td>
    <td>{{$category->name}}</td>
    <td>{{$category->created_at->format('d - m - y')}}</td>
    <td>
  <a class="btn btn-sm btn-primary" href="{{route('categories.edit',$category->id)}}"><i class="fas fa-edit"></i></a>

    <form class="d-inline" action="{{route('categories.destroy', $category->id)}}" method="post">

    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')"><i class="fas fa-times"></i></button>

    </form>

    </td>


    </tr>

@endforeach


</table>
{{$categories->links()}}





        </div>
    </div>
</div>






















@endsection
