<div>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>
    <div class="flex justify-end">
        <a href="{{ route('users.create') }}">
            <button type="button" class="text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#2557D6]/50 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ __('dku.create_user') }}
            </button>
        </a>
    </div>
    <x-slot name="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route('users.index') }}">{{ __('users') }}</a></li>
        </ol>
    </x-slot>

    <div id="content">
        <div class="flex-auto py-4">
            <div class="md:flex flex-row justify-between">
                <div class="text-grey-700 dark:text-gray-300">
                    <div class="flex mt-1">
                        <p class="w-full mt-1">
                            {{ __('per page') }} :
                        </p>
                        <div class="relative inline-flex align-middle py-1 px-2 text-sm leading-tight w-full">
                            <button type="button" wire:click="setPerPage(10)"
                                class="btn-paginate @if ($perPage == 10) btn-paginate-active @endif">10</button>
                            <button type="button" wire:click="setPerPage(15)"
                                class="btn-paginate @if ($perPage == 15) btn-paginate-active @endif">15</button>
                            <button type="button" wire:click="setPerPage(20)"
                                class="btn-paginate @if ($perPage == 20) btn-paginate-active @endif">20</button>
                            <button type="button" wire:click="setPerPage(25)"
                                class="btn-paginate @if ($perPage == 25) btn-paginate-active @endif">25</button>
                        </div>
                    </div>
                </div>
                <div class="md:flex flex-row md:space-x-2">
                    <div class="inline-flex mt-1 h-[41px] py-[0.3px] rounded-md" role="group">
                        <button type="button" wire:click="deleteSelected" class="inline-flex items-center px-2 text-sm font-medium text-gray-900 bg-gray-50 rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-1 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            {{ __('dku.delete') }} ({{ count($selectedUsers) }})
                        </button>
                        <button type="button" wire:click="exportSelectedQuery" class="inline-flex items-center px-2 text-sm font-medium text-gray-900 bg-gray-50 rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-1 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-4 h-4 fill-current" viewBox="0 0 384 512"><path d="M224 128L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V160h-127.1C238.3 160 224 145.7 224 128zM272.1 264.4L224 344l48.99 79.61C279.6 434.3 271.9 448 259.4 448h-26.43c-5.557 0-10.71-2.883-13.63-7.617L192 396l-27.31 44.38C161.8 445.1 156.6 448 151.1 448H124.6c-12.52 0-20.19-13.73-13.63-24.39L160 344L111 264.4C104.4 253.7 112.1 240 124.6 240h26.43c5.557 0 10.71 2.883 13.63 7.613L192 292l27.31-44.39C222.2 242.9 227.4 240 232.9 240h26.43C271.9 240 279.6 253.7 272.1 264.4zM256 0v128h128L256 0z"/></svg>
                            {{ __('dku.export') }} ({{ count($selectedUsers) }})
                        </button>
                    </div>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input wire:model="search" type="text" id="table-search" placeholder="Search for User" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @if ($search)
                            <div class="absolute inset-y-0 right-0 flex items-center pl-3">
                                <span class="cursor-pointer z-10 h-full leading-snug font-normal absolute text-center text-gray-400 hover:text-red-600 focus:outline-none bg-transparent rounded right-0 text-base items-center justify-center w-8 pr-3 py-2"
                                    href="#clear" wire:click="clear" data-bs-toggle="tooltip" data-bs-original-title="Clear search">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 my-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="cursor-pointer">
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input name="selectAll" wire:model="selectAll" id="checkbox-all" type="checkbox" class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" wire:click="sortByColumn('name')">
                            <div class="flex items-center">
                                {{ __('dku.name') }}
                                @if ($sortColumn == 'name')
                                    <span>
                                        @if ($sortDirection == 'asc')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </span>
                                @endif
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" wire:click="sortByColumn('email')">
                            <div class="flex items-center">
                                {{ __('dku.email') }} & No Hp
                                @if ($sortColumn == 'email')
                                    <span>
                                        @if ($sortDirection == 'asc')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </span>
                                @endif
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" wire:click="sortByColumn('created_at')">
                            <div class="flex items-center">
                                {{ __('dku.created_at') }}
                                @if ($sortColumn == 'created_at')
                                    <span>
                                        @if ($sortDirection == 'asc')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </span>
                                @endif
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input value="{{ $user->id }}" name="selectedUsers" wire:model="selectedUsers" id="checkbox-table-1" type="checkbox" class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            {{-- <td class="w-4 p-4 text-center">
                                {{ $user->id }}
                            </td> --}}
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <div class="d-flex py-1 align-items-center">
                                    <span class="avatar me-2"
                                        style="background-image: url({{ $user->gravatar }})"></span>
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $user->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <div class="d-flex py-1 align-items-center">
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $user->email }}</div>
                                        <div class="text-muted">{{ $user->no_hp }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td class="px-6 py-4 text-center">
                                    <button
                                        onclick="Livewire.emit('showModal', 'user.roles', '{{ json_encode($user->id) }}')"
                                        class="p-0.5 rounded-sm text-gray-100 bg-gray-400 hover:bg-gray-500">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                        </svg>
                                    </button>
                                {{-- @endrole --}}
                                {{-- @role('superadministrator') --}}
                                    <button
                                        onclick="Livewire.emit('showModal', 'user.permissions', '{{ json_encode($user->id) }}')"
                                        class="p-0.5 rounded-sm text-yellow-100 bg-yellow-400 hover:bg-yellow-500">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/lock-access -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                                            <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                                            <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                                            <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                                            <rect x="8" y="11" width="8" height="5" rx="1" />
                                            <path d="M10 11v-2a2 2 0 1 1 4 0v2" />
                                        </svg>
                                    </button>
                                {{-- @endrole --}}
                                {{-- @role('superadministrator') --}}
                                    <button
                                        onclick="Livewire.emit('showModal', 'user.edit', '{{ json_encode($user->id) }}')"
                                        class="p-0.5 rounded-sm text-blue-100 bg-blue-400 hover:bg-blue-500">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                            <line x1="16" y1="5" x2="19" y2="8" />
                                        </svg>
                                    </button>
                                {{-- @endrole --}}
                                {{-- @role('superadministrator') --}}
                                    <button wire:click="deleteId({{ $user->id }})" data-modal-toggle="deleteConfirmModal"
                                        class="p-0.5 rounded-sm text-red-100 bg-red-400 hover:bg-red-500">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/trash -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="4" y1="7" x2="20" y2="7" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                {{-- @endrole --}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="py-3 bg-grey-500er border-t-1 border-grey-500 d-flex justify-content-between">
            <div class="dark:text-gray-200">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self id="deleteConfirmModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="deleteConfirmModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                    <button wire:click.prevent="delete()" data-modal-toggle="deleteConfirmModal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-toggle="deleteConfirmModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </div>
        </div>
    </div>

</div>
