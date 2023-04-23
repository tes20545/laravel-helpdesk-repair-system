<x-app-layout>
    <div class="py-12 lg:pl-80 lg:pr-9">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">

              <section>
                <header>
                    <h2 class="text-lg font-medium text-white">
                        {{ __('เพิ่มข้อมูลผู้ใช้งาน') }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-300">
                        {{ __("อัปเดตข้อมูลผู้ใช้งานและที่อยู่อีเมลของบัญชีของคุณ") }}
                    </p>
                </header>
            
                <form method="post" action="{{ route('users.store') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('post')
            
                    <div>
                        <x-input-label for="name" :value="__('ชื่อ')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
            
                    <div>
                        <x-input-label for="email" :value="__('อีเมล')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('รหัสผ่าน')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>

                    <div>
                        
                        <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">สิทธิ์การเข้าถึง</label>
                        <select id="position" name="position" class="bg-gray-900 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>เลือกสิทธิ์การเข้าถึง</option>
                        <option value="admin">ผู้ดูแลระบบ</option>
                        <option value="user">ผู้ใช้งานทั่วไป</option>
                        </select>

                    </div>
            
                    <div class="flex items-center justify-end gap-4">
                        <x-primary-button>{{ __('บันทึก') }}</x-primary-button>
            
                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                            >{{ __('บันทึกสำเร็จ') }}</p>
                        @endif
                    </div>
                </form>
            </section>
            
        </div>
    </div>
        </div>
    </div>

</x-app-layout>
