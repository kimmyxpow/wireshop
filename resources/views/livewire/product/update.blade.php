<div class="row justify-content-center mb-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col">
                            <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title...">
                            @error('title')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <input wire:model="price" type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Price...">
                            @error('price')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input wire:model="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Description">
                            @error('description')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input wire:model="image" type="file" class="form-control" id="image">
                        @error('image')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" alt="{{ $title }}" class="w-100 mb-3">
                    @else
                        <img src="{{ $imageOld }}" alt="{{ $title }}" class="w-100 mb-3">
                    @endif

                    <div class="btn-group" role="group" aria-label="Button Form">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        <button wire:click="$emit('formClose')" type="button" class="btn btn-sm btn-secondary">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>