<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                <div class="flex flex-col w-full items-center gap-4">
                    <h1 class="text-2xl">Mõista Mõista mis see on...</h1>
                    <h1 class="text-3xl">{{ $question->question }}</h1>
                </div>

                @if($question->images->isNotEmpty())
                    <div class="grid grid-cols-3 grid-rows-2 gap-8 pt-8">
                        @foreach($question->images as $image)
                            <button class="status-button" data-status="{{ $image->isCorrectAnswer }}">
                                <img src="{{ $image->path }}" alt="">
                            </button>
                        @endforeach
                    <!-- Image that changes based on button press -->
                    <div class="flex justify-center pt-8">
                        <img id="status-image" src="https://moistatus.gametime.ee/images/1725283873.jpg" alt="Status Image">
                    </div>
                    </div>
                @else
                    <p>No images available.</p>
                @endif
                <div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle button clicks -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all buttons with class 'status-button'
            var buttons = document.querySelectorAll('.status-button');

            // Loop through all buttons and add a click event listener
            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Get the status of the clicked button
                    var status = button.getAttribute('data-status');

                    // Get the image element to update
                    var statusImage = document.getElementById('status-image');

                    // Update the image source based on the button's status
                    if (status === '1') { // Status '1' means OK
                        statusImage.src = 'https://moistatus.gametime.ee/images/1725283863.jpg'; // Update with the OK image
                    } else if (status === '0') { // Status '0' means NOK
                        statusImage.src = 'https://moistatus.gametime.ee/images/1725283879.jpg'; // Update with the NOK image
                    }
                });
            });
        });
    </script>
</x-app-layout>
