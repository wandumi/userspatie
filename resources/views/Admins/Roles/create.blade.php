<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-3 mx-4 justify-items-end flex">
                <a href="" class="bg-blue-500 px-3 py-2 text-white">Create Role</a>
            </div>

            <div class="bg-white">
              @if (session()->has('success'))
                  <div class="fixed bg-green-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                      <p>
                          {{ session()->get('success') }}
                      </p>
                  </div>
              @endif
            </div>

                <form action="{{ url('admin/roles/store') }}" method="post" class="mx-4">
                  @csrf
                    <div class="mt-8 max-w-md">
                      <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                          <span class="text-gray-700">Role name</span>
                          <input type="text" 
                                 class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                 placeholder=""
                                 name="name">
                        </label>
                        <label class="block">
                          <span class="text-gray-700">Guard Name</span>
                          <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                  placeholder="Web"
                                  value="web"
                                  name="guard"
                                  disabled>
                        </label>


                        <div class="block">
                          <span class="text-gray-700">Assign Role</span>
                          <div class="mt-2">
                            <div>
                              @foreach ($permissions as $permission)
                                <label class="inline-flex items-center mr-2">
                                  <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                  <span class="ml-2">{{ $permission->name }}</span>
                                </label>
                                  
                              @endforeach
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="block">
                          <div class="mt-2">
                            <div>
                                <input type="submit" value="Submit" class="bg-blue-500 w-full text-white p-2">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
  
                </form>
            
            
        </div>

    </div>
</x-app-layout>