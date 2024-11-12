@extends("admin.layout")

@section('body')
<form action="{{url("product/create")}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Product Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name">
    @error('name')
      <div class="alert alert-danger">{{$message}}</div>
    @enderror
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <input type="text" name="desc" class="form-control" id="exampleInputPassword1" placeholder="Description">
      @error('desc')
        <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Product Price</label>
      <input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price">
      @error('price')
        <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Product Quantity</label>
      <input type="number" name="quantity" class="form-control" id="exampleInputPassword1" placeholder="Quantity">
      @error('quantity')
        <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Category</label>
      <select name="category_id" id="">
        <option value="ex" disabled hidden selected>-- Select --</option>
        @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
      @error('category_id')
        <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    
    <div class="form-group">
      <label for="exampleInputPassword1">Product Image</label>
      <input type="file" name="image" class="form-control" id="exampleInputPassword1" >
      @error('image')
        <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection