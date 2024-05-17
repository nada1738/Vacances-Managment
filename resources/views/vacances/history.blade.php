@extends('layouts.app')
@section('title', 'History')

@section('content')
    <div class="flex flex-col w-full p-4 gap-4">
        <h5 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white p-4">Vacance History</h5>
        <div class="flex justify-end">
            <button class="btn btn-primary" onclick="printTable()">Print</button>
        </div>

        <div class="overflow-x-auto">
            <table class="table table-bordered w-full" id="table">
                <thead>
                    <tr>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">ID</th>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">Employee</th>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">Department</th>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">Start Date</th>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">End Date</th>
                        <th class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-600">Reason</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vacances->sortByDesc('start_date') as $vacance)
                        <tr>
                            <td class="bg-white text-black dark:bg-gray-800 dark:text-gray-400">{{ $vacance->id }}</td>
                            <td class="bg-white text-black dark:bg-gray-800 dark:text-gray-400">
                                {{ $vacance->employee ? $vacance->employee->name : 'N/A' }}</td>
                            <td class="bg-white text-black dark:bg-gray-800 dark:text-gray-400">
                                {{ $vacance->employee ? $vacance->employee->department->name : 'N/A' }}</td>
                            <td class="bg-white text-black dark:bg-gray-800 dark:text-gray-400">{{ $vacance->start_date }}
                            </td>
                            <td class="bg-white text-black dark:bg-gray-800 dark:text-gray-400">{{ $vacance->end_date }}
                            </td>
                            <td class="bg-white text-black dark:bg-gray-800 dark:text-gray-400">{{ $vacance->reason }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="grid p-4 mx-4">
            {{ $vacances->links() }}
        </div>
    </div>

    <script>
        function printTable() {
            var printContents = document.getElementById('table').outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;
            window.location.reload(); // Reload the page to restore the original content
        }
    </script>
@endsection
