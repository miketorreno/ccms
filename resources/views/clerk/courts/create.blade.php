<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('clerk.courts.index') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            View Courts
        </a>
    </x-slot>

    <div class="py-12">
        <form class="max-w-sm mx-auto" method="POST" action="{{ route('clerk.courts.store') }}">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="city" class="block mb-2 text-sm font-medium text-gray-900">City</label>
                <input type="text" id="city" name="city"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="state" class="block mb-2 text-sm font-medium text-gray-900">State</label>
                <input type="text" id="state" name="state"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="zip_code" class="block mb-2 text-sm font-medium text-gray-900">Zip Code</label>
                <input type="text" id="zip_code" name="zip_code"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>
            <div class="mb-5">
                <label for="judge_id" class="block mb-2 text-sm font-medium text-gray-900">Judge</label>
                <select id="judge_id" name="judge_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="">Choose</option>
                    @foreach ($judges as $judge)
                        <option value="{{ $judge->id }}">{{ $judge->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
