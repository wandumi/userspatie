<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Languages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
          @can('create:locale')

            <div class="mb-3 mx-4 justify-items-end flex">
                <a href="{{ url('admin/languages') }}" class="bg-blue-500 px-3 py-2 text-white">Back</a>
            </div>
            
          @endcan

          @if (session()->has('success'))
              <div class="fixed bg-green-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                  <p>
                      {{ session()->get('success') }}
                  </p>
              </div>
          @endif

          <form action="{{ url('admin/languages/update/'.$locale->id) }}" method="post" class="mx-4">
            @csrf

              <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                  <label class="block">
                    <span class="text-gray-700">Language Name</span>
                    <input type="text" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            placeholder=""
                            name="name"
                            value="{{ $locale->name }}">
                  </label>
                  <label class="block">
                    <span class="text-gray-700">Slug (en, de)</span>
                    <input type="text" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                          placeholder=""
                          name="slug"
                          value="{{ $locale->slug }}">
                  </label>
                  
                  
                  
                  @can('update:permission')
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