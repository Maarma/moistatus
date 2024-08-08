<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-4 mb-4 bg-[#C0D6DF] flex items-center rounded text-black border-[#4F6D7A] border-2">
                <a href="/moistatused" class="h-full w-fit flex items-center mr-1">Tagasi</a> | Mõistatuse loomine
            </div>
            <div class="flex flex-col h-full text-center text-black lg:items-center mb-8">
                <form action="{{ route('admin.questions.create') }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="questions" id="questions" placeholder="sisesta mõistatus"  class="w-full bg-[#C0D6DF] rounded p-2 border-2 border-[#4F6D7A] mb-4">
                    <input type="submit" value="Salvesta" class="w-full bg-[#C0D6DF] rounded p-3 border-2 border-[#4F6D7A]">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>