<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('clerk.cases.show', [request()->route('courtCase')]) }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Back
        </a>
    </x-slot>

    <div class="py-12">
        <form class="max-w-sm mx-auto" method="POST" action="{{ route('clerk.cases.parties.store', [request()->route('courtCase')]) }}">
            @csrf
            <input type="hidden" name="court_case_id" value="{{ request()->route('courtCase') }}">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                <input type="text" id="address" name="address"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            {{-- <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}"> --}}
            <div class="mb-5">
                <label for="party_type" class="block mb-2 text-sm font-medium text-gray-900">Party type</label>
                <select id="party_type" name="party_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option></option>
                    <option value="Plantiff">Plantiff</option>
                    <option value="Defendant">Defendant</option>
                    <option value="Witness">Witness</option>
                </select>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
