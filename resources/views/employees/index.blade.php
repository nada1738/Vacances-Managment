@extends('layouts.app')
@section('title', 'Employees')

@section('content')
    <div class="flex flex-col w-full p-4 gap-4">

        <h5 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white p-4">Employees</h5>

        <form action="{{ route('employees.index') }}" method="GET">
            <div class="input-group ">

                <input type="text" class="input input-bordered w-full max-w-xs mr-2 bg-white dark:bg-gray-600"
                    name="search" placeholder="Search by employee name" value="{{ request('search') }}">
                <div class="input-group-append">
                    <div class="input-group-append">
                        <button class="btn bg-white text-gray-900 hover:bg-gray-300 " type="search">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="flex justify-end">
            <a href="{{ route('employees.create') }}" class="btn btn-success ">Create Employees</a>
        </div>

        <div class="overflow-x-auto">
            <table class="table table-bordered w-full" id="table">
                <thead>
                    <tr>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">ID</th>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">image</th>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">Name</th>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">Email</th>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">department</th>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td class="bg-white text-black dark:bg-gray-800 dark:text-gray-400">
                                {{ $employee->id }}
                            </td>
                            <td class="bg-white text-black dark:bg-gray-800 dark:text-gray-400">
                                <img src="{{ asset('images/' . $employee->image) }}" alt="{{ $employee->image}}"
                                    class="w-10 h-10 object-cover rounded-full">


                            </td>
                            <td class="bg-white text-black dark:bg-gray-800 dark:text-gray-400">
                                {{ $employee->name }}
                            </td>
                            <td class="bg-white text-black dark:bg-gray-800 dark:text-gray-400">
                                {{ $employee->email }}
                            </td>
                            <td class="bg-white text-black dark:bg-gray-800 dark:text-gray-400">
                                {{ $employee->department->name ?? 'N/A' }}
                            </td>
                            <td class="bg-white text-black dark:bg-gray-800  dark:text-gray-400 flex ">
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary  border-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>
                                <a href="{{ route('employees.edit', $employee->id) }}"
                                    class="btn bg-yellow-400 hover:bg-yellow-500 border-none text-white mx-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>

                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                    class="flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-red-600 hover:bg-red-700 text-white border-none"
                                        onclick="return confirm('Are you sure you want to delete this employee?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>
                                @if ($employee->image)
                                <h1>{{ $employee->image }}</h1>
                                    <img src="{{ asset('images/' .$employee->image) }}" alt="Employee Image"
                                        class="w-32 h-32 rounded-full">
                                @else
                                    No Image Available
                                @endif
                            </td>

                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->department->name }}</td>
                            <td>
                                <!-- Action buttons (e.g., edit, delete) -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}

        </div>

        <div class="grid p-4 mx-4">
            {{ $employees->links() }}
        </div>

    </div>
@endsection
