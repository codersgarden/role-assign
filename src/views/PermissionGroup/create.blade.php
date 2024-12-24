@extends('roleassign::layouts.app')

@section('content')
    <div class="content bg-color">
        <div class="d-flex justify-content-between align-items-center ms-5 me-5">
            <p class="title pt-3">Create Permission Group</p>
            <a href="{{ route('permission-groups.index') }}" class=" br-11 new_roles btn btn-dark">Back</a>
        </div>
    </div>


    <div class="container mt-5">

        <form action="{{ route('permission-groups.store') }}" method="post" class="w-50 mx-auto p-4 rounded">
            @csrf
            <div class="mb-3">
                <label for="role" class="form-label">Permission Group</label>
                <input type="text" id="Permission Group" name="name" placeholder="Enter Permission Group"
                    class="form-control" required>

                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>

        </form>
    </div>
@endsection
