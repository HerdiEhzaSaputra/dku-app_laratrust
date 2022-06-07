<div class="modal-dialog">
    <form wire:submit.prevent="edit">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('edit_user') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="modal-input-section">
                    <label class="modal-label" for="email">{{ __('email') }}</label>
                    <input type="email" wire:model="email" class="modal-input @error('email') is-invalid @enderror" name="email" placeholder="{{ __('email') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-input-section">
                    <label class="modal-label" for="first_name">{{ __('first_name') }}</label>
                    <input type="text" wire:model="first_name" class="modal-input @error('first_name') is-invalid @enderror" name="first_name" placeholder="{{ __('first_name') }}">
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-input-section">
                    <label class="modal-label" for="last_name">{{ __('last_name') }}</label>
                    <input type="text" wire:model="last_name" class="modal-input @error('last_name') is-invalid @enderror" name="last_name" placeholder="{{ __('last_name') }}">
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-input-section">
                    <label class="modal-label" for="title">{{ __('title') }}</label>
                    <input type="text" wire:model="title" class="modal-input @error('title') is-invalid @enderror" name="title" placeholder="{{ __('title') }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-input-section">
                    <label class="modal-label" for="password">{{ __('password') }}</label>
                    <input type="password" wire:model="password" class="modal-input @error('password') is-invalid @enderror" name="password" placeholder="{{ __('password') }}">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-btn-close" data-bs-dismiss="modal">{{ __('close') }}</button>
                <button type="submit" class="modal-btn-submit">{{ __('edit') }}</button>
            </div>
        </div>
    </form>
</div>
