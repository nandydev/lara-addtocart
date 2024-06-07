<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage; // Import Storage facade

 
class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('products', compact('books'));
    }
   
    //start
    public function list()
    {
        $books = Book::all();
        return view('admin.products', compact('books'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/images');
        $book = new Book([
            'name' => $request->name,
            'author' => $request->author,
            'price' => $request->price,
            'image' => Storage::url($imagePath), 
        ]);

        $book->save();

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation if needed
        ]);

        $book = Book::findOrFail($id);

        $book->name = $request->name;
        $book->author = $request->author;
        $book->price = $request->price;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $book->image = str_replace('public/', 'storage/', $imagePath);
        }

        $book->save();

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }
    //end

    public function about()
    {
       
        return view('about');
    }

    public function contact()
    {
       
        return view('conntact');
    }

    public function bookCart()
    {
        return view('cart');
    }
    public function addBooktoCart($id)
    {
        $book = Book::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $book->name,
                "quantity" => 1,
                "price" => $book->price,
                "image" => $book->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Book has been added to cart!');
    }
     
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Book added to cart.');
        }
    }
   
    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Book successfully deleted.');
        }
    }
}