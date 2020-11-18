@extends('layouts.app')
@section('content')
  <section class="container">
    <div class="row">
      <h1 class="col-8 text-center">Puntos de venta</h1>
      <div class="col-4">
        <a class="btn btn-primary float-right" href="{{route('points.create')}}" role="button">Nuevo</a>
      </div>

    </div>
    <div class="row">

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">codigo</th>
              <th scope="col">Name</th>
              <th scope="col">Mapa</th>
              <th scope="col">Editar</th>
              <th scope="col">Contacto</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($points as $point)
            <tr>
              <th scope="row">{{$point->id}}</th>
              <td>{{$point->name}}</td>
              <td>
                <a class="btn btn-success" href="https://maps.google.com/?q={{$point->latitude}},{{$point->longitude}}" role="button">Ver Ubicacion</a>
              </td>
              <td>
                <a class="btn btn-warning" href="#" role="button">Editar</a>
              </td>
              <td>
                <a class="btn btn-info" href="{{route('points.references', $point->id)}}" role="button">Contacto</a>
              </td>
            </tr>
            @empty
              <div class="alert alert-warning h5 mx-auto" role="alert">
                No hay puntos Registrados
              </div>
            @endforelse
          </tbody>
        </table>

    </div>
  </section>
@endsection
