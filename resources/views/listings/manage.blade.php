<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Courses
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                <tr>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <h1><b>Image</b></h1>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <h1><b>Title</b></h1>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <h1><b>Actions</b></h1>
                    </td>
                </tr>
                @unless ($listings->isEmpty())
                    
                @foreach ( $listings as $listing )
                    
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <img
                            class="w-24 mr-6 mb-6"
                            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                            alt=""
                        />
                    </td>
                    
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="/listings/{{ $listing->id }}">{{ $listing->title }}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                    <x-card class="mt-4 p-2 flex space-x-6"> 
                        <a href="/listings/{{ $listing->id }}/edit">
                        <i class="fa-solid fa-pencil"></i> Edit
                    </a>
                    <form method="POST" action="/listings/{{ $listing->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">
                            <i class="fa-solid fa-trash"></i>Delete
                        </button>
                    </form>
                
                    </x-card>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t
                     border-b border-gray-300 text-lg">
                    <p class="text-center">No Listings Found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </div>
</x-layout>