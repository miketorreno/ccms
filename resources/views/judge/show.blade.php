<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('judge.dashboard') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mr-4">
            View Cases
        </a>
        <a href="{{ route('judge.cases.edit', [$courtCase->id]) }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mr-4">
            ውሳኔ
        </a>
    </x-slot>

    <div class="py-12 px-10 max-w-7xl mx-auto">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-start-1 col-end-3">
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">መለያ ቁጥር</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->case_number }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">መዝገብ ቁጥር</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->archive_number }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">ተከሳሽ</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->rank . ' ' . $courtCase->accused }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">ከሳሽ/ክፍል</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->accuser }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">ዕዝ</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->location }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">የክሱ አይነት</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->case_type }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">ያለበት ሁኒታ</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->case_status }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">የክርክሩ ሂደት</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->cause_of_action }}</p>
                </div>
            </div>
            <div class="col-start-4 col-end-7">
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">ዝርዝር</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->case_details }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">ውሳኔ</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->decision }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">የተመዘገበት ቀን</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->start_date }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">የቀጠሮ ቀን</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->app_date }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">የቀጠሮ ምክንያት</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->app_reason }}</p>
                </div>
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">ችሎት</h6>
                    @if (isset($courtCase->court))
                        <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->court->name }}</p>
                    @else
                        <p class="text-gray-600 text-lg md:text-xl"></p>
                    @endif
                </div>
                {{-- <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">Judge</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->judge->name }}</p>
                </div> --}}
                <div class="mb-10">
                    <h6 class="mb-1 font-bold text-xl md:text-xl">አቃቤ ህግ</h6>
                    <p class="text-gray-600 text-lg md:text-xl">{{ $courtCase->lawyer->name }}</p>
                </div>
            </div>
            <div class="col-start-7 col-end-12">
                <h4 class="text-2xl font-bold my-4">Parties Involved</h4>
                {{-- <a href="{{ route('lawyer.cases.parties.create', [$courtCase->id]) }}"
                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Add Party
                </a> --}}
                @foreach ($courtCase->parties as $party)
                    <div class="pt-8">
                        <div
                            class="max-w-sm p-6 bg-white border border-gray-500 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <p class="text-lg md:text-xl my-2 font-bold">Party type: {{ $party->party_type }}</p>
                            <p class="text-lg md:text-xl my-2">Name: {{ $party->name }}</p>
                            <p class="text-lg md:text-xl my-2">Address: {{ $party->address }}</p>
                            <p class="text-lg md:text-xl my-2">National ID: {{ $party->national_id }}</p>
                            <p class="text-lg md:text-xl my-2">Military ID: {{ $party->military_id }}</p>
                            <p class="text-lg md:text-xl my-2">Educational status: {{ $party->education }}</p>
                            <p class="text-lg md:text-xl my-2">Marital status: {{ $party->marriage }}</p>
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
                    </div>
                @endforeach
            </div>
            <div class="">
                <hr>
                <div class="my-12">
                    <h3 class="text-3xl font-bold my-4 text-center">Documents</h3>
                    {{-- <a href="{{ route('lawyer.cases.documents.create', [$courtCase->id]) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mr-4">
                        Upload
                    </a> --}}
                    {{-- <div class="my-7"></div> --}}
                    @foreach ($courtCase->documents as $document)
                        <div class="pt-8">
                            <p class="text-lg md:text-xl my-4 font-bold">Description: {{ $document->description }}</p>
                            <p class="text-lg md:text-xl my-4 font-bold">Type: {{ $document->document_type }}</p>
                            <a href="{{ $document->path }}"
                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                Download
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
