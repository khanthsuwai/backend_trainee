@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="my-5">
            <h3 class="my-4 d-inline">Employees</h3>
            <a href="{{ route('backend.employees.create') }}" class="btn btn-primary float-end">Add Employee</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example For Employees
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="employee_tbody">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->date_of_birth }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>
                                    <a href="{{ route('backend.employees.edit', $employee->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <button class="btn btn-sm btn-danger delete" type="button"
                                        data-id="{{ $employee->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Delete Modal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="" method="POST" id="deleteForm">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#employee_tbody').on('click', '.delete', function() {
                let id = $(this).data('id');
                // console.log(id);
                $('#deleteForm').prop('action', 'employees/' + id);
                $('#deleteModal').modal('show');
            })
        });
    </script>
@endsection
