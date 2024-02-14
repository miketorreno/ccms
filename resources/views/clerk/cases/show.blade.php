<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('clerk.cases.index') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mr-4">
            View Cases
        </a>
        <a href="{{ route('clerk.cases.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Add Case
        </a>
    </x-slot>


    <div class="py-12 px-10 max-w-7xl mx-auto">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-start-1 col-end-4">
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">Case Number</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->case_number }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">Title</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->title }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">Type</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->case_type }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">Status</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->case_status }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">Cause of Action</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->cause_of_action }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">Details</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->case_details }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">Start date</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->start_date }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">End date</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->end_date }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">Court</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->court->name }}</p>
                </div>
                {{-- <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">Judge</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->judge->name }}</p>
                </div> --}}
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">Lawyer</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->lawyer->name }}</p>
                </div>
            </div>
            <div class="col-end-7 col-span-2">
                <h4 class="text-2xl font-bold my-4">Parties Involved</h4>
                <a href="{{ route('clerk.cases.parties.create', [$courtCase->id]) }}"
                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Add Party
                </a>
                @foreach ($courtCase->parties as $party)
                    <div class="pt-12">
                        <p class="text-lg md:text-xl">Name: {{ $party->name }}</p>
                        <p class="text-lg md:text-xl">Type: {{ $party->party_type }}</p>
                        <p class="text-lg md:text-xl">Address: {{ $party->address }}</p>
                        <p class="text-lg md:text-xl">Phone: {{ $party->phone_number }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
