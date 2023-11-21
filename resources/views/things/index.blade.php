@extends('layouts.app')

@section('content')
<div class="p-5">
    {{ bladeSuccessMessage() }}
    {{ bladeErrorMessage() }}
    <table class="table table-success table-striped-columns text-center">
        <thead>
            <th>Sr. No.</th>
            <th>Name</th>
            <th>Short</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($things as $thing)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $thing->name }}</td>
                <td>{{ $thing->short }}</td>
                <td>
                    <a class="btn btn-outline-primary btn-sm mx-1" href="{{ route('thing.show', [ 'id' => $thing->id ]) }}" role="button">View</a>
                    <a class="btn btn-outline-dark btn-sm mx-1" href="{{ route('thing.edit', [ 'id' => $thing->id ]) }}" role="button">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
