<div>
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
    
        <div class="mt-6 space-y-6">
    
            <iframe class="w-full h-80" src="https://maps.google.com/maps?q={{ $address }}&output=embed"></iframe>
            
            <div>
                <x-input-label for="address" :value="__('ที่อยู่')" />
                <x-text-input name="address" type="text" class="mt-1 block w-full" wire:model="address" wire:keydown="search_map" required />
            </div>
    
            <div class="flex items-center gap-4">
                <x-primary-button wire:click="save">{{ __('บันทึก') }}</x-primary-button>
    
                @if (session()->has('status'))
                    <div class="alert alert-success text-white">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </section>
    
</div>
