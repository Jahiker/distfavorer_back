@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="justify-content-center">

            @include('includes.alert')

            <div class="row">

                <div class="col-12 mb-3">
                    <a href="{{route('users.create')}}" class="btn btn-warning float-right mr-2">Crear Usuario</a>
                </div>

                @if ($users->total() == 0)
                    <h3 class="text-center col-12 mt-5 text-danger">No hay usuarios registrados</h3>
                @endif

                @foreach ($users as $user)

                    <div class="p-2 col-12">

                        <div class="card card-outline card-warning">
                            <div class="card-header">
                            <h3 class="card-title"><a href="{{ route('users.show', ['user' => $user]) }}"><strong class="text-dark">{{$user->name}}</strong></a></h3>

                            <div class="card-tools">

                                <form action="{{route('users.destroy', ['user' => $user])}}" method="POST" onsubmit="return confirm('Desea Eliminar el usuario {{$user->name}}?\nuna vez confirmada la acción no se podrá revertir')">
                                    @method('delete')
                                    @csrf

                                    <a type="button" href="{{route('users.edit', ['user' => $user])}}" class="btn btn-tool text-primary"><i class="fas fa-edit"></i></a>

                                    <button type="submit" class="btn btn-tool text-danger" ><i class="fas fa-trash-alt"></i></button>

                                </form>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <i class="fas fa-inbox"></i>
                            <span class="info-box-text ml-2">{{$user->email}}</span>
                        </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                @endforeach

                <div class="mx-auto text-center">
                    {{$users->links()}}
                </div>

            <div/>
        </div>
    </div>
@endsection
