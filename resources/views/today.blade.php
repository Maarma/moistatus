<script>
    document.addEventListener('DOMContentLoaded', function () {
        const images = [
            '{{ asset('images/today1.JPG') }}',
            '{{ asset('images/today2.JPG') }}',
            '{{ asset('images/today3.JPG') }}',
            '{{ asset('images/today4.JPG') }}',
            '{{ asset('images/today5.JPG') }}',
            '{{ asset('images/today6.JPG') }}',
            '{{ asset('images/today7.JPG') }}',
            '{{ asset('images/today8.JPG') }}',
            '{{ asset('images/today9.JPG') }}',
            '{{ asset('images/today10.JPG') }}',
            '{{ asset('images/today11.JPG') }}'
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
           
          
                <img id="image-viewer" src="{{ asset('images/today1.JPG') }}" alt="today Image" class="w-[3/4] cursor-pointer">
          

        </div>
    </div>
</x-app-layout>