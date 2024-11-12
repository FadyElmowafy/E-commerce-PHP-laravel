@extends("admin.layout")

@section('body')
<h3>Show Product</h3>
Prodcut Name: {{$product->name}} <br>
Prodcut Price: {{$product->price}} EGP <br>
Prodcut Quantity: {{$product->quantity}} <br>
Prodcut Desc: {{$product->desc}} <br>
Prodcut Image: <img src="{{asset("storage/$product->image")}}" width="200px"  alt="">


@endsection