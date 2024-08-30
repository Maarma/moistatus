<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                <div class="flex flex-col w-full items-center gap-4">
                    <h1 class="text-2xl mb-6">All Images</h1>
                </div>

                @if(!empty($images))
                    <div class="grid grid-cols-3 gap-8">
                        @foreach($images as $image)
                            <div class="flex flex-col items-center">
                                <!-- Display the image -->
                                <img src="{{ asset('images/' . $image->getFilename()) }}" alt="{{ $image->getFilename() }}" class="max-w-full h-auto">

                                <!-- Display the image filename -->
                                <p class="mt-2">{{ $image->getFilename() }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No images found in the folder.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>