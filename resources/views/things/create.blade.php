@extends('layouts.app')

@section('content')
<div class="p-5">
    <div class="py-12 px-3">
        <form method="POST" enctype="multipart/form-data" id="thing-form" action="{{ route('thing.store') }}">
            @include('things.form')
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
