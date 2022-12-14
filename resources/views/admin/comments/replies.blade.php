@extends("layouts.container")
@section("content")
<div class="w-full mt-16 p-4">
    <h3 class="font-medium text-3xl my-2">Manage Replies Comment</h3>
    <table class="table-auto border w-full">
        <thead>
            <tr class="border border-slate-600 bg-slate-600 text-white">
                <th>No</th>
                <th>Post</th>
                <th>User</th>
                <th>Replying</th>
                <th>Comment</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($replies as $reply)
            <tr class="text-center border border-slate-600">
                <td class="border border-slate-700">{{ $loop->iteration }}</td>
                <td class="border border-slate-700">{{ $reply->post->title }}</td>
                <td class="border border-slate-700">
                    <a href="{{ asset("user/" . $reply->user->id) }}">{{ $reply->user->name }}</a>
                </td>
                <td class="border border-slate-700">{{ $reply->replied->comment }}</td>
                <td class="border border-slate-700">{{ $reply->comment }}</td>
                <td class="border border-slate-700">{{ $reply->created_at->diffForHumans() }}</td>
                <td class="border border-slate-700">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ asset("post/" . $reply->post->slug) }}">
                            <i class="bx bx-show bg-blue-500 py-1 px-2 text-white font-semibold rounded-sm"></i>
                        </a>
                        <a href="{{ asset("administrator/replies/" . $reply->id) }}">
                            <i class="bx bx-reply bg-yellow-500 py-1 px-2 text-white font-semibold rounded-sm"></i>
                        </a>
                        <form action="{{ asset("administrator/comments/" . $reply->id) }}" method="POST">
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