<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('clerk.courts.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Add Court
        </a>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Court name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            city
                        </th>
                        <th scope="col" class="px-6 py-3">
                            state
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Zip Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Judge
                        </th>
                        {{-- <th scope="col" class="px-6 py-3"></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courts as $court)
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-950">
                                {{ $court->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $court->city }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $court->state }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $court->zip_code }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $court->user->name }}
                            </td>
                            {{-- <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
