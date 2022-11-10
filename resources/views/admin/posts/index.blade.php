@extends("layouts.container")
@section("content")
<div class="w-full mt-16 p-4">
    <h3 class="font-medium text-3xl my-2">Manage Posts</h3>
    <table class="table-auto border w-full">
        <thead>
            <tr class="border border-slate-600 bg-slate-600 text-white">
                <th>No</th>
                <th>Title</th>
                <th>User</th>
                <th>Published</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr class="text-center border border-slate-600">
                <td class="border border-slate-700">{{ $loop->iteration }}</td>
                <td class="border border-slate-700">{{ $post->title }}</td>
                <td class="border border-slate-700">
                    <a href="{{ asset("user/" . $post->user->id) }}">{{ $post->user->name }}</a>
                </td>
                <td class="border border-slate-700">
                    <form action="{{ asset("administrator/posts/$post->slug") }}" method="POST">
                        @method('put')
                        @csrf
                        <button type="submit" name="published" value="{{ $post->published == 'N' ? 'Y' : 'N' }}" class="@if ($post->published == 'N') bg-red-500 @else bg-green-500 @endif py-1 px-2 text-white rounded-sm">
                            {{ $post->published }}
                        </button>
                    </form>
                </td>
                <td class="border border-slate-700">{{ $post->created_at->diffForHumans() }}</td>
                <td class="border border-slate-700">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ asset("post/$post->slug") }}">
                            <i class="bx bx-show bg-blue-500 py-1 px-2 text-white font-semibold rounded-sm"></i>
                        </a>
                        <a href="{{ asset("administrator/posts/$post->slug/edit") }}">
                            <i class="bx bx-edit bg-yellow-500 py-1 px-2 text-white font-semibold rounded-sm"></i>
                        </a>
                        <form action="{{ asset("me/posts/$post->slug") }}" method="POST">
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