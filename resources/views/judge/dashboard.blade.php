<x-app-layout>
    @if (isset($court))
        <x-slot name="header">
            <h2 class="font-semibold text-3xl text-center text-gray-800 leading-tight">
                COURT
            </h2>
            <h2 class="font-semibold text-3xl text-center text-gray-800 leading-tight">
                {{ $court->name }}
            </h2>
        </x-slot>
    @endif
    <div class="py-12 max-w-7xl mx-auto">
        @if (isset($court))
            @if (isset($cases[0]))
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Case number
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cause of action
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Details
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Start date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    End Date
                                </th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cases as $case)
                                <tr class="odd:bg-white even:bg-gray-50 border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $case->case_number }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $case->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $case->case_type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $case->case_status }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $case->cause_of_action }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $case->case_details }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $case->start_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $case->end_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('judge.cases.show', [$case->id]) }}"
                                            class="font-medium text-blue-600 hover:underline">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h3 class="text-3xl font-bold text-center dark:text-white my-16 capitalize">No cases assign to the court
                </h3>
            @endif
        @else
            <h3 class="text-3xl font-bold text-center dark:text-white my-16 capitalize">No court assigned for you</h3>
        @endif
    </div>
</x-app-layout>
