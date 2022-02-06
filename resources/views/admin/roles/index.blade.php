@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-10">
                <h1>Roles</h1>
            </div>
            <div class="col-2">
                <a href="/roles/create" class="rn-btn " role="button"><i class="fa feather-plus"></i>Add role</a>
            </div>
        </div>

        <div class="contact-about-area">
            <table class="table table-dark table-hover">
                <thead class="contact-about-area">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Role</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Permission</th>
                        <th scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody class="contact-about-area">
                    @if(count($roles) > 0)
                        @foreach ($roles as $role)
                            <tr>
                                <th scope="row">{{$role['id']}}</th>
                                <td>{{$role['name']}}</td>
                                <td>{{$role['slug']}}</td>
                                <td>
                                    @if ($role->permissions != null)
                                        @foreach ($role->permissions as $permission )
                                        <span class="badge badge-secondary">
                                            {{$permission->name}}
                                        </span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a href="/roles/{{$role['id']}}"><i class="fa feather-eye"></i></a>
                                    <a href="/roles/{{$role['id']}}/edit"><i class="fa feather-edit-3"></i></a>
                                    <form action="/roles/{{$role->id}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button type="submit"><i class="fas feather-trash-2"></i></button>
                                    </form>
                                    {{-- <a href="/roles/{{$role->id}}" data-toggle="modal" data-target="#deleteModal" data-roleid="{{$role->id}}"><i class="fas feather-trash-2"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                        
                    @else
                        <p>No roles</p>
                    @endif
                </tbody>
            </table>
          
    </div>

    @section('script')
        
    @endsection
@endsection