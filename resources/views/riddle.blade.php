<x-app-layout>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                
                <div class=" flex flex-col w-full items-center gap-4">
                    <h1 class="text-2xl">Mõista Mõista mis see on...</h1>
                    <h1 class="text-3xl">{{ $question->question }}</h1>
                </div>

                @if($question->images->isNotEmpty())
                    <div class="grid grid-cols-3 grid-rows-2 gap-8 pt-8">
                        @foreach($question->images as $image)
                            <img src="{{ $image->path }}" alt="">
                        @endforeach
                    </div>
                @else
                    <p>No images available.</p>
                @endif
                <img scr="{{ asset('images/1724935772.jpg') }}" alt="?">
            </div>

        </div>
    </div>
</x-app-layout>