<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-4 mb-4 bg-[#414141] flex items-center rounded text-[#FEE2C5]">
                <a href="/moistatused" class="h-full w-fit flex items-center mr-1">Tagasi</a> | Mõistatuse kustutamine
            </div>
            <div class="flex flex-col h-full  text-center text-[#FEE2C5] lg:items-center mb-8">
                <div class="flex flex-col w-full border-2 h-fit items-center text-center p-4 rounded-xl bg-[#414141] lg:flex-row-reverse lg:h-fit lg:items-start relative pb-16">
                    
                    <div class="flex flex-col w-full h-fit">
                        <div class="w-full h-full text-lg font-bold lg:w-3/4 lg:text-2xl">
                            <h1 class="text-[#FEE2C5] w-full text-start">{{ $question->question }}</h1>
                        </div>
                        <div class="pt-4 lg:pt-0 lg:flex absolute bottom-2 left-4 text-[#FEE2C5]">
                            {{ $question->created_at }}
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.questions.delete', $question->id) }}" method="post" class="w-full mt-4" enctype="multipart/form-data">
                    @csrf
                    <p class="text-red-500 font-bold mb-4 text-xl">Kas oled kindel, et soovid kustutada ees toodud Mõistatust?</p>
                    <input type="submit" value="Jah" class="w-full bg-red-500 font-bold text-black rounded p-3 mb-4">
                </form>
                <form action="/moistatused" method="get" class="w-full">

                    <input type="submit" value="Ei" class="w-full bg-[#414141] rounded p-3 mb-4">

                </form>
            </div>
        </div>
    </div>
</x-app-layout>