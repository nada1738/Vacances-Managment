@extends('layouts.app')
@section('title', 'Edit')
@section('content')
    <div class="w-full">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">
                Edit Employee
            </h2>
            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid my-4 gap-4">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Employee
                            Name</label>
                        <input type="text" id="name" name="name" value="{{ $employee->name }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Employee
                            Email</label>
                        <input type="email" id="email" name="email" value="{{ $employee->email }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="image"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Image</label>
                        <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                        @if ($employee->image)
                            <img id="imagePreview" src="{{ asset('images/' . $employee->image) }}" alt="Image Preview"
                                style="display: block; max-width: 200px; margin-top: 10px;">
                        @else
                            <img id="imagePreview" src="#" alt="Image Preview"
                                style="display: none; max-width: 200px; margin-top: 10px;">
                        @endif
                    </div>

                    <div class="sm:col-span-2">
                        <label for="phone"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ $employee->phone }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="department_id"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Department Name</label>
                        <select id="department_id" name="department_id" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ $department->id == $employee->department_id ? 'selected' : '' }}>
                                    {{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid justify-items-end">
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">Update</button>
                </div>
            </form>

            <script>
                function previewImage(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var imagePreview = document.getElementById('imagePreview');
                        imagePreview.style.display = 'block';
                        imagePreview.src = reader.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            </script>

        </div>
    </div>
@endsection
