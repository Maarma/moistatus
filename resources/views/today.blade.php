<script>
    document.addEventListener('DOMContentLoaded', function () {
        const images = [
            '{{ asset('storage/images/today1.JPG') }}',
            '{{ asset('storage/images/today2.JPG') }}',
            '{{ asset('storage/images/today3.JPG') }}',
            '{{ asset('storage/images/today4.JPG') }}',
            '{{ asset('storage/images/today5.JPG') }}',
            '{{ asset('storage/images/today6.JPG') }}',
            '{{ asset('storage/images/today7.JPG') }}',
            '{{ asset('storage/images/today8.JPG') }}',
            '{{ asset('storage/images/today9.JPG') }}',
            '{{ asset('storage/images/today10.JPG') }}',
            '{{ asset('storage/images/today11.JPG') }}'
        ];

        let currentIndex = 0;

        const imageElement = document.getElementById('image-viewer');

        function showImage(index) {
            if (index >= 0 && index < images.length) {
                imageElement.src = images[index];
                currentIndex = index;
            }
        }

        function showNextImage() {
            if (currentIndex < images.length - 1) {
                showImage(currentIndex + 1);
            }
        }

        function showPreviousImage() {
            if (currentIndex > 0) {
                showImage(currentIndex - 1);
            }
        }

        imageElement.addEventListener('click', function (event) {
            const clickX = event.clientX;
            const imageWidth = imageElement.clientWidth;
            const middleX = imageWidth / 2;

            if (clickX < middleX) {
                showPreviousImage();
            } else {
                showNextImage();
            }
        });

        showImage(currentIndex);
    });
</script>

<x-app-layout>
    <div class="py-12 ">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
           
          
                <img id="image-viewer" src="{{ asset('storage/images/today1.JPG') }}" alt="today Image" class="w-full cursor-pointer">
          

        </div>
    </div>
</x-app-layout>