{{ bladeErrorMessage() }}
<div class="row">
    <div class="col-md-4 mb-3 text-white">
        <label for="name" class="form-label fw-bold">Name or Purpose:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name', $thing->name) }}">
    </div>
</div>

<div class="row">
    <div class="col-md-5 mb-3 text-white">
        <label for="short" class="form-label fw-bold">Short Text:</label>
        <input type="text" class="form-control" id="short" name="short" placeholder="Enter short text" value="{{ old('short', $thing->short) }}">
    </div>
</div>

<div class="row">
    <div class="col-md-5 mb-3 text-white">
        <label for="long" class="form-label fw-bold">Long Text:</label>
        <textarea name="long" id="long" class="form-control" cols="50" rows="10" placeholder="Enter long text">{{old('long', $thing->long)}}</textarea>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3 text-white">
        <label for="file" class="form-label fw-bold">File:</label>
        @isset($thing->file)
            <div class="mb-2">
                <a class="btn btn-outline-danger" href="{{ url($thing->file) }}" target="_blank" role="button">View</a>
            </div>
        @endisset
        <input type="file" class="form-control" id="file" name="file">
    </div>
</div>
