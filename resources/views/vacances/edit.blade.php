@extends('layouts.app')
@section('title', 'Edit')

@section('content')



    <div class="container">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Vacance</h2>
            <form action="{{ route('vacances.update', $vacance->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="employee_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee</label>
                        <select id="employee_id" name="employee_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ $employee->id === $vacance->employee->id ? 'selected' : '' }}>{{ $employee->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="w-full">
                        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                            Date</label>
                        <input type="date" id="start_date" name="start_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Product brand" required
                            value="{{ $vacance->start_date }}">

                    </div>
                    <div class="w-full">
                        <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                            Date</label>
                        <input type="date" id="end_date" name="end_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Product brand" required
                            value="{{ $vacance->end_date }}">

                    </div>

                    <div class="sm:col-span-2">
                        <label for="reason"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason</label>
                        <input type="text" id="reason" name="reason"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value=" {{ $vacance->reason }}" required>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Update
                </button>
            </form>
        </div>
    </div>
@endsection
