<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('lawyer.cases.show', [request()->route('courtCase')]) }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Back
        </a>
        {{-- <a href="{{ route('lawyer.dashboard') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            View Cases
        </a> --}}
    </x-slot>

    <div class="py-12">
        <form class="max-w-xl mx-auto" method="POST" action="{{ route('lawyer.cases.update', [$courtCase->id]) }}">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="case_number" class="block mb-2 text-sm font-medium text-gray-900">መለያ ቁጥር</label>
                <input type="text" id="case_number" name="case_number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" value="{{ $courtCase->case_number }}" required>
            </div>
            <div class="mb-5">
                <label for="archive_number" class="block mb-2 text-sm font-medium text-gray-900">የመዝገብ ቁጥር</label>
                <input type="text" id="archive_number" name="archive_number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" value="{{ $courtCase->archive_number }}" required>
            </div>
            <div class="mb-5">
                <label for="rank" class="block mb-2 text-sm font-medium text-gray-900">የተከሳሽ ማዕረግ</label>
                <select id="rank" name="rank"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
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
                    placeholder="" value="{{ $courtCase->accused }}" required>
            </div>
            <div class="mb-5">
                <label for="accuser" class="block mb-2 text-sm font-medium text-gray-900">ከሳሽ/ክፍል</label>
                <input type="text" id="accuser" name="accuser"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" value="{{ $courtCase->accuser }}" required>
            </div>
            <div class="mb-5">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900">ዕዝ</label>
                <select id="location" name="location"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
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
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
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
                <label for="case_status" class="block mb-2 text-sm font-medium text-gray-900">ያለበት ሁኒታ</label>
                <select id="case_status" name="case_status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value=""></option>
                    <option value="በሂደት ላይ">በሂደት ላይ</option>
                    <option value="በቀጠሮ ላይ">በቀጠሮ ላይ</option>
                    <option value="የተወሰነ">የተወሰነ</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="cause_of_action" class="block mb-2 text-sm font-medium text-gray-900">የክርክሩ ሂደት</label>
                <select id="cause_of_action" name="cause_of_action"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value=""></option>
                    <option value="በራሳቸው">በራሳቸው</option>
                    <option value="በግል ጠበቃ">በግል ጠበቃ</option>
                    <option value="በተከላካይ ጠበቃ">በተከላካይ ጠበቃ</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="case_details" class="block mb-2 text-sm font-medium text-gray-900">ዝርዝር</label>
                <textarea name="case_details" id="case_details" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>{{ $courtCase->case_details }}</textarea>
            </div>
            <input type="hidden" name="clerk_id" value="{{ $courtCase->clerk_id }}">
            <input type="hidden" name="lawyer_id" value="{{ $courtCase->lawyer_id }}">
            <div class="mb-5">
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">የተመዘገበት ቀን</label>
                <input type="date" id="start_date" name="start_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" value="{{ $courtCase->start_date }}">
            </div>
            <div class="mb-5">
                <label for="app_date" class="block mb-2 text-sm font-medium text-gray-900">የቀጠሮ ቀን</label>
                <input type="date" id="app_date" name="app_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" value="{{ $courtCase->app_date }}">
            </div>
            <div class="mb-5">
                <label for="app_reason" class="block mb-2 text-sm font-medium text-gray-900">የቀጠሮ ምክንያት</label>
                <select id="app_reason" name="app_reason"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value=""></option>
                    <option value="ለፍርድ">ለፍርድ</option>
                    <option value="ለቃል ዝርዝር">ለቃል ዝርዝር</option>
                    <option value="ለእምነት ክህደት ቃል">ለእምነት ክህደት ቃል</option>
                    <option value="የአቃቢ ህግ ማስረጃ ለመስማት">የአቃቢ ህግ ማስረጃ ለመስማት</option>
                    <option value="የተከላካይ ጠበቃ ማስረጃ ለመስማት">የተከላካይ ጠበቃ ማስረጃ ለመስማት</option>
                </select>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
