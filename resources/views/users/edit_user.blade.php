<x-app-layout>
    <x-slot:title>
        Edit User
    </x-slot>
    <x-slot:nav_link>
        <a href="{{ url('users') }}">Go back</a>
    </x-slot>

    <div class="flex flex-col items-center justify-center">
        <span class="font-bold text-3xl mb-4 mt-2">Edit User</span>

        @if (session('status'))
            <div class="bg-green-200 flex flex-col min-w-80 max-w-96 mt-2">
                <span class="text-center py-1 px-8">{{ session('status') }}</span>
            </div>
        @endif

        <form action="{{ url('users/' . $user->id . '/update_user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="flex flex-col min-w-80 max-w-96 mb-2">
                <label>Name: </label>
                <input type="text" name="name" value="{{ $user->name }}" />
                @error('name')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col min-w-80 max-w-96 mb-2">
                <label>Gender: </label>
                <select name="gender">
                    <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col min-w-80 max-w-96 mb-2">
                <label>Email: </label>
                <input type="email" name="email" value="{{ $user->email }}" />
                @error('email')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col min-w-80 max-w-96 mb-2">
                <label>City: </label>
                <input type="text" name="city" value="{{ $user->city }}" />
                @error('city')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col min-w-80 max-w-96 mb-2">
                <label>Birthday: </label>
                <input type="date" name="birthday" value="{{ $user->birthday }}" />
                @error('birthday')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col min-w-80 max-w-96 mb-2">
                <label>Reference name: </label>
                <select name="reference_name">
                    <option value="-">Select Reference Name</option>
                    @foreach ($reference_names as $ref)
                        @if ($user->name !== $ref->name)
                            <option value="{{ $ref->name }}"
                                {{ $ref->name === $user->reference_name ? 'selected' : '' }}>{{ $ref->name }}
                            </option>
                        @endif
                    @endforeach

                </select>
                @error('reference_name')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col min-w-80 max-w-96 mb-2 pl-0">
                <label>Profile Image: </label>
                <input type="file" name="profile_img" />
                @error('profile_img')
                    <span class="text-red-500 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col min-w-80 max-w-96">
                <input type="Submit" class="button bg-blue-400">
            </div>

        </form>
    </div>
</x-app-layout>
