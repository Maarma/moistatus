<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-4 mb-4 bg-[#414141] flex items-center rounded text-[#FEE2C5]">
                <a href="/questions" class="h-full w-fit flex items-center mr-1">Uudised</a> | Postituse loomine
            </div>
            <div class="flex flex-col h-full  text-center text-[#FEE2C5] lg:items-center mb-8">
                <form action="{{ route('admin.questions.create') }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="questions" id="questions"  class="w-full bg-[#414141] rounded p-2 border border-solid border-gray-700 mb-4">
                    <input type="submit" value="Salvesta" class="w-full bg-[#414141] rounded p-3">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>