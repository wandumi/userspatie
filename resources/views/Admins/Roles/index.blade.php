<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-3 justify-items-end flex">
                <a href="{{ url('admin/roles/create') }}" class="bg-blue-500 px-3 py-2 text-white">Create Role</a>
            </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class=" table-fixed min-w-full divide-y divide-gray-200 ">
                            <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                                <th scope="col" class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                                <th scope="col" class="w-1/2 px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Permissions</th>
                                <th scope="col" class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Guard</th>
                                <th scope="col" class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Created At</th>
                                <th scope="col" class="relative px-6 py-3">Action</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr></tr>
                            <!-- More items... -->
                            @foreach ($Roles as $role)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $role->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $role->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap ">
                                        @foreach ($role->permissions as $permission)
                                            <span class="font-bold">{{ $permission->name }}, </span>
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $role->guard_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $role->created_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4 text-center text-sm">
                                        <a href="{{ url('admin/roles/edit/'.$role->id ) }}" class="m-1 py-2 px-4 bg-green-400 rounded">Edit</a> 
                                        <a href="#" class="m-1 p-2 bg-red-600 rounded text-white">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">id</td>
                                <td class="px-6 py-4 whitespace-nowrap">Name</td>
                                <td class="px-6 py-4 whitespace-nowrap">Permissions</td>
                                <td class="px-6 py-4 whitespace-nowrap">Guard</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                created At
                                </td>
                                <td class="px-6 py-4 text-center text-sm">Action</td>
                            </tr>
                            <!-- More items... -->
                            </tbody>
                        </table>
                        <div class="m-2 p-2">Pagination</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>