<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('lawyer.cases.show', [request()->route('courtCase')]) }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg w-full sm:w-auto px-5 py-2.5 text-center">
            Back
        </a>
    </x-slot>

    <div class="py-12">
        <form class="max-w-sm mx-auto" method="POST"
            action="{{ route('lawyer.cases.documents.store', [request()->route('courtCase')]) }}"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="court_case_id" value="{{ request()->route('courtCase') }}">
            {{-- <div class="mb-5">
                <label for="document" class="block mb-2 font-medium text-gray-900">Document</label>
                <input type="file" id="document" name="document"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div> --}}

            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <input type="text" id="description" name="description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="" required>
            </div>

            <div class="mb-6 max-w-lg mx-auto">
                <label class="block mb-2 font-medium text-gray-900 dark:text-white" for="document">Document</label>
                <input
                    class="block w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="document" name="document" type="file">
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg w-full sm:w-auto px-5 py-2.5 text-center">
                Upload
            </button>
        </form>
    </div>
</x-app-layout>
