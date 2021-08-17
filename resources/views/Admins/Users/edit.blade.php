<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-5 mx-4 justify-items-end flex">
                <a href="" class="bg-blue-500 px-3 py-2 text-white">Edit User</a>
            </div>

                <form action="" method="post" class="mx-4 my-2">
                    <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                          <span class="text-gray-700">Full name</span>
                          <input type="text" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black" placeholder="">
                        </label>
                        <label class="block">
                          <span class="text-gray-700">Email address</span>
                          <input type="email" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black" placeholder="john@example.com">
                        </label>
                        <label class="block">
                          <span class="text-gray-700">When is your event?</span>
                          <input type="date" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black">
                        </label>
                        <label class="block">
                          <span class="text-gray-700">What type of event is it?</span>
                          <select class="block w-full mt-0 px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black">
                            <option>Corporate event</option>
                            <option>Wedding</option>
                            <option>Birthday</option>
                            <option>Other</option>
                          </select>
                        </label>
                        <label class="block">
                          <span class="text-gray-700">Additional details</span>
                          <textarea class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black" rows="2"></textarea>
                        </label>
                        <div class="block">
                          <div class="mt-2">
                            <div>
                              <label class="inline-flex items-center">
                                <input type="checkbox" class="border-gray-300 border-2 text-black focus:border-gray-300 focus:ring-black">
                                <span class="ml-2">Email me news and special offers</span>
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="block">
                            <div class="mt-2">
                                <div>
                                    <input type="button" value="Update" class="bg-blue-500 text-white p-2">
                                </div>
                            </div>
                        </div>


                      </div>
  
                </form>
            
            
        </div>

    </div>
</x-app-layout>