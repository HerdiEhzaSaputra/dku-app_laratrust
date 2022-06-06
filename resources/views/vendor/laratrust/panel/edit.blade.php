@extends('laratrust::panel.layout')

@section('title')
  @if($type == 'role')
    Edit Roles
  @else
    Edit Permissions
  @endif
@endsection

@section('content')
  <div class="flex flex-col">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-32">
      <form
        x-data="laratrustForm()"
        x-init="{!! $model ? '' : '$watch(\'displayName\', value => onChangeDisplayName(value))'!!}"
        method="POST"
        action="{{$model ? route("laratrust.{$type}s.update", $model->getKey()) : route("laratrust.{$type}s.store")}}"
        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 p-8"
      >
        @csrf
        @if ($model)
          @method('PUT')
        @endif
        <label class="block my-4">
          <span class="text-gray-700">Name/Code</span>
          <input 
            type="text"
            class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('name') border-red-500 @enderror"
            name="name"
            placeholder="this-will-be-the-code-name"
            :value="name"
            readonly
            autocomplete="off"
          >
          @error('name')
              <div class="text-red-500 text-sm mt-1">{{ $message}} </div>
          @enderror
        </label>

        <label class="block my-4">
          <span class="text-gray-700">Display Name</span>
          <input
            type="text"
            class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            name="display_name"
            placeholder="Edit user profile"
            x-model="displayName"
            autocomplete="off"
          >
        </label>

        <label class="block my-4">
          <span class="text-gray-700">Description</span>
          <textarea
            class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            rows="3"
            name="description"
            placeholder="Some description for the {{$type}}"
          >{{ $model->description ?? old('description') }}</textarea>
        </label>
        @if($type == 'role')
          <span class="block text-gray-700">Permissions</span>
          <div class="flex flex-wrap justify-start mb-4">
            @foreach ($permissions as $permission)
              <label class="inline-flex items-center mr-6 my-2 text-sm" style="flex: 1 0 20%;">
                <input 
                  id="green-checkbox" 
                  type="checkbox" 
                  name="permissions[]"
                  class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
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
            href="{{route("laratrust.{$type}s.index")}}"
            class="btn btn-red mr-4"
          >
            Cancel
          </a>
          <button class="btn btn-blue" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
  <script>
    window.laratrustForm =  function() {
      return {
        displayName: '{{ $model->display_name ?? old('display_name') }}',
        name: '{{ $model->name ?? old('name') }}',
        toKebabCase(str) {
          return str &&
            str
              .match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g)
              .map(x => x.toLowerCase())
              .join('-')
              .trim();
        },
        onChangeDisplayName(value) {
          this.name = this.toKebabCase(value);
        }
      }
    }
  </script>
@endsection