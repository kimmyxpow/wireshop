<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Checkout') }}</div>

                <div class="card-body">
                    @if ($formCheckout)
                        <form method="post" action="#" wire:submit.prevent="checkout">
                            <div class="row mb-3">
                                <div class="col">
                                    <input wire:model="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name...">
                                    @error('first_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input wire:model="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name...">
                                    @error('last_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email...">
                                    @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input wire:model="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone...">
                                    @error('phone')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <textarea wire:model="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address..."></textarea>
                                    @error('address')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <input wire:model="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City...">
                                    @error('city')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input wire:model="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Postal Code...">
                                    @error('postal_code')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-sm btn-primary">Submit</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>