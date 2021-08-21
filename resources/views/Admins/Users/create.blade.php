<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-5 mx-4 justify-items-end flex">
                <a href="{{ url('admin/users') }}" class="bg-blue-500 px-3 py-2 text-white">Back</a>
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

            @if ($errors->any())
                <div class="text-red-600">
                    <ul class="p-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('admin/users/store') }}" method="post" class="mx-4">
              @csrf
              <div class="mt-8 max-w-md">
                  <div class="grid grid-cols-1 gap-6">
                    <label class="block">
                      <span class="text-gray-700">Full name</span>
                      <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                      placeholder=""
                      name="name"
                      value="">
                    </label>
                    <label class="block">
                      <span class="text-gray-700">Email address</span>
                      <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                      placeholder=""
                      name="email"
                      value="">
                    </label>

                   
                    <label class="block">
                      <span class="text-gray-700">Password</span>
                      <input type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                      placeholder=""
                      name="password"
                      value="">
                     
                    </label>

                    <label class="block">
                      <span class="text-gray-700">Confirm Password</span>
                      <input type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                      placeholder=""
                      name="password_confirmation"
                      value="">
                     

                    </label>
                    
                   

                    <div class="block">
                      <span class="text-gray-700">Assign Role</span>
                      <div class="mt-2">
                        <div>
                          @foreach ($roles as $role)
                            <label class="inline-flex items-center mr-2">
                              <input type="checkbox" name="role[]" value="{{ $role->id }}">
                              <span class="ml-2">{{ $role->name }}</span>
                            </label>
                              
                          @endforeach
                        </div>
                      </div>
                    </div>

                    
                   
                    @can('create:user')
                      <div class="block">
                        <div class="mt-2">
                          <div>
                            <input type="submit" value="Submit" class="bg-blue-500 w-full text-white p-2">
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