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

    <!-- Modal Structure -->
<div id="image-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-50"></div>
        </div>

        <!-- Modal Content -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-sm sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3>Valitud pilt:</h3>
                <div class="sm:flex sm:items-start">
                    
                  
                        <div class="flex items-center justify-center">
                            <img id="modal-image" src="" alt="Selected Image" class="max-w-full max-h-screen object-contain">
                        </div>
                    
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse">
                <button id="close-modal" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Sulge aken</button>
            </div>
        </div>
    </div>
</div>

    <!-- JavaScript to handle button clicks -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all buttons with class 'status-button'
        var buttons = document.querySelectorAll('.status-button');

        // Get modal elements
        var modal = document.getElementById('image-modal');
        var modalImage = document.getElementById('modal-image');
        var closeModal = document.getElementById('close-modal');

        // Get the status image element
        var statusImage = document.getElementById('status-image');

        // Loop through all buttons and add a click event listener
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the image element inside the clicked button
                var image = button.querySelector('img');
                
                // Set the modal image source to the clicked image's source
                modalImage.src = image.src;

                // Get the status of the clicked button
                var status = button.getAttribute('data-status');

                // Update the status image source based on the button's status
                if (status === '1') { // Status '1' means OK
                    statusImage.src = 'https://moistatus.gametime.ee/images/1725283863.jpg'; // Update with the OK image
                } else if (status === '0') { // Status '0' means NOK
                    statusImage.src = 'https://moistatus.gametime.ee/images/1725283879.jpg'; // Update with the NOK image
                }

                // Show the modal
                modal.classList.remove('hidden');
            });
        });

        // Close modal event
        closeModal.addEventListener('click', function() {
            statusImage.src = 'https://moistatus.gametime.ee/images/1725283873.jpg';
            modal.classList.add('hidden');
        });

        // Optional: Close the modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });
</script>

</x-app-layout>
