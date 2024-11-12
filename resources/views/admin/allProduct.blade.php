@extends("admin.layout")



@section('body')

@if (session()->has("message_success"))
  <div class="alert alert-success">{{session()->get("message_success")}}</div>
  @endif

  @if (session()->has("message_delete"))
  <div class="alert alert-success">{{session()->get("message_delete")}}</div>
  @endif

  @if (session()->has("message_update"))
  <div class="alert alert-success">{{session()->get("message_update")}}</div>    
  @endif

<table class="table">
    <thead>
      <tr>
        <th> Product Name </th>
        <th> Product Price </th>
        <th> Product Quantity </th>
        <th> Product Image </th>
        <th> Actions </th>
      </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
      <tr>
        <td> {{$product->name}} </td>
        <td> {{$product->price}}</td>
        <td> {{$product->quantity}} </td>
        <td> <img src="{{asset("storage/$product->image")}}" alt=""></td>
        <td>  
            <a href="{{url("product/show/$product->id")}}"><div class="btn btn-info">Show</div></a>
            <a href="{{url("product/edit/$product->id")}}"><div class="btn btn-success">Edit</div></a>
            <a href="{{url("product/delete/$product->id")}}"><div class="btn btn-danger">Delete</div></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div style="display: flex; justify-content: center; align-items: center; height: 150px;">
    {{ $products->links() }}
  </div>
  @endsection