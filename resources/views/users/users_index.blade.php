<x-app-layout>
    <x-slot:title>
        Users
    </x-slot>

    <x-slot:nav_link>
        <a href="{{ url('products') }}">Products</a>
        <a href="{{ url('add_user') }}">Add User</a>
    </x-slot>

    <style>
        table,
        tr,
        td {
            padding: 6px 8px;
            border: 1px solid gray
        }

        thead {
            font-weight: bold;

        }
    </style>

    <div class="flex flex-col items-center h-[85svh] justify-start pt-4 text-center">
        <span class="font-bold text-3xl mb-4">Users List</span>
        <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    {{-- <td>Gender</td> --}}
                    <td>Email</td>
                    {{-- <td>City</td> --}}
                    {{-- <td>Birthday</td> --}}
                    <td>Reference Name</td>
                    <td>Profile</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @if (empty($users))
                    <tr>
                        <td colspan="9" class="text-red-400 font-bold">There are no user records available!</td>
                    </tr>
                @else
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            {{-- <td>{{ $user->gender }}</td> --}}
                            <td>{{ $user->email }}</td>
                            {{-- <td>{{ $user->city }}</td> --}}
                            {{-- <td>{{ $user->birthday }}</td> --}}
                            <td>{{ $user->reference_name }}</td>
                            <td><a href="{{ url('users/'.$user->id.'/profile') }}" class="button2 bg-blue-400 font-semibold">View Profile</a></td>
                            <td>
                                <a href="{{ url('users/' . $user->id . '/edit') }}" class="button2 bg-green-400 font-semibold">Edit</a>
                                <a href="{{ url('users/' . $user->id . '/delete') }}" class="button2 bg-red-400 font-semibold" onclick="return confirm('Are You Sure?');">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
