@extends('layouts.app')

@section('title', 'Add Course')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Add New Course</h2>
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Course Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="instructor" class="form-label">Instructor</label>
                    <input type="text" class="form-control @error('instructor') is-invalid @enderror" id="instructor" name="instructor" value="{{ old('instructor') }}" required>
                    @error('instructor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="credit_hours" class="form-label">Credit Hours</label>
                    <input type="number" class="form-control @error('credit_hours') is-invalid @enderror" id="credit_hours" name="credit_hours" value="{{ old('credit_hours') }}" required min="1">
                    @error('credit_hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="text" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ old('semester') }}" required>
                    @error('semester')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add Course</button>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
