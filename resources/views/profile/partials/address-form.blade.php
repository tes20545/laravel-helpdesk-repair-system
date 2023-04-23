<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('ข้อมูลโปรไฟล์') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __("อัปเดตข้อมูลโปรไฟล์และที่อยู่อีเมลของบัญชีของคุณ") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <iframe class="w-full h-80" src="https://maps.google.com/maps?q=&output=embed"></iframe>
        

        <div>
            <x-input-label for="email" :value="__('อีเมล')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
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
