<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Update') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-5 mx-4 justify-items-end flex">
                <a href="{{ url('admin/users') }}" class="bg-blue-500 px-3 py-2 text-white">Back</a>
            </div>

            <form action="{{ url('admin/users/update/'.$user->id) }}" method="post" class="mx-4">
              @csrf

              <div class="mt-8 max-w-md">
                  <div class="grid grid-cols-1 gap-6">
                    <label class="block">
                      <span class="text-gray-700">Full name</span>
                      <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                      placeholder=""
                      name="name"
                      value="{{ $user->name }}">
                    </label>

                    <label class="block">
                      <span class="text-gray-700">Email address</span>
                      <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                      placeholder=""
                      name="email"
                      value="{{ $user->email }}">
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
                      name="confirm_password"
                      value="">
                     

                    </label>
                    
                   

                    <div class="block">
                      <span class="text-gray-700">Assign Role</span>
                      <div class="mt-2">
                        <div>
                          @foreach ($roles as $role)
                            <label class="inline-flex items-center mr-2">
                              <input type="checkbox" name="role[]" value="{{ $role->id }}"
                              
                                  @foreach ($user->roles as $userrole)

                                      @if ( $role->id == $userrole->id )
                                          checked
                                      @endif

                                  @endforeach
                              
                              >
                              <span class="ml-2">{{ $role->name }}</span>
                            </label>
                              
                          @endforeach
                        </div>
                      </div>
                    </div>

                    
                   
                    @can('update:user')
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