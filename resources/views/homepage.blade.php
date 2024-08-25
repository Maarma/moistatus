<x-app-layout>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
           
            <div class="flex justify-center items-center">
                <!-- Image for old.blade.php -->
                <a href="{{ route('old') }}" class="mx-2">
                    <img src="{{ asset('storage/images/old1.JPG') }}" alt="Old Image" class="">
                </a>
                <!-- Image for today.blade.php -->
                <a href="{{ route('today') }}" class="mx-2">
                    <img src="{{ asset('storage/images/today1.JPG') }}" alt="Today Image" class="">
                </a>
            </div>
            

        </div>
    </div>
</x-app-layout>