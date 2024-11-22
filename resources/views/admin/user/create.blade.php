<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
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

                        <form method="POST" action='{{ route("admin.users.store") }}' enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full mb-2" type="text" name="name" placeholder="Name" value="{{old('name')}}">
                                @error('name')
                                <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full mb-2" type="email" name="email" placeholder="Email" value="{{old('email')}}">
                                @error('email')
                                <label class="text-danger">{{ $message }}</label>
                                @enderror
                                <p class="alert-danger br-1s mb-2">Default password: password</p>
                            </div>

                            <div class="form-group">
                                <select class="form-control mb-2" name="role">
                                    <!-- default: user -->
                                    <option value="3">Role</option>
                                    @foreach($roles as $singleRole)
                                    <option value="{{$singleRole->name}}" {{ $singleRole->name == old('role') ? 'selected' : '' }} >{{ $singleRole->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <label id="-error" class="error" for="">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <a class="inline-flex items-center my-2 px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href='{{ route("admin.users.index") }}' type="submit">Cancel</a>
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