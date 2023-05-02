<x-app-layout>
    <div class="py-12 lg:pl-80 lg:pr-9">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">

                    <section>
                        <header>
                            <div class="flex justify-between">
                            <h2 class="text-lg font-medium text-white">
                                {{ __('แจ้งซ่อมปัญหาที่เกิดขึ้น') }}
                            </h2>
                            </div>

                            <p class="mt-1 text-sm text-gray-300">
                                {{ __('แจ้งซ่อมปัญหาที่เกิดขึ้นเพื่อแจ้งให้แอดมินทราบ และสามารถส่งทีมช่างไปซ่อมได้') }}
                            </p>
                        </header>

                        <form method="POST" enctype="multipart/form-data" action="{{ route('helpdesk.update',$data->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <div x-data="showImage()">
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-10 mb-4">
                                    <div class="space-y-1 text-center">
                                        <div class="relative flex flex-col items-center justify-center my-4">
                                        @if ($data->images == null)
                                            <img 
                                                 id="preview" class="w-full max-h-48 mb-4"
                                                 style="width:auto; height:auto">
                                        @else
                                            <img src="{{ asset('storage/' . $data->images) }}"
                                                 id="preview" class="w-full max-h-48 mb-4"
                                                 style="width:auto; height:auto">
                                        @endif
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <x-input-label for="title" :value="__('ปัญหาการใช้งาน')" />
                                    <x-text-input id="title" name="title" value="{{ $data->title }}" type="text" class="mt-1 block w-full"
                                        disabled />
                                    @error('title')
                                        <div class="alert alert-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="my-4">
                                    <x-input-label for="details" :value="__('รายละเอียดปัญหา')" />
                                    <textarea id="details" name="details" rows="3" disabled
                                        class="block w-full rounded-md border-0 bg-gray-900 py-1.5 text-white shadow-sm ring-1 ring-inset ring-gray-700 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">{{ $data->details }}</textarea> 
                                    @error('details')
                                        <div class="alert alert-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>     
                        </form>
                    </section>

                </div>
            </div>
            <livewire:admin-change-status :id_helpdesk="$data->id"/>
        </div>
    </div>


    <script>
        // preview images
        document.getElementById('logo').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        function showImage() {
            return {
                showPreview(event) {
                    let src = URL.createObjectURL(event.target.files[0]);
                    let preview = document.getElementById("preview");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }
        }
    </script>
</x-app-layout>
