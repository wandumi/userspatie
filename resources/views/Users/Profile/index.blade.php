<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-3 mx-4 justify-items-end flex">
                <a href="{{ url('dashboard') }}" class="bg-blue-500 px-3 py-2 w-1/4 text-white"><< Dashboard</a>
            </div>

            <div class="bg-white">

            </div>
                <form action="" method="post" class="mx-4">
                    <div class="mt-8 max-w-md">
                        <div class="grid grid-cols-1 gap-6">
                          <label class="block">
                            <span class="text-gray-700">Full name</span>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
                          </label>
                          <label class="block">
                            <span class="text-gray-700">Email address</span>
                            <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="john@example.com">
                          </label>

                          <label class="block">
                            <span class="text-gray-700">Password</span>
                            <input type="password" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                   placeholder=""
                                   value=""
                                   name="password">
                          </label>


                          <label class="block">
                            <span class="text-gray-700">Language</span>
                            <select class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                              <option disabled value="">Choose a Language</option>
                              
                              {{-- @foreach ($roles as $role)
                                 <option  name="role[]" value="{{ $role->id }}">{{ $role->name }}</option>
                              @endforeach --}}
                             
                            </select>
                          </label>
                        

                        
                         

                          <div class="block">
                            <div class="mt-2">
                              <div>
                                 <input type="button" value="Submit" class="bg-blue-500 w-full text-white p-2">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
  
                </form>
            
            
        </div>

    </div>
</x-app-layout>