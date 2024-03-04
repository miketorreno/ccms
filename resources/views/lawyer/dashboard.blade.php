<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto">
        @if (isset($cases[0]))
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                መለያ ቁጥር
                            </th>
                            <th scope="col" class="px-6 py-3">
                                መዝገብ ቁጥር
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ተከሳሽ
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ከሳሽ/ክፍል
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ዕዝ
                            </th>
                            <th scope="col" class="px-6 py-3">
                                የክሱ አይነት
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ያለበት ሁኒታ
                            </th>
                            <th scope="col" class="px-6 py-3"></th>
                            <th scope="col" class="px-6 py-3">
                                የክርክሩ ሂደት
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ዝርዝር
                            </th>
                            <th scope="col" class="px-6 py-3">
                                የተመዘገበት ቀን
                            </th>
                            <th scope="col" class="px-6 py-3">
                                የቀጠሮ ቀን
                            </th>
                            <th scope="col" class="px-6 py-3">
                                የቀጠሮ ምክንያት
                            </th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cases as $case)
                            <tr class="odd:bg-white even:bg-gray-200 border-b">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-950">
                                    {{ $case->case_number }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $case->archive_number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $case->rank . ' ' . $case->accused }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $case->accuser }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $case->location }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $case->case_type }}
                                </td>
                                <td class="px-6 py-4" colspan="2">
                                    @if ($case->case_status == 'በሂደት ላይ')
                                        <span class="bg-yellow-500 text-white text-xs p-2 rounded-full">{{ $case->case_status }}</span>
                                    @elseif ($case->case_status == 'በቀጠሮ ላይ')
                                        <span class="bg-green-700 text-white text-xs p-2 rounded-full">{{ $case->case_status }}</span>
                                    @else
                                        <span class="bg-red-800 text-white text-xs p-2 rounded-full">{{ $case->case_status }}</span>
                                    @endif
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
                                    {{ $case->app_date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $case->app_reason }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('lawyer.cases.show', [$case->id]) }}"
                                        class="font-medium text-blue-600 hover:underline">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h3 class="text-3xl font-bold text-center dark:text-white my-16">No cases assign for you</h3>
        @endif
    </div>
</x-app-layout>
