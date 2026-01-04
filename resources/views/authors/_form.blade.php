@csrf

<div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $author->name ?? '') }}">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Country (optional)</label>
    <input name="country" class="form-control @error('country') is-invalid @enderror"
           value="{{ old('country', $author->country ?? '') }}">
    @error('country') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
