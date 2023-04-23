<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('ขอบคุณสำหรับการสมัคร! ก่อนเริ่มต้น คุณสามารถยืนยันที่อยู่อีเมลของคุณโดยคลิกลิงก์ที่เราเพิ่งส่งอีเมลถึงคุณได้หรือไม่ หากคุณไม่ได้รับอีเมล เรายินดีที่จะส่งใหม่ให้คุณ') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('ลิงก์ยืนยันใหม่ถูกส่งไปยังที่อยู่อีเมลที่คุณให้ไว้ระหว่างการลงทะเบียน') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('ส่งอีเมล์ยืนยันอีกครั้ง') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('ออกจากระบบ') }}
            </button>
        </form>
    </div>
</x-guest-layout>
