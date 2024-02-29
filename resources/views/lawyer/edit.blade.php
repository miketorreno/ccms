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
                <label for="rank" class="block mb-2 text-sm font-medium text-gray-900">ማዕረግ</label>
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
                <label for="accuser" class="block mb-2 text-sm font-medium text-gray-900">ከሳሽ/ክፍል</label>
                <input type="text" id="accuser" name="accuser"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="case_type" class="block mb-2 text-sm font-medium text-gray-900">የክሱ አይነት</label>
                <input type="text" id="case_type" name="case_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" value="{{ $courtCase->case_type }}" required>
            </div>
            <div class="mb-5">
                <label for="case_status" class="block mb-2 text-sm font-medium text-gray-900">ያለበት ሁኒታ</label>
                <input type="text" id="case_status" name="case_status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" value="{{ $courtCase->case_status }}" disabled required>
            </div>
            <div class="mb-5">
                <label for="cause_of_action" class="block mb-2 text-sm font-medium text-gray-900">የክርክሩ ሂደት</label>
                <input type="text" id="cause_of_action" name="cause_of_action"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" value="{{ $courtCase->cause_of_action }}" required>
            </div>
            <div class="mb-5">
                <label for="case_details" class="block mb-2 text-sm font-medium text-gray-900">ዝርዝር</label>
                <textarea name="case_details" id="case_details" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>{{ $courtCase->case_details }}</textarea>
            </div>
            <input type="hidden" name="clerk_id" value="{{ $courtCase->clerk_id }}">
            <input type="hidden" name="lawyer_id" value="{{ auth()->user()->id }}">
            <div class="mb-5">
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">የተመዘገበት ቀን</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="start_date" name="start_date" datepicker type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date" value="{{ $courtCase->start_date }}" required>
                </div>
            </div>
            <div class="mb-5">
                <label for="app_date" class="block mb-2 text-sm font-medium text-gray-900">የቀጠሮ ቀን</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="app_date" name="app_date" datepicker type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date" value="{{ $courtCase->start_date }}" required>
                </div>
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
