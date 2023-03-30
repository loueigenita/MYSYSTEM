@extends('layouts.admin')

@section('content')

@include('user.modal-create')


<div class="container mt-2">
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h1 class="card-title">USERS</h1>
                    </div>
                    <div class="col-4 text-right">
                        <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createUserModal"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-full-width table-responsive">
                    <table class="table table-striped shadow text-center">
                        <thead class=" bg-dark text-light">
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            {{-- <th scope="col">User Type</th> --}}
                            <th scope="col">Creation Date</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                    {{-- <td>{{ $user->user_type }}</td> --}}
                                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</td>
                                    <td>
                                  
                                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUserModal" role="button">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="deleteUser({{ $user->id }})" type="button" data-placement="bottom" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                
                                        </form>
                                        
                                   
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('user.modal-edit')
<script>
    function deleteUser(id){
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed'
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
            })
    }
</script>


@endsection