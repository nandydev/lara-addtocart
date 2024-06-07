@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Products</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3 float-right">Add New Product</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                <td><img src="{{ asset($book->image) }}" alt="{{ $book->name }}" width="50"></td>
                <td>
                    <a href="{{ route('admin.products.edit', $book->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('admin.products.destroy', $book->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
