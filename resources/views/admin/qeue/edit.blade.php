<x-app-layout>
    <div class="py-12 lg:pl-80 lg:pr-9">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">

                    <section>
                        <header>
                            <div class="flex justify-between">
                                <h2 class="text-lg font-medium text-white">
                                    {{ __('แก้ไขข้อมูลช่าง') }}
                                </h2>
                            </div>
                            <p class="mt-1 text-sm text-gray-300">
                                {{ __('อัปเดตข้อมูลช่างและคิววันว่างของช่างผู้ดำเนินการ') }}
                            </p>


                        </header>

                        <form method="post" action="{{ route('qeue.update', $data->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="name" :value="__('ชื่อ')" />
                                <x-text-input id="name" name="name" :value="old('email', $data->name)" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('อีเมล')" />
                                <x-text-input id="email" name="email" :value="old('email', $data->email)" type="email"
                                    class="mt-1 block w-full" required autocomplete="usersname" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('เบอร์โทรศัพท์')" />
                                <x-text-input id="telephone" name="telephone" :value="old('telephone', $data->telephone)" type="number"
                                    class="mt-1 block w-full" required autofocus autocomplete="name" />
                            </div>

                            <div>
                                <x-input-label for="qeue" :value="__('คิวช่าง')" />
                                    <select id="qeue" name="qeue"
                                        class="bg-gray-900 mt-2 block w-full rounded-md border-0 py-2.5 pl-3 pr-10 text-white ring-1 ring-inset ring-gray-700 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option selected>เลือกวันว่าง</option>
                                        <option>จันทร์ เช้า-เที่ยง</option>
                                        <option>จันทร์ บ่าย-เย็น</option>
                                        <option>อังคาร เช้า-เที่ยง</option>
                                        <option>อังคาร บ่าย-เย็น</option>
                                        <option>พุธ เช้า-เที่ยง</option>
                                        <option>พุธ บ่าย-เย็น</option>
                                        <option>พฤหัสบดี เช้า-เที่ยง</option>
                                        <option>พฤหัสบดี บ่าย-เย็น</option>
                                        <option>ศุกร์ เช้า-เที่ยง</option>
                                        <option>ศุกร์ บ่าย-เย็น</option>
                                        <option>เสาร์ เช้า-เที่ยง</option>
                                        <option>เสาร์ บ่าย-เย็น</option>
                                    </select>

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
</x-app-layout>
