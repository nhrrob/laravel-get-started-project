<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Page Content: Starts -->
                    <div class="container">
                        @if (session('message'))
                        <div class="alert alert-success py-4" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif

                        <form method="POST" action='{{ route("admin.roles.store") }}' enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" type="text" name="name" placeholder="Name" value="{{old('name')}}">
                                @error('name')
                                <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <!-- Permissions Start -->
                            <div class="pt-3"></div>
                            <p class="text-lg font-semibold">Permissions</p>

                            <div class="space-y-4">
                                <!-- Select All -->
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <input id="checkPermissionAll" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" />
                                        <label for="checkPermissionAll" class="text-sm font-medium text-gray-700">All</label>
                                    </div>
                                    <hr class="my-2 border-gray-300" />
                                </div>

                                @php $i = 1; @endphp
                                @foreach($permissionGroups as $group)
                                <!-- Permission Group -->
                                <div class="flex flex-wrap items-start space-y-2">
                                    <!-- Group Checkbox -->
                                    <div class="w-full md:w-1/4">
                                        <div class="flex items-center space-x-2">
                                            <input id="{{$i}}Management" type="checkbox" name="group[]" value="{{$group->group_name}}" onclick="checkPermissionByGroup('role-{{$i}}-management-checkbox', this)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" />
                                            <label for="{{$i}}Management" class="text-sm font-medium text-gray-700">{{$group->group_name}}</label>
                                        </div>
                                    </div>

                                    <!-- Group Permissions -->
                                    <div class="w-full md:w-3/4 role-{{$i}}-management-checkbox space-y-1">
                                        @php
                                        $permissions = auth()->user()->getPermissionsByGroupName($group->group_name); 
                                        $j = 1;
                                        @endphp

                                        @foreach($permissions as $permission)
                                        <div class="flex items-center space-x-2">
                                            <input id="checkPermission{{$permission->id}}" type="checkbox" name="permissions[]" value="{{$permission->name}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" />
                                            <label for="checkPermission{{$permission->id}}" class="text-sm font-medium text-gray-700">{{$permission->name}}</label>
                                        </div>
                                        @php $j++; @endphp
                                        @endforeach
                                    </div>
                                </div>
                                @php $i++; @endphp
                                @endforeach
                            </div>
                            <!-- Permissions End -->


                            <div class="form-group">
                                <a class="inline-flex items-center my-2 px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href='{{ route("admin.roles.index") }}' type="submit">Cancel</a>
                                <button class="inline-flex items-center my-2 px-4 py-2 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- Page Content: Ends  -->
                </div>


            </div>
        </div>
    </div>
</x-app-layout>

<!-- @push('scripts')
@include('admin.role.partials.scripts')
@endpush  -->

@include('admin.role.partials.scripts')