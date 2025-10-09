<x-app-layout>
    <x-slot:titile>
        User Profile
    </x-slot>
    <x-slot:nav_link>
        <a href="{{ url('products') }}">Products</a>
        <a href="{{ url('users') }}">Users</a>
        <a href="{{ url('add_user') }}">Add User</a>
    </x-slot>

    <div class="flex flex-col items-center">
        <span class="font-bold text-3xl mb-4 mt-2">User Profile</span>
        <div class="flex max-w-[600px] w-full h-[300px] border-t-2 border-l-2 shadow-lg rounded-xl bg-zinc-100">
            {{-- left --}}
            <div class="flex flex-col items-center justify-center w-[40%]">
                @if (empty($profile->profile_img))
                    <img src="{{ asset('uploads/users/profile_images/default.png') }}" alt="Profile image" class="rounded-full aspect-square h-32 border-4 border-zinc-300 object-cover">
                @else
                    <img src="{{ asset($profile->profile_img) }}" alt="Profile image" class="rounded-full aspect-square h-32 border-4 border-zinc-300 object-cover">
                @endif
                <div class="text-3xl font-bold">{{ $profile->name }}</div>
            </div>

            {{-- right --}}
            <div class="flex flex-col justify-center w-[60%] px-5">
                <table>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{ $profile->name }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td>{{ $profile->gender }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $profile->email }}</td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td>:</td>
                        <td>{{ $profile->city }}</td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>:</td>
                        <td>{{ $profile->birthday }}</td>
                    </tr>
                    <tr>
                        <td>Reference Name</td>
                        <td>:</td>
                        <td>{{$profile->reference_name}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="button bg-blue-500 mt-8 text-white">
            <a href="{{ url('users') }}">Go back</a>
        </div>
    </div>
</x-app-layout>
