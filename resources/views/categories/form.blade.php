<div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">
          @isset($category)
            <strong>Edicion de categoria</strong>
          @else
            <strong>Crear nueva categoria</strong>
          @endisset
      </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="@isset($category) {{route('categories.update', ['category' => $category])}} @else {{route('categories.store')}} @endisset" enctype="multipart/form-data">

        @isset($category)
            @method('PUT')
        @endisset

        @csrf

      <div class="card-body">
        <div class="form-group">
          <label for="name">Categoria</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"   placeholder="Nombre de categoria" value="@isset($category) {{$category->name}} @else {{old('name')}} @endisset">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">

          <label for="description">Descripcion</label>

          <textarea type="text" class="form-control @error('name') is-invalid @enderror" name="description" id="description" placeholder="Descripcion">@isset($category) {{$category->description}} @else {{old('description')}} @endisset</textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        @isset($category)
            <img class="bg-success" src="{{$category->icon}}" height="100px" alt="">
        @endisset

        <div class="form-group">

            <label for="icon">Icon</label>

            <input type="file" class="form-control @error('icon') is-invalid @enderror" name="icon" id="icon">
            <span><small><strong class="text-danger">Para mantener la uniformidad del diseño, el icono de la categoria debe ser un archivo de formato .png (Fondo transparente) y de trazos blancos</strong></small></span>

            @error('icon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

      </div>
      <!-- /.card-body -->
      <hr>

      <div class="card-footer">
        <button type="submit" class="btn btn-success btn-lg float-right">Guardar</button>
      </div>
    </form>
  </div>
