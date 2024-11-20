<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Page Content: Starts  -->
                    @if (session('message'))
                    <div class="alert alert-success py-4" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <p><a class="inline-flex items-center my-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href='{{ route("admin.users.create") }}'><i class="fa fa-plus"></i> Create User</a></p>

                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Created
                                </th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name ?? 'N/A' }}
                                </td>
                                
                                <td>
                                    {{ $user->email ?? 'N/A' }}
                                </td>
                                
                                <td>
                                    {{ optional($user->roles)[0]->name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ optional($user->created_at)->diffForHumans() }}
                                </td>

                                <td>
                                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href='{{ route("admin.users.edit", $user->id) }}'><i class="fa fa-pencil"></i> Edit</a>

                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group">
                                            <i class="fa fa-times"></i>
                                            <input type="submit" class="inline-flex items-center my-2 px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" value="Delete">
                                        </div>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" align="center">No records found!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Page Content: Ends  -->

                    <!-- Pagination  -->
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>