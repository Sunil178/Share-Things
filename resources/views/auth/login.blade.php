@extends('layouts.app')

@section('content')
    <div class="p-5">
        <form method="POST" action="{{ route('auth.authenticate') }}">
            <div class="mb-3 text-white w-25">
                <label for="token" class="form-label">Token</label>
                <input type="text" class="form-control" id="token" name="token" placeholder="Login token">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
