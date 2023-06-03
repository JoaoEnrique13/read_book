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

                {{$admins}}
                    {{-- @foreach($admins as $admin)
                    <tr>
                        <td>{{  $admin->id  }} </td>
                        <td>{{  $admin->name  }} </td>
                        <td>{{  $admin->email  }} </td>
                        <td>
                            <a href="/delete/user/{{$admin->id}}" class="btn btn-danger">Excluir</a> 
                        </td>
                    </tr>
                    @endforeach --}}
                <tr>
            </tbody>
        </table>
    </div>
@endsection
                