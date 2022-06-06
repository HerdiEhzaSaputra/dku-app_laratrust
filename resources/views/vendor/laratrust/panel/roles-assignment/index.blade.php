@extends('laratrust::panel.layout')

@section('title', 'Roles Assignment')

@section('content')
  <div class="flex flex-col">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div
        x-data="{ model: @if($modelKey) '{{$modelKey}}' @else 'initial' @endif }"
        x-init="$watch('model', value => value != 'initial' ? window.location = `?model=${value}` : '')"
        class="mt-4 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 p-4"
      >
        <span class="text-gray-700">User model to assign roles/permissions</span>
        <label class="block w-3/12">
          <select x-model="model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($models as $model)
              <option value="{{$model}}">{{ucwords($model)}}</option>
            @endforeach
          </select>
        </label>
        <div class="flex mt-4 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg ">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        # Roles
                    </th>
                    @if(config('laratrust.panel.assign_permissions_to_user'))
                    <th scope="col" class="px-6 py-3">
                      # Permissions
                    </th>
                    @endif
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only"></span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                      {{$user->getKey()}}
                    </th>
                    <td class="px-6 py-4">
                      {{$user->name ?? 'The model doesn\'t have a `name` attribute'}}
                    </td>
                    <td class="px-6 py-4">
                      {{$user->roles_count}}
                    </td>
                    @if(config('laratrust.panel.assign_permissions_to_user'))
                    <td class="px-6 py-4">
                      {{$user->permissions_count}}
                    </td>
                    @endif
                    <td class="px-6 py-4 text-right">
                      <a
                        href="{{route('laratrust.roles-assignment.edit', ['roles_assignment' => $user->getKey(), 'model' => $modelKey])}}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                      >Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
        @if ($modelKey)
          {{ $users->appends(['model' => $modelKey])->links('laratrust::panel.pagination') }}
        @endif

      </div>
    </div>
  </div>
@endsection
