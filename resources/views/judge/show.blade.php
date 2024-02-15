<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('judge.dashboard') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mr-4">
            View Cases
        </a>
        <a href="{{ route('judge.cases.edit', [$courtCase->id]) }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mr-4">
            Decision
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
                    @if (isset($courtCase->court))
                        <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->court->name }}</p>
                    @else
                        <p class="text-gray-600 text-lg md:text-xl">Not assigned yet</p>
                    @endif
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
                {{-- <a href="{{ route('lawyer.cases.parties.create', [$courtCase->id]) }}"
                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Add Party
                </a> --}}
                @foreach ($courtCase->parties as $party)
                    <div class="pt-12">
                        <p class="text-lg md:text-xl my-2 font-bold">Type: {{ $party->party_type }}</p>
                        <p class="text-lg md:text-xl my-2">Name: {{ $party->name }}</p>
                        <p class="text-lg md:text-xl my-2">Address: {{ $party->address }}</p>
                        <p class="text-lg md:text-xl my-2">National ID: {{ $party->national_id }}</p>
                        <p class="text-lg md:text-xl my-2">Military ID: {{ $party->military_id }}</p>
                        <p class="text-lg md:text-xl my-2">Attorney: {{ $party->attorney }}</p>
                        <p class="text-lg md:text-xl my-2">Phone: {{ $party->phone_number }}</p>
                        {{-- <div class="mt-6">
                            <form method="POST"
                                action="{{ route('lawyer.cases.parties.delete', [$courtCase->id, $party->id]) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('lawyer.cases.parties.edit', [$courtCase->id, $party->id]) }}"
                                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    Edit
                                </a>
                                <a href=""
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    Delete
                                </a>
                            </form>
                        </div> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
