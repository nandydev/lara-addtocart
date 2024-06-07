@extends('shop')
    
@section('content')
     
<div class="row">
    @foreach($books as $book)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                <img src="{{ asset($book->image) }}" class="card-img-top" alt="{{ $book->name }}">
                    <h5 class="card-title">{{ $book->name }}</h5>
                    <p class="card-text">{{ $book->author }}</p>
                    <p class="card-text"><strong>Price: </strong> ${{ $book->price }}</p>
                    <a href="{{ route('addbook.to.cart', $book->id) }}" class="btn btn-outline-danger">Add to cart</a>
                </div>
            </div>
        </div>
    @endforeach
</div>


<!--      
<div class="row">
    @foreach($books as $book)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <img src="{{ asset('images') }}/{{ $book->image }}" class="card-img-top"/>
                <div class="card-body">
                    <h4 class="card-title">{{ $book->name }}</h4>
                    <p>{{ $book->author }}</p>
                    <p class="card-text"><strong>Price: </strong> ${{ $book->price }}</p>
                    <p class="btn-holder"><a href="{{ route('addbook.to.cart', $book->id) }}" class="btn btn-outline-danger">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div> -->
     
@endsection