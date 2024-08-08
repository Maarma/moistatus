<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-4 mb-4 bg-[#C0D6DF] flex items-center rounded text-black border-2 border-[#4F6D7A]">
                <a href="/moistatused" class="h-full w-fit flex items-center mr-1">Tagasi</a> | Mõistatuse kustutamine
            </div>
            <div class="flex flex-col h-full  text-center text-black lg:items-center mb-8">
                <div class="flex flex-col w-full h-fit items-center text-center p-4 rounded-xl bg-[#C0D6DF] lg:flex-row-reverse lg:h-fit lg:items-start relative pb-16 border-2 border-[#4F6D7A]">
                    
                    <div class="flex flex-col w-full h-fit">
                        <div class="w-full h-full text-lg font-bold lg:w-3/4 lg:text-2xl">
                            <h1 class="text-black w-full text-start">{{ $question->question }}</h1>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.questions.delete', $question->id) }}" method="post" class="w-full mt-4" enctype="multipart/form-data">
                    @csrf
                    <p class="text-red-500 font-bold mb-4 text-xl">Kas oled kindel, et soovid kustutada ees toodud Mõistatust?</p>
                    <input type="submit" value="Jah" class="w-full bg-red-500 font-bold text-black rounded p-3 mb-4">
                </form>
                <form action="/moistatused" method="get" class="w-full">

                    <input type="submit" value="Ei" class="w-full bg-[#C0D6DF] rounded p-3 mb-4 border-2 border-[#4F6D7A]">

                </form>
            </div>
        </div>
    </div>
</x-app-layout>