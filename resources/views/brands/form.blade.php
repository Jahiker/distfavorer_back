<div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">
          @isset($brand)
            <strong>Edicion de marca</strong>
          @else
            <strong>Crear nueva marca</strong>
          @endisset
      </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="@isset($brand) {{route('brands.update', ['brand' => $brand])}} @else {{route('brands.store')}} @endisset" enctype="multipart/form-data">

        @isset($brand)
            @method('PUT')
        @endisset

        @csrf

      <div class="card-body">

        <div class="form-group">
          <label for="name">Marca</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"   placeholder="Nombre de categoria" value="@isset($brand) {{$brand->name}} @else {{old('name')}} @endisset">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        @isset($brand)
            <img src="{{$brand->logo}}" height="100px" alt="">
        @endisset

        <div class="form-group">

            <label for="logo">Logotipo</label>

            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" id="logo">
            <span><small><strong class="text-danger">Para mantener la uniformidad del diseño, el logo de la marca debe ser un archivo de formato .png (Fondo transparente)</strong></small></span>

            @error('logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">

            <label for="favorite">Mostrar en portada</label>

            <div class="form-check">
              <input type="radio" name="show" value="1"
                @if (isset($brand) && $brand->show == 1)
                    checked
                @endif
              >
              <label class="form-check-label">Si</label>
            </div>

            <div class="form-check">
              <input type="radio" name="show" value="0"
                @if ((isset($brand) && $brand->show == 0) || !isset($brand))
                    checked
                @endif
              >
              <label class="form-check-label">No</label>
            </div>

        </div>

      </div>
      <!-- /.card-body -->
      <hr>

      <div class="card-footer">
        <button type="submit" class="btn btn-danger btn-lg float-right">Guardar</button>
      </div>
    </form>
  </div>
