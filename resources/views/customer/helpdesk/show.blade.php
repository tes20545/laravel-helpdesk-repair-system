<x-app-layout>
    <div class="py-12 lg:pl-80 lg:pr-9">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-white">
                                {{ __('รายละเอียดการแจ้งซ่อม') }}
                            </h2>
                            
                            <p class="mt-1 text-sm text-gray-300">
                                {{ __('แจ้งซ่อมปัญหาที่เกิดขึ้นเพื่อแจ้งให้แอดมินทราบ และสามารถส่งทีมช่างไปซ่อมได้') }}
                            </p>
                        </header>

                            <div x-data="showImage()">
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-10 mb-4">
                                    <img src="{{ asset('storage/' . $data->images) }}"
                                                 id="preview" class="w-full max-h-48 mb-4"
                                                 style="width:auto; height:auto">
                                </div>

                                <div>
                                    <x-input-label for="title" :value="__('ปัญหาการใช้งาน')" />
                                    <p class="ml-2 text-white text-base">{{ $data->title }}</p>
                                </div>

                                <div class="my-4">
                                    <x-input-label for="details" :value="__('รายละเอียดปัญหา')" />
                                    <p class="ml-2 text-white text-base">{{ $data->details }}</p>
                                </div>

                                <div>
                                    <x-input-label for="details" :value="__('สถานะการดำเนินงาน')" />
                                    <p class="ml-2 text-white text-base">{{ $data->status }}</p>
                                </div>

                                <div class="my-4">
                                    <x-input-label for="details" :value="__('ช่างผู้ดูแล')" />
                                    @if($tech != null)
                                    <p class="ml-2 text-white text-base">{{ $tech->name }}</p>
                                    @else
                                    <p class="ml-2 text-white text-base">ยังไม่มีช่างผู้ดูแล</p>
                                    @endif
                                </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
