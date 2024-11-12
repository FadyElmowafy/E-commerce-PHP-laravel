@extends("admin.layout")

@section('body')
<form action="{{url("product/edit")}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Product Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->name}}">
      @error('name')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <input type="text" name="desc" class="form-control" id="exampleInputPassword1" value="{{$product->desc}}">
      @error('desc')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Product Price</label>
      <input type="number" name="price" class="form-control" id="exampleInputPassword1" value="{{$product->price}}">
      @error('price')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Product Quantity</label>
      <input type="number" name="quantity" class="form-control" id="exampleInputPassword1" value="{{$product->quantity}}">
      @error('quantity')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Category</label>
      <select name="category_id" id="">
        <option value="{{$product_category->id}}"hidden selected>{{$product_category->name}}</option>
        @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Product Image</label>
      <img src="{{asset("storage/$product->image")}}" alt="">
      <input type="file" name="newimage" class="form-control" id="exampleInputPassword1" >
      <input type="hidden" name='oldimage' value ="{{$product->image}}">
    </div>

    <input type="hidden" value="{{$product->id}}" name="product_id">

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection