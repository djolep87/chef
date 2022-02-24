@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-10">
                <h1>User managment</h1>
            </div>
            <div class="col-2">
                <a href="/users/create" class="rn-btn " role="button"><i class="fa feather-plus"></i>Add User</a>
            </div>
        </div>
        <div class="contact-about-area">
            <table class="table table-dark table-hover">
                <thead class="contact-about-area">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Permission</th>
                        <th scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody class="contact-about-area">
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user['id']}}</th>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>
                                @if($user->roles->isNotEmpty())
                                    @foreach ($user->roles as $role )
                                        <span class="badge badge-secondary">
                                            {{$role->name}}
                                        </span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if($user->permissions->isNotEmpty())
                                    @foreach ($user->permissions as $permission )
                                        <span class="badge badge-secondary">
                                            {{$permission->name}}
                                        </span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="/users/{{$user['id']}}"><i class="fa feather-eye"></i></a>
                                <a href="/users/{{$user['id']}}/edit"><i class="fa feather-edit-3"></i></a>
                                <form action="/users/{{$user->id}}" onsubmit="return confirm('{{ trans('Are you sure to delete this user?') }}');" method="POST">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <button type="submit"><i class="fas feather-trash-2"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>       
    </div>

    @section('script')
        
    @endsection
@endsection