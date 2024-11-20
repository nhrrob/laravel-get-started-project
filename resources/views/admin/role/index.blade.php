<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role') }}
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

                    <p><a class="inline-flex items-center my-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href='{{ route("admin.roles.create") }}'><i class="fa fa-plus"></i> Create Role</a></p>

                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Permissions
                                </th>
                                <th>
                                    Created
                                </th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($roles as $role)
                            <tr>
                                <td>
                                    {{ $role->name ?? 'N/A' }}
                                </td>

                                <td>
                                    @foreach($role->permissions as $perm)
                                    <span class="badge badge-info mb-1 p-1 text-white" style="font-size: 12px;">{{$perm->name}}</span>
                                    @endforeach
                                </td>

                                <td>
                                    {{ optional($role->created_at)->diffForHumans() }}
                                </td>

                                <td>
                                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href='{{ route("admin.roles.edit", $role->id) }}'><i class="fa fa-pencil"></i> Edit</a>

                                    <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
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
                        {{ $roles->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>