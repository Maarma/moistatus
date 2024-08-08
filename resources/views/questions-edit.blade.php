<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-4 mb-4 bg-[#414141] flex items-center rounded text-[#FEE2C5]">
                <a href="/moistatused" class="h-full w-fit flex items-center mr-1">Tagasi</a> | Mõistatuse muutmine
            </div>
            <div class="flex flex-col h-full  text-center text-[#FEE2C5] lg:items-center mb-8">
                <form action="{{ route('admin.questions.update') }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $question->id }}">
                    <input type="text" name="question" id="question" class="w-full bg-[#414141] rounded mb-4 border-none" value="{{ $question->question }}">
                    <input type="submit" value="Salvesta" class="w-full bg-[#414141] rounded p-3">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>