@extends('layouts.admin')
@section('content')
    <section class="container-fluid">
        <div class="my-5">
            <h3 class="my-4 d-inline">Employee Edit</h3>
            <a href="{{ route('backend.employees.index') }}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <div class="col-md-4 offset-md-4 card card-body pt-4">
            <form action="{{ route('backend.employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" value="{{ $employee->name }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <span class="text-danger">*</span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="email" value="{{ $employee->email }}">
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <span class="text-danger">*</span>
                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                        id="date_of_birth" name="date_of_birth" value="{{ $employee->date_of_birth }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        name="phone" value="{{ $employee->phone }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <span class="text-danger">*</span>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ $employee->address }}</textarea>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </section>
@endsection
