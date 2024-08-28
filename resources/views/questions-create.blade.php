<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-4 mb-4 bg-[#C0D6DF] flex items-center rounded text-black border-[#4F6D7A] border-2">
                <a href="/moistatused" class="h-full w-fit flex items-center mr-1">Tagasi</a> | Mõistatuse loomine
            </div>
            <div class="flex flex-col h-full text-center text-black lg:items-center mb-8">
                <form action="{{ route('admin.questions.create') }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="questions" id="questions" placeholder="sisesta mõistatus" class="w-full bg-[#C0D6DF] rounded p-2 border-2 border-[#4F6D7A] mb-4">

                    <div class="flex flex-col">
                        <label for="images" class="mb-2">Select Images:</label>
                        <input type="file" name="images[]" id="images" multiple class="mb-4" onchange="previewImages(event)">

                        <div id="image-preview" class="grid grid-cols-3 gap-4"></div>
                    </div>

                    <input type="hidden" name="selected_files" id="selected_files">
                    <input type="submit" value="Salvesta" class="w-full bg-[#C0D6DF] rounded p-3 border-2 border-[#4F6D7A]">
                </form>

                <script>
                    let selectedFiles = [];

                    function previewImages(event) {
                        const files = event.target.files;
                        const previewContainer = document.getElementById('image-preview');
                        const hiddenInput = document.getElementById('selected_files');

                        for (let i = 0; i < files.length; i++) {
                            const file = files[i];
                            selectedFiles.push({
                                file: file,
                                value: file.name
                            });

                            const reader = new FileReader();

                            reader.onload = function(e) {
                            const div = document.createElement('div');
                            div.classList.add('relative', 'flex', 'items-start', 'justify-end', 'p-2');

                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.alt = 'Image Preview';
                            img.classList.add('w-full', 'h-auto');

                            const checkbox = document.createElement('input');
                            checkbox.type = 'checkbox';
                            checkbox.name = 'image_values[]';
                            checkbox.value = file.name;
                            checkbox.classList.add('ml-2'); // margin-left for spacing
                            checkbox.checked = false;

                            const removeButton = document.createElement('button');
                            removeButton.innerText = 'Remove';
                            removeButton.type = 'button';
                            removeButton.classList.add('bg-red-500', 'text-white', 'p-1', 'rounded');
                            removeButton.onclick = function() {
                                div.remove();
                                selectedFiles = selectedFiles.filter(f => f.file !== file);
                                updateHiddenInput();
                            };

                            div.appendChild(img);

                            const controlsContainer = document.createElement('div');
                            controlsContainer.classList.add('flex', 'flex-col', 'absolute', 'top-2', 'right-2');
                            controlsContainer.appendChild(checkbox);
                            controlsContainer.appendChild(removeButton);

                            div.appendChild(controlsContainer);
                            previewContainer.appendChild(div);
                        };


                            reader.readAsDataURL(file);
                        }

                        updateHiddenInput();
                    }

                    function updateHiddenInput() {
                        const hiddenInput = document.getElementById('selected_files');
                        hiddenInput.value = JSON.stringify(selectedFiles);
                    }
                </script>
            </div>
        </div>
    </div>
</x-app-layout>