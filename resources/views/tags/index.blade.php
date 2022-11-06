@extends('layouts.container')
@section('content')
    <div class="w-full mt-16 p-4">
        {{-- <form action="">
        <label for="name" class="block"> Tag Name </label>
        <input type="text" id="name" name="name" class="border border-black outline-none">
        <label for="color" class="block"> Color </label>
        <input type="color" id="color" color="name" class="outline-none bg-transparent cursor-pointer w-32 rounded-sm">
        <button class="py-1 px-4 bg-blue-500 text-white my-4 rounded-sm cursor-pointer block" type="submit">Create New</button>
    </form> --}}
        <a class="py-1 px-4 bg-blue-500 text-white my-4 rounded-sm cursor-pointer"
            href="{{ asset('administrator/tags/create') }}">Create New</a>
        <h3 class="font-medium text-xl my-2">Available Tags</h3>
        <table class="table-auto w-full">
            <thead>
                <tr class="border border-slate-600 bg-slate-600 text-white">
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr class="text-center border border-slate-600">
                        <td class="border border-slate-700">{{ $loop->iteration }}</td>
                        <td class="border border-slate-700">
                            <span class="tag" style="background-color: {{ $tag->color }}">
                                {{ $tag->name }}
                            </span>
                        </td>
                        <td class="border border-slate-700">
                            <div class="flex justify-center items-center gap-2">
                                <a href="{{ asset("administrator/tags/$tag->id/edit") }}">
                                    <i class="bx bx-edit bg-blue-500 py-1 px-2 text-white font-semibold rounded-sm"></i>
                                </a>
                                <form action="{{ asset("administrator/tags/$tag->id") }}" method="POST">
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
