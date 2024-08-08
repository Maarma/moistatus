<x-app-layout>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div>
                <div class=" flex flex-col w-full items-center gap-4">
                    <h1 class="text-2xl">Mõista Mõista mis see on...</h1>
                    <h1 class="text-3xl">{{ $question->question }}</h1>
                </div>

                <div class="grid grid-cols-3 grid-rows-2 gap-8 pt-8">
                    <img src="https://images.pexels.com/photos/417074/pexels-photo-417074.jpeg?cs=srgb&dl=pexels-souvenirpixels-417074.jpg&fm=jpg" alt="">
                    <img src="https://images.pexels.com/photos/417074/pexels-photo-417074.jpeg?cs=srgb&dl=pexels-souvenirpixels-417074.jpg&fm=jpg" alt="">
                    <img src="https://images.pexels.com/photos/417074/pexels-photo-417074.jpeg?cs=srgb&dl=pexels-souvenirpixels-417074.jpg&fm=jpg" alt="">
                    <img src="https://images.pexels.com/photos/417074/pexels-photo-417074.jpeg?cs=srgb&dl=pexels-souvenirpixels-417074.jpg&fm=jpg" alt="">
                    <img src="https://images.pexels.com/photos/417074/pexels-photo-417074.jpeg?cs=srgb&dl=pexels-souvenirpixels-417074.jpg&fm=jpg" alt="">
                </div>
            </div>

        </div>
    </div>
</x-app-layout>