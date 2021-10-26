@extends('layouts.admin')

@section('content')
    <div class="container">

        @include('includes.alert')

        <menu-component inline-template>

            <div class="row">

                {{-- Contenido principal --}}

                <div class="col-12 col-md-6 p-2">
                    <div class="small-box bg-info">
                        <div class="inner">
                              <h3 v-text="countProducts"></h3>
                            <p>Productos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-basket"></i>
                        </div>
                        <a href="{{route('products.index')}}" class="small-box-footer">
                          Más info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-2">
                  <div class="small-box bg-success">
                      <div class="inner">
                          <h3 v-text="countCategories"></h3>
                          <p>Categorias</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-tags"></i>
                      </div>
                        <a href="{{route('categories.index')}}" class="small-box-footer">
                          Más info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                  </div>
              </div>

              <div class="col-12 col-md-6 p-2">
                  <div class="small-box bg-danger">
                      <div class="inner">
                          <h3 v-text="countBrands"></h3>
                          <p>Marcas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-trademark"></i>
                        </div>
                        <a href="{{route('brands.index')}}" class="small-box-footer">
                            Más info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-2">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 v-text="countUsers"></h3>
                            <p>Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{route('users.index')}}" class="small-box-footer">
                            Más info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

        </div>

        </menu-component>

@endsection

