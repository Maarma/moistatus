<x-app-layout>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
           
        <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Upload Image</button>
    </form>

    @if (session('success'))
        <h2>{{ session('success') }}</h2>
        <img src="{{ asset('images/' . session('image')) }}" alt="Uploaded Image">
    @endif
            

        </div>
    </div>
</x-app-layout>