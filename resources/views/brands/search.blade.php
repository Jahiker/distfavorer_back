@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="justify-content-center">

        @include('includes.alert')

        <h1 class="text-center">Resultado de busqueda</h1>

        <div class="row">

            @if ($brands->total() == 0)
                <h3 class="text-center col-12 mt-5 text-danger">No se encontraron resultados</h3>
            @endif

            @foreach ($brands as $brand)

                <div class="p-3 col-12">

                    <div class="card card-outline card-danger">
                        <div class="card-header">

                            <div class="card-tools">

                                <form action="{{route('brands.destroy', ['brand' => $brand])}}" method="POST" onsubmit="return confirm('Desea Eliminar la Marca {{$brand->name}}?\nuna vez confirmada la acción no se podrá revertir')">
                                    @method('delete')
                                    @csrf

                                    <a type="button" href="{{route('brands.edit', ['brand' => $brand])}}" class="btn btn-tool text-primary"><i class="fas fa-edit"></i></a>

                                    <button type="submit" class="btn btn-tool text-danger" ><i class="fas fa-trash-alt"></i></button>

                                </form>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body">
                            <img src="{{$brand->logo}}" width="40px" alt="">
                            <span class="info-box-text ml-2"><strong>{{$brand->name}}</strong></span>
                        </div>

                    </div>
                    <!-- /.card -->

                </div>

            @endforeach

            <div class="mx-auto text-center">
                {{$brands->links()}}
            </div>

        <div/>
    </div>
</div>

@endsection
