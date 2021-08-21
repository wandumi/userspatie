<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Logged Activity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- @can('create:permission')
                <div class="mb-3 justify-items-end flex">
                    <a href="{{ url('admin/languages/create') }}" class="bg-blue-500 px-3 py-2 text-white">Add Languages</a>
                </div>
            @endcan --}}


            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 table-auto">
                            <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Activity</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Created At</th>
                               
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr></tr>
                            <!-- More items... -->
                            @foreach ($Activities as $activity)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $activity->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($activity->user->name) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $activity->activity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $activity->created_at }}</td>
                                    
                                </tr>
                            @endforeach
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">id</td>
                                <td class="px-6 py-4 whitespace-nowrap">Name</td>
                                <td class="px-6 py-4 whitespace-nowrap">Activity</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                created At
                                </td>
                                
                            </tr>
                            <!-- More items... -->
                            </tbody>
                        </table>
                        <div class="flex justify-between m-2 p-2">
                            Pagination 
                            {{ $Activities->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>