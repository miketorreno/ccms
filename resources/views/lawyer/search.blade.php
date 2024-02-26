<x-app-layout>
    <div class="py-12">
        <form class="max-w-xl mx-auto" method="POST" action="{{ route('judge.cases.search') }}">
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
        @if (isset($result['message']))
            <div class="py-12">
                <h3 class="text-3xl font-bold text-center dark:text-white my-16">{{ $result['message'] }}</h3>
            </div>
        @elseif (isset($result[0]))
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                መለያ ቁጥር
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ክስ
                            </th>
                            <th scope="col" class="px-6 py-3">
                                የክሱ አይነት
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ያለበት ሁኒታ
                            </th>
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
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-950">
                                {{ $result[0]->case_number }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $result[0]->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->case_type }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->case_status }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->cause_of_action }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->case_details }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->start_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $result[0]->app_date }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('lawyer.cases.show', [$result[0]->id]) }}"
                                    class="font-medium text-blue-600 hover:underline">View</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
        @endif
    </div>
</x-app-layout>
