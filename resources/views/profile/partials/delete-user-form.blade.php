<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('ลบบัญชี') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __('เมื่อบัญชีของคุณถูกลบ ทรัพยากรและข้อมูลทั้งหมดจะถูกลบอย่างถาวร ก่อนลบบัญชีของคุณ โปรดดาวน์โหลดข้อมูลใดๆ ที่คุณต้องการเก็บไว้') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('ลบบัญชี') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-white">
                {{ __('คุณแน่ใจหรือไม่ว่าต้องการลบบัญชีของคุณ?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-300">
                {{ __('เมื่อบัญชีของคุณถูกลบ ทรัพยากรและข้อมูลทั้งหมดจะถูกลบอย่างถาวร โปรดป้อนรหัสผ่านของคุณเพื่อยืนยันว่าคุณต้องการลบบัญชีของคุณอย่างถาวร') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('รหัสผ่าน') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('ยกเลิก') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('ลบบัญชี') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
