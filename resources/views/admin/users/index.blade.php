@extends("layouts.container")
@section("content")
<div class="w-full mt-16 p-4">
    <h3 class="font-medium text-3xl my-2">Manage Users</h3>
    <table class="table-auto border w-full">
        <thead>
            <tr class="border border-slate-600 bg-slate-600 text-white">
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="text-center border border-slate-600">
                <td class="border border-slate-700">{{ $loop->iteration }}</td>
                <td class="border border-slate-700">{{ $user->name }}</td>
                <td class="border border-slate-700">{{ $user->email }}</td>
                <td class="border border-slate-700">{{ $user->created_at->diffForHumans() }}</td>
                <td class="border border-slate-700">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ asset("user/$user->id") }}">
                            <i class="bx bx-show bg-blue-500 py-1 px-2 text-white font-semibold rounded-sm"></i>
                        </a>
                        <a href="{{ asset("administrator/users/$user->id/edit") }}">
                            <i class="bx bx-edit bg-yellow-500 py-1 px-2 text-white font-semibold rounded-sm"></i>
                        </a>
                        <form action="{{ asset("administrator/users/$user->id") }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit">
                                <i class="bx bx-trash py-1 px-2 text-white rounded-sm bg-red-500"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection