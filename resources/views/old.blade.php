<script>
    document.addEventListener('DOMContentLoaded', function () {
        const images = [
            '{{ asset('storage/images/old1.JPG') }}',
            '{{ asset('storage/images/old2.JPG') }}',
            '{{ asset('storage/images/old3.JPG') }}',
            '{{ asset('storage/images/old4.JPG') }}',
            '{{ asset('storage/images/old5.JPG') }}',
            '{{ asset('storage/images/old6.JPG') }}',
            '{{ asset('storage/images/old7.JPG') }}',
            '{{ asset('storage/images/old8.JPG') }}',
            '{{ asset('storage/images/old9.JPG') }}',
            '{{ asset('storage/images/old10.JPG') }}',
            '{{ asset('storage/images/old11.JPG') }}',
            '{{ asset('storage/images/old12.JPG') }}'
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
           
          
                <img id="image-viewer" src="{{ asset('storage/images/old1.JPG') }}" alt="Old Image" class="w-full cursor-pointer">
          

        </div>
    </div>
</x-app-layout>