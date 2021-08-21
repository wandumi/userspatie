<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @can('create:user')
                <div class="mb-3 justify-items-end flex">
                    <a href="{{ url('admin/users/create') }}" class="bg-blue-500 px-3 py-2 text-white">Create User</a>
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
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Roles</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Created At</th>
                                <th scope="col" class="relative px-6 py-3">Action</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr></tr>
                            <!-- More items... -->
                            @foreach ($Users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @foreach ($user->roles as $role)
                                            <span class="font-bold">{{ ucfirst( $role->name ) }} <br /> </span>
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4 text-center text-sm">

                                        @can('read:user')
                                            <a href="{{ url('admin/users/edit/'.$user->id ) }}" class="m-1 py-2 px-3 bg-green-400 rounded">View</a> 
                                        @endcan
                                        {{-- <span class="sm:mb-4 md:mb-0 lg:mb-0">
                                            &nbsp;
                                        </span> --}}
                                        @can('delete:user')
                                            <form action="{{ url('admin/users/delete/'.$user->id) }}" method="post">
                                                @csrf
                                                {{-- @method('DELETE') --}}

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
                                <td class="px-6 py-4 whitespace-nowrap">Email</td>
                                <td class="px-6 py-4 whitespace-nowrap">Roles</td>
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
                            {{ $Users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>