@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="justify-content-center">

            @include('includes.alert')

            <h1 class="text-center">Resultado de busqueda</h1>

            <div class="row">

                @if ($categories->total() == 0)
                    <h3 class="text-center col-12 mt-5 text-danger">No se encontraron resultados</h3>
                @endif

                @foreach ($categories as $category)

                    <div class="p-2 col-12">

                        <div class="card card-outline card-success">
                            <div class="card-header">
                            <h3 class="card-title"><a href="{{ route('categories.show', ['category' => $category]) }}"><strong class="text-dark">{{$category->name}}</strong></a></h3>

                            <div class="card-tools">

                                <form action="{{route('categories.destroy', ['category' => $category])}}" method="POST" onsubmit="return confirm('Desea Eliminar la Categoria {{$category->name}}?\nuna vez confirmada la acción no se podrá revertir')">
                                    @method('delete')
                                    @csrf

                                    <a type="button" href="{{route('categories.edit', ['category' => $category])}}" class="btn btn-tool text-primary"><i class="fas fa-edit"></i></a>

                                    <button type="submit" class="btn btn-tool text-danger" ><i class="fas fa-trash-alt"></i></button>

                                </form>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <img class="bg-success" src="{{$category->icon}}" height="60px" alt="">
                            <span class="info-box-text ml-2">{{$category->description}}</span>
                        </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                @endforeach

                <div class="mx-auto text-center">
                    {{$categories->links()}}
                </div>

            <div/>
        </div>
    </div>
@endsection
