@extends('product.base')
@section('title', 'products')
@section('content')

 <div class="d-flex justify-content-between align-items-center">
<div class="col-lg-4">
    <div class="position-relative-center">

        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-center" style="color: red" >Product List</h1>
                    <a href="{{route('product.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>

</div>
        <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Price</th>

            </tr>
        </thead>
         </div>
        <tbody>
            @forelse ($products as $prouduct)
                <tr>
                    <th>{{ $prouduct->id }}</th>
                    <th>{{ $prouduct->name }}</th>
                    <th>{{ $prouduct->description }}</th>
                    <th>{{($prouduct->quantity) }}</th>
                    <th><img width="100px" src="{{asset($prouduct->image)}}" alt=""> </th>
                     <th>{{ $prouduct->price }}DH</th>

                     <th>
                        <div class="btn-group">
                            <a href="{{route('product.edit',$prouduct->id)}}" class="btn-primary">Update</a>
                        <form method="post" action="{{route('product.destroy',$prouduct->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="delete">
                        </form>

                        </div>
                     </th>

                </tr>
            @empty
                <tr>
                    <td colspan="6" align ="center">
                        <h6>no products</h6>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
