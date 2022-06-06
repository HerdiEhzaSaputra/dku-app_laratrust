@extends('laratrust::panel.layout')

@section('title', "Edit {$modelKey}")

@section('content')
  <div>
  </div>
  <div class="flex flex-col">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-32">
      <form
        method="POST"
        action="{{route('laratrust.roles-assignment.update', ['roles_assignment' => $user->getKey(), 'model' => $modelKey])}}"
        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 p-8"
      >
        @csrf
        @method('PUT')
        <label class="block">
          <span class="text-gray-700">Name</span>
          <input
            type="text"
            id="disabled-input-2" 
            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="name"
            placeholder="this-will-be-the-code-name"
            value="{{$user->name ?? 'The model doesn\'t have a `name` attribute'}}"
            readonly
            autocomplete="off"
          >
        </label>
        <span class="block text-gray-700 mt-4">Roles</span>
        <div class="flex flex-wrap justify-start mb-4">
          @foreach ($roles as $role)
            <label class="inline-flex items-center mr-6 my-2 text-sm" style="flex: 1 0 20%;">
              <input
                type="checkbox"
                @if ($role->assigned && !$role->isRemovable)
                id="green-checkbox" 
                class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                @else
                id="green-checkbox" 
                class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                @endif
                name="roles[]"
                value="{{$role->getKey()}}"
                {!! $role->assigned ? 'checked' : '' !!}
                {!! $role->assigned && !$role->isRemovable ? 'onclick="return false;"' : '' !!}
              >
              <span class="ml-2 {!! $role->assigned && !$role->isRemovable ? 'text-gray-600' : '' !!}">
                {{$role->display_name ?? $role->name}}
              </span>
            </label>
          @endforeach
        </div>
        @if ($permissions)
          <span class="block text-gray-700 mt-4">Permissions</span>
          <div class="flex flex-wrap justify-start mb-4">
            @foreach ($permissions as $permission)
              <label class="inline-flex items-center mr-6 my-2 text-sm" style="flex: 1 0 20%;">
              <input 
                  id="green-checkbox" 
                  class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  type="checkbox" 
                  name="permissions[]"
                  value="{{$permission->getKey()}}"
                  {!! $permission->assigned ? 'checked' : '' !!}
                >
                <span class="ml-2">{{$permission->display_name ?? $permission->name}}</span>
              </label>
            @endforeach
          </div>
        @endif
        <div class="flex justify-end">
          <a
            href="{{route("laratrust.roles-assignment.index", ['model' => $modelKey])}}"
            class="btn btn-red mr-4"
          >
            Cancel
          </a>
          <button class="btn btn-blue" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
@endsection