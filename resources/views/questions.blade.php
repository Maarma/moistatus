<x-app-layout>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (Auth::user())
                <div>
                    <a href="/moistatused/create" class="p-4 mb-16 bg-[#C0D6DF] border-2 border-[#4F6D7A] flex items-center rounded text-black font-bold">Loo uus</a>
                </div>
            @endif
            <div class="w-full grid grid-cols-4">
            
            @foreach ($question as $question)
            <div class="flex flex-col items-center">
                <a href="/moistatus/{{ $question->id }}" class="border-2 rounded border-[#4F6D7A] bg-[#C0D6DF] w-fit py-12 px-20"><h1 class="text-2xl font-bold">Mõistatus {{ $question->id }} </h1></a>
                @if (Auth::user())
                    <div class=" text-black flex h-10 items-center">
                        <a href="/moistatused/edit/{{ $question->id }}" class="h-full w-fit flex items-center">Muuda</a>
                        <div class="w-[3px] h-6 bg-[#4F6D7A] mx-4 rounded-lg"></div>
                        <a href="/moistatused/delete/{{ $question->id }}" class="h-full w-fit flex items-center">Kustuta</a>
                    </div>
                @endif
            </div>
            @endforeach

            </div>
        </div>
    </div>
</x-app-layout>