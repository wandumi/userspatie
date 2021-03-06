<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-3 mx-4 justify-items-end flex">
                <a href="{{ url('admin/permissions') }}" class="bg-blue-500 px-3 py-2 text-white">Back</a>
            </div>

            <div class="bg-white">

            </div>
                <form action="{{ url('admin/permissions/update/'. $permission->id ) }}" method="post" class="mx-4">
                  @csrf
                    <div class="mt-8 max-w-md">
                      <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                          <span class="text-gray-700">Permission Name</span>
                          <input type="text" 
                                 class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                 placeholder=""
                                 name="name"
                                 value="{{ $permission->name }}">
                        </label>
                        <label class="block">
                          <span class="text-gray-700">Permission Description</span>
                          <input type="text" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                placeholder=""
                                name="description"
                                value="{{ $permission->description }}">
                        </label>
                    
                       
                       
                        @can('update:permission')
                          <div class="block">
                            <div class="mt-2">
                              <div>
                                <input type="submit" value="Update" class="bg-blue-500 text-white p-2">
                              </div>
                            </div>
                          </div>
                        @endcan
                      </div>
                    </div>
  
                </form>
            
            
        </div>

    </div>
</x-app-layout>