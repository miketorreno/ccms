<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('judge.cases.show', [$courtCase->id]) }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Back
        </a>
    </x-slot>

    <div class="py-12">
        <form class="max-w-xl mx-auto" method="POST" action="{{ route('judge.cases.update', [$courtCase->id]) }}">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="case_status" class="block mb-2 text-sm font-medium text-gray-900">ያለበት ሁኒታ</label>
                <select id="case_status" name="case_status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value=""></option>
                    <option value="በሂደት ላይ">በሂደት ላይ</option>
                    <option value="በቀጠሮ ላይ">በቀጠሮ ላይ</option>
                    <option value="የተወሰነ">የተወሰነ</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="app_date" class="block mb-2 text-sm font-medium text-gray-900">የቀጠሮ ቀን</label>
                <input type="date" id="app_date" name="app_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" value="{{ $courtCase->app_date }}" required>
            </div>
            <div class="mb-5">
                <label for="app_reason" class="block mb-2 text-sm font-medium text-gray-900">የቀጠሮ ምክንያት</label>
                <select id="app_reason" name="app_reason"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value=""></option>
                    <option value="ለፍርድ">ለፍርድ</option>
                    <option value="ለቃል ዝርዝር">ለቃል ዝርዝር</option>
                    <option value="ለእምነት ክህደት ቃል">ለእምነት ክህደት ቃል</option>
                    <option value="የአቃቢ ህግ ማስረጃ ለመስማት">የአቃቢ ህግ ማስረጃ ለመስማት</option>
                    <option value="የተከላካይ ጠበቃ ማስረጃ ለመስማት">የተከላካይ ጠበቃ ማስረጃ ለመስማት</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="decision" class="block mb-2 text-sm font-medium text-gray-900">ውሳኔ</label>
                <textarea name="decision" id="decision" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>{{ $courtCase->decision }}</textarea>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
