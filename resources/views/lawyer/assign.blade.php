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
                <label for="court_id" class="block mb-2 text-sm font-medium text-gray-900">ችሎት</label>
                <select id="court_id" name="court_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="">Choose</option>
                    @foreach ($courts as $court)
                        <option value="{{ $court->id }}">{{ $court->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Assign
            </button>
        </form>
    </div>
</x-app-layout>
