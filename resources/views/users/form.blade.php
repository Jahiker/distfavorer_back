<div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">
          @isset($user)
            <strong>Edicion de usuario</strong>
          @else
            <strong>Crear nuevo usuario</strong>
          @endisset
      </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="@isset($user) {{route('users.update', ['user' => $user])}} @else {{route('users.store')}} @endisset" enctype="multipart/form-data">

        @isset($user)
            @method('PUT')
        @endisset

        @csrf

      <div class="card-body">

        <div class="form-group">

            <label for="name">Nombre</label>

            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
            placeholder="Nombre de usuario" value="@isset($user) {{$user->name}} @else {{old('name')}} @endisset">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">

          <label for="description">Email</label>

          <textarea type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="user@ejemplo.com">@isset($user) {{$user->email}} @else {{old('email')}} @endisset</textarea>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">

            <label for="password">Contraseña</label>

            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Contraseña">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">

            <label for="confirm">Confirmar contraseña</label>

            <input type="password" class="form-control @error('confirm') is-invalid @enderror" name="confirm" id="confirm" placeholder="Confirmar contraseña">

            @error('confirm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        @isset($user)
            <img src="{{$user->avatar}}" width="100px" class="img-thumbnail"  alt="">
        @endisset

        <div class="form-group">

            <label for="avatar">Avatar</label>

            <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" id="avatar">
                @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

      </div>
      <!-- /.card-body -->
      <hr>

      <div class="card-footer">
        <button type="submit" class="btn btn-warning btn-lg float-right">Guardar</button>
      </div>
    </form>
  </div>
