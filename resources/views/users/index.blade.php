@extends('layouts.master')

@section('title', 'Users')

@section('content')

<div class="container-fluid">
    <div class="col-md-12 px-4">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('users.create') }}" class="btn btn-success">Add New Client</a>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Clients</h3>
            </div>
            <div class="card-body">
                <table id="table" class="table text-center table-hover">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>email</th>
                            <th>National ID</th>
                            <th>profile Img</th>
                            @role('admin')
                            <th>City</th>
                            @endrole
                            @role('admin|cityManager')
                            <th>Gym</th>
                            @endrole
                            <th>Controllers</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->national_id }}</th>
                            <th><img src="{{ url('imgs/users/' . $user->profile_img) }} " width="50px" height="50px" alt="not found" /></th>
                            @role('admin')
                            <td>{{ $user->gym->city ? $user->gym->city->name : 'Not Found !' }}</td>
                            @endrole
                            @role('admin|cityManager')
                            <td>{{ $user->gym ? $user->gym->name : 'Not Found !' }}</td>
                            @endrole
                            <th class="d-flex justify-content-center">
                                <a href="{{ route('users.show',  $user->id) }}" class="btn btn-md btn-info mr-2"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-md btn-warning"><i class="fas fa-edit"></i></a>
                                <form class="col-md-4" action="{{ route('users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-md btn-danger show-alert-delete-box" data-toggle="tooltip" title='Delete'><i class="fas fa-times"></i></button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>

@include('layouts.alertScript')
@stop