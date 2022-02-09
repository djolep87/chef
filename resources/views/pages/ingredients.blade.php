@extends('layouts.master')

@section('content')
<div class="container">
  <div class="contact-about-area">
    <table class="table table-dark table-hover">
        <thead class="contact-about-area">
            <tr>
              <th scope="col">id</th>
              <th scope="col">Name</th>
              <th scope="col">Cena</th>
              <th scope="col">Kalo</th>
              <th scope="col">Jedinica mere</th>
            </tr>
          </thead>
          <tbody class="contact-about-area">
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
</div>
@endsection