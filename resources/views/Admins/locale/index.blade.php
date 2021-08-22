<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Languages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @can('create:locale')
                <div class="mb-3 justify-items-end flex">
                    <a href="{{ url('admin/languages/create') }}" class="bg-blue-500 px-3 py-2 text-white">Add Languages</a>
                </div>
            @endcan

            @if (session()->has('success'))
                <div class="fixed bg-green-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                    <p>
                        {{ session()->get('success') }}
                    </p>
                </div>
            @endif

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 table-auto">
                            <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Slug</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Created At</th>
                                <th scope="col" class="relative px-6 py-3">Action</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr></tr>
                            <!-- More items... -->
                            @foreach ($Languages as $language)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $language->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $language->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $language->slug }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $language->created_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4 text-center text-sm">

                                        @can('read:locale')
                                            <a href="{{ url('admin/languages/edit/'.$language->id) }}" class="m-1 py-2 px-3 bg-green-400 rounded">View</a> 
                                        @endcan
                                        
                                        <span class="mb-5"></span>
                                        
                                        @can('delete:locale')
                                            <form action="{{ url('admin/languages/delete/'.$language->id) }}" method="post">
                                                @csrf
                                               

                                                <button type="submit" class="m-1 p-2 bg-red-600 rounded text-white">
                                                    Delete
                                                </button>

                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">id</td>
                                <td class="px-6 py-4 whitespace-nowrap">Name</td>
                                <td class="px-6 py-4 whitespace-nowrap">Slug</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                created At
                                </td>
                                <td class="px-6 py-4 text-center text-sm">Action</td>
                            </tr>
                            <!-- More items... -->
                            </tbody>
                        </table>
                        <div class="flex justify-between m-2 p-2">
                            Pagination 
                            {{ $Languages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>