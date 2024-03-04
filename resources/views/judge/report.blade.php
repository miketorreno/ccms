<x-app-layout>
    <div class="py-12">
        <form class="max-w-xl mx-auto" method="POST" action="{{ route('clerk.cases.report') }}">
            @csrf
            <div class="mb-5">
                <label for="start" class="block mb-2 text-sm font-medium text-gray-900">ከቀን</label>
                <input type="date" id="start" name="start"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="end" class="block mb-2 text-sm font-medium text-gray-900">እስከ ቀን</label>
                <input type="date" id="end" name="end"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900">የክሱ አይነት</label>
                <select id="type" name="type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value=""></option>
                    <option value="ኩብለላ">ኩብለላ</option>
                    <option value="ስርቆት">ስርቆት</option>
                    <option value="ከባድ የሰው ግድያ">ከባድ የሰው ግድያ</option>
                    <option value="የጥሪ ትህዛዝ አልማክበር">የጥሪ ትህዛዝ አልማክበር</option>
                    <option value="ከባድና ቀላል የአካል ጉዳት ማድረሰ">ከባድና ቀላል የአካል ጉዳት ማድረሰ</option>
                    <option value="ሰራዊቱን ተስፋ ማስቆረጥ">ሰራዊቱን ተስፋ ማስቆረጥ</option>
                    <option value="ከስር ማምለጥ/ማስመለጥ">ከስር ማምለጥ/ማስመለጥ</option>
                    <option value="ያለሃግባብ መቅረት">ያለሃግባብ መቅረት</option>
                    <option value="ለበላይ አለመታዘዝ">ለበላይ አለመታዘዝ</option>
                    <option value="የዘብ ጥበቃ መጣስ">የዘብ ጥበቃ መጣስ</option>
                    <option value="ራስን ማቁሰል">ራስን ማቁሰል</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900">ያለበት ሁኒታ</label>
                <select id="status" name="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value=""></option>
                    <option value="በሂደት ላይ">በሂደት ላይ</option>
                    <option value="በቀጠሮ ላይ">በቀጠሮ ላይ</option>
                    <option value="የተወሰነ">የተወሰነ</option>
                </select>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-4">
                Report
            </button>
        </form>
    </div>

    <div class="py-12 max-w-7xl mx-auto">
        {{-- {{ $results['message'] }} --}}
        {{-- {{ $results }} --}}
        @if (isset($results[0]))
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
                        @foreach ($results as $result)                            
                            <tr class="odd:bg-white even:bg-gray-50 border-b">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-950">
                                    {{ $result->case_number }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $result->archive_number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $result->rank . ' ' . $result->accused }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $result->accuser }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $result->location }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $result->case_type }}
                                </td>
                                <td class="px-6 py-4" colspan="2">
                                    @if ($result->case_status == 'በሂደት ላይ')
                                        <span
                                            class="bg-yellow-500 text-white text-xs p-2 rounded-full">{{ $result->case_status }}</span>
                                    @elseif ($result->case_status == 'በቀጠሮ ላይ')
                                        <span
                                            class="bg-green-700 text-white text-xs p-2 rounded-full">{{ $result->case_status }}</span>
                                    @else
                                        <span
                                            class="bg-red-800 text-white text-xs p-2 rounded-full">{{ $result->case_status }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $result->cause_of_action }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $result->case_details }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $result->start_date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $result->app_date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $result->app_reason }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('judge.cases.show', [$result->id]) }}"
                                        class="font-medium text-blue-600 hover:underline">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif (isset($results['message']))
            <div class="py-12">
                <h3 class="text-3xl font-bold text-center dark:text-white my-16">{{ $results['message'] }}</h3>
            </div>
        @else
        @endif
    </div>
</x-app-layout>
