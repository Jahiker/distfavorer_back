<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">
          @isset($product)
            <strong>Edicion de prodcuto</strong>
          @else
            <strong>Crear nuevo producto</strong>
          @endisset
      </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="@isset($product) {{route('products.update', ['product' => $product])}} @else {{route('products.store')}} @endisset" enctype="multipart/form-data">

        @isset($product)
            @method('PUT')
        @endisset

        @csrf

      <div class="card-body">

        <div class="form-group">

            <label for="name">Nombre</label>

            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"   placeholder="Nombre del producto" value="@isset($product) {{$product->name}} @else {{old('name')}} @endisset">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">

            <label for="code">Codigo</label>

            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" value="@isset($product) {{$product->code}} @else {{old('code')}} @endisset" placeholder="Codigo de producto">

            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">

          <label for="description">Descripcion</label>

          <textarea type="text" class="form-control @error('name') is-invalid @enderror" name="description" id="description" placeholder="Descripcion">@isset($product) {{$product->description}} @else {{old('description')}} @endisset</textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">

            <label for="category">Categoria</label>

            <select type="text" class="form-control @error('name') is-invalid @enderror" name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if(isset($product) && $product->category_id == $category->id) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>

            @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">

            <label for="brand">Marca</label>

            <select type="text" class="form-control @error('name') is-invalid @enderror" name="brand" id="brand">
                @foreach ($brands as $brand)
                <option value="{{$brand->id}}" @if(isset($product) && $product->brand_id == $brand->id) selected @endif>{{$brand->name}}</option>
                @endforeach
            </select>

            @error('brand')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">

            <label for="status">Disponibilidad</label>

            <div class="form-check">
              <input type="radio" name="status" value="1"
                @if ((isset($product) && $product->status == 1) || !isset($product))
                    checked
                @endif
              >
              <label class="form-check-label">Si</label>
            </div>

            <div class="form-check">
              <input type="radio" name="status" value="0"
                @if (isset($product) && $product->status == 0)
                    checked
                @endif
              >
              <label class="form-check-label">No</label>
            </div>

        </div>

        <div class="form-group">

            <label for="favorite">Destacado</label>

            <div class="form-check">
              <input type="radio" name="favorite" value="1"
                @if (isset($product) && $product->favorite == 1)
                    checked
                @endif
              >
              <label class="form-check-label">Si</label>
            </div>

            <div class="form-check">
              <input type="radio" name="favorite" value="0"
                @if ((isset($product) && $product->favorite == 0) || !isset($product))
                    checked
                @endif
              >
              <label class="form-check-label">No</label>
            </div>

        </div>

        @isset($product)
            <img src="{{$product->image}}" width="100px" class="img-thumbnail"  alt="">
        @endisset

        <div class="form-group">

            <label for="image">Imagen</label>

            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

      </div>
      <!-- /.card-body -->
      <hr>

      <div class="card-footer">
        <button type="submit" class="btn btn-info btn-lg float-right">Guardar</button>
      </div>
    </form>
  </div>
