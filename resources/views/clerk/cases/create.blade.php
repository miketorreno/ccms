<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('clerk.cases.index') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            View Cases
        </a>
    </x-slot>

    <div class="py-12">
        <form class="max-w-xl mx-auto" method="POST" action="{{ route('clerk.cases.store') }}">
            @csrf
            <div class="mb-5">
                <label for="case_number" class="block mb-2 text-sm font-medium text-gray-900">መለያ ቁጥር</label>
                <input type="text" id="case_number" name="case_number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="archive_number" class="block mb-2 text-sm font-medium text-gray-900">የመዝገብ ቁጥር</label>
                <input type="text" id="archive_number" name="archive_number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="rank" class="block mb-2 text-sm font-medium text-gray-900">የተከሳሽ ማዕረግ</label>
                <select id="rank" name="rank"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value=""></option>
                    <option value="መ/ወ/ር">መ/ወ/ር</option>
                    <option value="ም/፲/አ">ም/፲/አ</option>
                    <option value="፲/አ">፲/አ</option>
                    <option value="፶/አ">፶/አ</option>
                    <option value="ም/አ">ም/አ</option>
                    <option value="መ/አ">መ/አ</option>
                    <option value="ሻ/ል">ሻ/ል</option>
                    <option value="ኮ/ል">ኮ/ል</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="accused" class="block mb-2 text-sm font-medium text-gray-900">ተከሳሽ</label>
                <input type="text" id="accused" name="accused"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="accuser" class="block mb-2 text-sm font-medium text-gray-900">ከሳሽ/ክፍል</label>
                <input type="text" id="accuser" name="accuser"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900">ዕዝ</label>
                <select id="location" name="location"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value=""></option>
                    <option value="ምዕራብ ዕዝ">ምዕራብ ዕዝ</option>
                    <option value="ሰሜን ምዕራብ ዕዝ">ሰሜን ምዕራብ ዕዝ</option>
                    <option value="ማዕከላዊ ዕዝ">ማዕከላዊ ዕዝ</option>
                    <option value="ደቡብ ዕዝ">ደቡብ ዕዝ</option>
                    <option value="6ኛ ዕዝ">6ኛ ዕዝ</option>
                    <option value="7ኛ ዕዝ">7ኛ ዕዝ</option>
                    <option value="አየር ሃይል">አየር ሃይል</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="case_type" class="block mb-2 text-sm font-medium text-gray-900">የክሱ አይነት</label>
                <select id="case_type" name="case_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
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
            <input type="hidden" name="case_status" value="በሂደት ላይ">
            {{-- <div class="mb-5">
                <label for="case_status" class="block mb-2 text-sm font-medium text-gray-900">ያለበት ሁኒታ</label>
                <input type="text" id="case_status" name="case_status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div> --}}
            <div class="mb-5">
                <label for="cause_of_action" class="block mb-2 text-sm font-medium text-gray-900">የክርክሩ ሂደት</label>
                <select id="cause_of_action" name="cause_of_action"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value=""></option>
                    <option value="በራሳቸው">በራሳቸው</option>
                    <option value="በግል ጠበቃ">በግል ጠበቃ</option>
                    <option value="በተከላካይ ጠበቃ">በተከላካይ ጠበቃ</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="case_details" class="block mb-2 text-sm font-medium text-gray-900">ዝርዝር</label>
                <textarea name="case_details" id="case_details" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>
            </div>
            {{-- <div class="mb-5">
                <label for="court_id" class="block mb-2 text-sm font-medium text-gray-900">ችሎት</label>
                <select id="court_id" name="court_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value=""></option>
                    @foreach ($courts as $court)
                        <option value="{{ $court->id }}">{{ $court->name }}</option>
                    @endforeach
                </select>
            </div> --}}
            <input type="hidden" name="clerk_id" value="{{ auth()->user()->id }}">
            <div class="mb-5">
                <label for="lawyer_id" class="block mb-2 text-sm font-medium text-gray-900">አቃቤ ህግ</label>
                <select id="lawyer_id" name="lawyer_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value=""></option>
                    @foreach ($lawyers as $lawyer)
                        <option value="{{ $lawyer->id }}">{{ $lawyer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">የተመዘገበት ቀን</label>
                <input type="date" id="start_date" name="start_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            {{-- <div class="mb-5">
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">የተመዘገበት ቀን</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="start_date" name="start_date" datepicker type="datetime"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date">
                </div>
            </div> --}}
            {{-- <div class="mb-5">
                <label for="app_date" class="block mb-2 text-sm font-medium text-gray-900">የቀጠሮ ቀን</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="app_date" name="app_date" datepicker type="datetime-local"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date">
                </div>
            </div> --}}
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
