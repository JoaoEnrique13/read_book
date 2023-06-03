@extends('layouts.main')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                {{$users}}
                    @foreach($users as $user)
                    <tr>
                        <td>{{  $user->id  }} </td>
                        <td>{{  $user->name  }} </td>
                        <td>{{  $user->email  }} </td>
                        <td>
                            <a href="/delete/user/{{$user->id}}" class="btn btn-danger">Excluir</a> 
                        </td>
                    </tr>
                    @endforeach
                <tr>
            </tbody>
        </table>
    </div>
@endsection
                