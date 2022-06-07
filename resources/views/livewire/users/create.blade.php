<div class="modal-dialog">
    <form wire:submit.prevent="create">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('create_user') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('close') }}"></button>
            </div>
            <div class="modal-body">

                <div class="px-6">
                    @if ($errors->any())
                        <div class="border-b pb-4 text-red-700">
                            <ul class="list-disc">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>


                <div class="modal-input-section">
                    <label class="modal-label" for="email">{{ __('email') }}</label>
                    <x-input type="email" wire:model="email" name="email" :value="old('email')" placeholder="{{ __('email') }}" autocomplete="off"/>
                    {{-- <input type="email" wire:model="email" class="modal-input" name="email" placeholder="{{ __('email') }}"> --}}
                </div>

                <div class="modal-input-section">
                    <label class="modal-label" for="name">{{ __('name') }}</label>
                    <input type="text" wire:model="name" class="modal-input" name="name" placeholder="{{ __('name') }}">
                </div>

                {{-- <div class="modal-input-section">
                    <label class="modal-label" for="last_name">{{ __('last_name') }}</label>
                    <input type="text" wire:model="last_name" class="modal-input" name="last_name" placeholder="{{ __('last_name') }}">
                </div> --}}

                {{-- <div class="modal-input-section">
                    <label class="modal-label" for="title">{{ __('title') }}</label>
                    <input type="text" wire:model="title" class="modal-input" name="title" placeholder="{{ __('title') }}">
                </div> --}}

                <div class="modal-input-section">
                    <label class="modal-label" for="password">{{ __('password') }}</label>
                    <input type="password" wire:model="password" class="modal-input" name="password" placeholder="{{ __('password') }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-btn-close" data-bs-dismiss="modal">{{ __('close') }}</button>
                <button type="submit" class="modal-btn-submit">{{ __('create') }}</button>
            </div>
        </div>
    </form>
</div>
