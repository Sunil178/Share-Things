@extends('layouts.app')

@section('content')
<div class="p-5">
    <div class="py-12 px-3 text-muted">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label text-dark fw-bold">Name or Purpose:</label>
                <p>{{ $thing->name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label text-dark fw-bold">Short Text:</label>
                <p>{{ $thing->short }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label text-dark fw-bold">Long Text:</label>
                <p>{{ $thing->long }}</p>
            </div>
        </div>
        @isset($thing->file)
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label text-dark fw-bold">File:</label>
                    <p>
                        <a class="btn btn-outline-danger" href="{{ url($thing->file) }}" target="_blank" role="button">View</a>
                    </p>
                </div>
            </div>
        @endisset
    </div>
</div>
@endsection
