<x-app-layout>
    <div class="py-12">
        <form class="max-w-xl mx-auto" method="POST" action="{{ route('clerk.cases.search') }}">
            @csrf
            <div class="mb-5">
                {{-- <label for="case_number" class="block mb-2 text-sm font-medium text-gray-900">መለያ ቁጥር</label> --}}
                <input type="text" id="case_number" name="case_number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-4">
                    Search
                </button>
            </div>
        </form>
    </div>

    <div class="py-12 max-w-7xl mx-auto">
        {{-- {{ $result['message'] }} --}}
        @if (isset($result[0]))
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
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
                            {{-- <th scope="col" class="px-6 py-3">
                                ዝርዝር
                            </th> --}}
                            <th scope="col" class="px-6 py-3">
                                የተመዘገበት ቀን
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                የቀጠሮ ቀን
                            </th>
                            <th scope="col" class="px-6 py-3">
                                የቀጠሮ ምክንያት
                            </th> --}}
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-950">
                                {{ $result[0]->case_number }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $result[0]->archive_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->rank . ' ' . $result[0]->accused }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->accuser }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->location }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->case_type }}
                            </td>
                            <td class="px-6 py-4" colspan="2">
                                @if ($result[0]->case_status == 'በሂደት ላይ')
                                    <span class="bg-yellow-500 text-white text-xs p-2 rounded-full">{{ $result[0]->case_status }}</span>
                                @elseif ($result[0]->case_status == 'በቀጠሮ ላይ')
                                    <span class="bg-green-700 text-white text-xs p-2 rounded-full">{{ $result[0]->case_status }}</span>
                                @else
                                    <span class="bg-red-800 text-white text-xs p-2 rounded-full">{{ $result[0]->case_status }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->cause_of_action }}
                            </td>
                            {{-- <td class="px-6 py-4">
                                {{ $result[0]->case_details }}
                            </td> --}}
                            <td class="px-6 py-4">
                                {{ $result[0]->start_date }}
                            </td>
                            {{-- <td class="px-6 py-4">
                                {{ $result[0]->app_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->app_reason }}
                            </td> --}}
                            <td class="px-6 py-4">
                                <a href="{{ route('clerk.cases.show', [$result[0]->id]) }}"
                                    class="font-medium text-blue-600 hover:underline">View</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @elseif (isset($result['message']))
            <div class="py-12">
                <h3 class="text-3xl font-bold text-center dark:text-white my-16">{{ $result['message'] }}</h3>
            </div>
        @else
        @endif
    </div>
</x-app-layout>
