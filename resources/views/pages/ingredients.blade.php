@extends('layouts.master')

@section('content')
<div class="container">

    <table class="table table-dark table-striped">
        <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Name</th>
              <th scope="col">Cena</th>
              <th scope="col">Kalo</th>
              <th scope="col">Jedinica mere</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($ingredients as $ingredient )
              <tr>
                <th scope="row">{{$ingredient->id}}</th>
                <td>{{$ingredient->name}}</td>
                <td>{{$ingredient->cena}}</td>
                <td>{{$ingredient->kalo}}</td>
                <td>{{$ingredient->jm}}</td>
              </tr>                  
              @endforeach
          </tbody>        
    </table>
</div>
@endsection