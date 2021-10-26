@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="justify-content-center">
        @include('includes.alert')
        <div class="my-3">

            <div class="mx-auto">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-warning">
                    <h3 class="widget-user-username"><strong>{{$user->name}}</strong></h3>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{$user->avatar}}" alt="User Avatar">
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">USUARIO</h5>
                          <span class="description-text">
                              @if ($user->role == 'user')
                                  Regular
                              @else
                                  Administrador
                              @endif
                          </span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">EMAIL</h5>
                            <span class="description-text">{{$user->email}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                            <a href="{{route('users.edit', ['user' => $user])}}" class="btn btn-outline-warning">EDITAR</a>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!-- /.widget-user -->
              </div>

        </div>
    </div>
</div>
@endsection
