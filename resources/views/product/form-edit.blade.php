
<form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="from-group">
    <label from="name">Name</label><br>
    <input type="text" name="name" class="from-control" value="{{old('name',$product->name)}}" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="from-group">
    <label from="description">Description</label><br>
    <input textarea="description" name="description" id="name" class="from-control" value="{{old('description',$product->description)}}" ></textare>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="from-group">

    <label from="quantiti">Quantiti</label><br>
    <input type="number" name="quantity" id="quantiti" class="from-control" value="{{old('quantity',$product->quantity)}}" >
    @error('quantity')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="from-group">
    <label from="name">Image</label><br>
    <input type="file" name="image" id="name" class="from-control" value="{{old('image',$product->image)}}">
    <input type="hidden" value="{{$product->image}}" name="image">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="from-group">
    <label from="price">Price</label><br>
    <input type="number"  step="0.5" name="price" id="price" class="from-control"value="{{old('price',$product->price)}}"  >
    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="from-group">
    <input type="submit" class="btn btn-primary w-100" value="Modifier" ><br>
  </div>
</form>

