<x-app-layout>
    @if(request()->user()->address == null)

    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                  <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                  </svg>
                </div>
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">ยังไม่ได้เพิ่มที่อยู่</h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">กรุณาเพิ่มที่อยู่ของคุณ ทางเราจะได้ส่งช่างไปให้บริการได้ถูกจุด</p>
                  </div>
                </div>
              </div>
              <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <a href="{{ route('profile.edit') }}" type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">เพิ่มที่อยู่</a>
                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">ยกเลิก</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @else
    <div class="py-12 lg:pl-80 lg:pr-9">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-white">
                                {{ __('แจ้งซ่อมปัญหาที่เกิดขึ้น') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-300">
                                {{ __('แจ้งซ่อมปัญหาที่เกิดขึ้นเพื่อแจ้งให้แอดมินทราบ และสามารถส่งทีมช่างไปซ่อมได้') }}
                            </p>
                        </header>

                        <form method="POST" enctype="multipart/form-data" action="{{ route('helpdesk.store') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('post')

                            <div x-data="showImage()">
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-10 mb-4">
                                    <div class="space-y-1 text-center">
                                        <div class="relative flex flex-col items-center justify-center my-4">
                                            <img id="preview" class="w-full max-h-48 mb-4"
                                                style="width:auto; height:auto">
                                        </div>
                                        <div class="text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-500" viewBox="0 0 24 24"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div
                                                class="mt-4 flex text-sm items-center justify-center leading-6 text-gray-400">
                                                <label for="file_upload"
                                                    class="relative cursor-pointer rounded-md bg-gray-900 font-semibold text-white focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:ring-offset-gray-900 hover:text-indigo-500"">
                                                    <span>{{ __('อัพโหลดภาพ') }}</span>
                                                    <input id="file_upload" name="file_upload" type="file"
                                                        accept="image/*" @change="showPreview(event)" class="sr-only">
                                                </label>
                                                <p class="pl-1">หรือลากวาง</p>
                                            </div>
                                            <p class="text-xs leading-5 text-gray-400">PNG, JPG, GIF ไม่เกิน 10MB</p>
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <x-input-label for="title" :value="__('ปัญหาการใช้งาน')" />
                                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                        required autofocus />
                                    @error('title')
                                        <div class="alert alert-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="my-4">
                                    <x-input-label for="details" :value="__('รายละเอียดปัญหา')" />
                                    <textarea id="details" name="details" rows="3"
                                        class="block w-full rounded-md border-0 bg-gray-900 py-1.5 text-white shadow-sm ring-1 ring-inset ring-gray-700 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"></textarea> 
                                    @error('details')
                                        <div class="alert alert-danger text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-end gap-4">
                                    <x-primary-button>{{ __('บันทึก') }}</x-primary-button>

                                    @if (session('status') === 'profile-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600">{{ __('บันทึกสำเร็จ') }}</p>
                                    @endif
                                </div>
                        </form>
                    </section>

                </div>
            </div>
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
    @endif
</x-app-layout>
