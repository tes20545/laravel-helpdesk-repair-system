<x-app-layout>
    <div class="py-12 lg:pl-80 lg:pr-9">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">

                    <section>
                        <header>
                            <div class="flex justify-between">
                                <h2 class="text-lg font-medium text-white">
                                    {{ __('แก้ไขผู้ใช้งาน') }}
                                </h2>
                                @if($users->deleted_at == null)
                                <a x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                                    class="flex items-end justify-end">
                                    <button type="button"
                                        class="inline-flex items-center gap-x-2 rounded-md bg-red-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                          </svg>
                                          
                                        ปิดการใช้งาน
                                    </button>
                                </a>
                                @else
                                    <a x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'open-user-deletion')"
                                    class="flex items-end justify-end">
                                    <button type="button"
                                        class="inline-flex items-center gap-x-2 rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                          </svg>
                                          
                                        เปิดการใช้งาน
                                    </button>
                                    </a>
                                @endif
                            </div>
                            <p class="mt-1 text-sm text-gray-300">
                                {{ __('อัปเดตข้อมูลโปรไฟล์และที่อยู่อีเมลของบัญชีของคุณ') }}
                            </p>


                        </header>

                        <form method="post" action="{{ route('users.update', $users->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="name" :value="__('ชื่อ')" />
                                <x-text-input id="name" name="name" :value="old('email', $users->name)" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('อีเมล')" />
                                <x-text-input id="email" name="email" :value="old('email', $users->email)" type="email"
                                    class="mt-1 block w-full" required autocomplete="usersname" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div>
                                @if ($users->position == 'admin')
                                    <label for="position"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เปลี่ยนสิทธิ์การเข้าถึง</label>
                                    <select id="position" name="position"
                                        class="bg-gray-900 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="admin" selected>ผู้ดูแลระบบ</option>
                                        <option value="user">ผู้ใช้งานทั่วไป</option>
                                    </select>
                                @else
                                    <label for="position"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เปลี่ยนสิทธิ์การเข้าถึง</label>
                                    <select id="position" name="position"
                                        class="bg-gray-900 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="admin">ผู้ดูแลระบบ</option>
                                        <option value="user" selected>ผู้ใช้งานทั่วไป</option>
                                    </select>
                                @endif
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


    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('users.delete',$users->id) }}" class="p-6">
            @csrf
            @method('delete')
  
            <h2 class="text-lg font-medium text-white">
                {{ __('คุณแน่ใจหรือไม่ว่าต้องการปิดการใช้งานบัญชีนี้?') }}
            </h2>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('ยกเลิก') }}
                </x-secondary-button>
  
                <x-danger-button class="ml-3">
                    {{ __('ปิดบัญชี') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

    <x-modal name="open-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('users.recovery',$users->id) }}" class="p-6">
            @csrf
            @method('put')
  
            <h2 class="text-lg font-medium text-white">
                {{ __('คุณแน่ใจหรือไม่ว่าต้องการเปิดการใช้งานบัญชีนี้?') }}
            </h2>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('ยกเลิก') }}
                </x-secondary-button>
  
                <x-danger-button class="ml-3">
                    {{ __('เปิดบัญชี') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
