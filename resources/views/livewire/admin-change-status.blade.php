<div>
    <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-full">
            <div>
                <label class="text-lg font-semibold text-white">สถานะการดำเนินการ</label>
                <fieldset class="mt-4">
                    <legend class="sr-only">Notification method</legend>
                    <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                        <div class="flex items-center">
                            @if ($status_now->status == 'pending')
                                <input id="email" name="notification-method" type="radio"
                                    wire:click="status('pending')" checked
                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                <label for="email"
                                    class="ml-3 block text-sm font-medium leading-6 text-white">รอการดำเนินการ</label>
                            @else
                                <input id="email" name="notification-method" type="radio"
                                    wire:click="status('pending')"
                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                <label for="email"
                                    class="ml-3 block text-sm font-medium leading-6 text-white">รอการดำเนินการ</label>
                            @endif
                        </div>
                        <div class="flex items-center">
                            @if ($status_now->status == 'process')
                                <input id="sms" name="notification-method" type="radio"
                                    wire:click="status('process')" checked
                                    class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                                <label for="sms"
                                    class="ml-3 block text-sm font-medium leading-6 text-white">กำลังดำเนินการ</label>
                            @else
                                <input id="sms" name="notification-method" type="radio"
                                    wire:click="status('process')"
                                    class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-400">
                                <label for="sms"
                                    class="ml-3 block text-sm font-medium leading-6 text-white">กำลังดำเนินการ</label>
                            @endif
                        </div>
                        <div class="flex items-center">
                            @if ($status_now->status == 'success')
                                <input id="sms" name="notification-method" type="radio"
                                    wire:click="status('success')" checked
                                    class="h-4 w-4 border-gray-300 text-green-600 focus:ring-green-600">
                                <label for="sms"
                                    class="ml-3 block text-sm font-medium leading-6 text-white">สำเร็จ</label>
                            @else
                                <input id="sms" name="notification-method" type="radio"
                                    wire:click="status('success')"
                                    class="h-4 w-4 border-gray-300 text-green-600 focus:ring-green-600">
                                <label for="sms"
                                    class="ml-3 block text-sm font-medium leading-6 text-white">สำเร็จ</label>
                            @endif
                        </div>
                        <div class="flex items-center">
                            @if ($status_now->status == 'cancel')
                                <input id="sms" name="notification-method" type="radio"
                                    wire:click="status('cancel')" checked
                                    class="h-4 w-4 border-gray-300 text-red-600 focus:ring-red-600">
                                <label for="sms"
                                    class="ml-3 block text-sm font-medium leading-6 text-white">ยกเลิก</label>
                            @else
                                <input id="sms" name="notification-method" type="radio"
                                    wire:click="status('cancel')"
                                    class="h-4 w-4 border-gray-300 text-red-600 focus:ring-red-600">
                                <label for="sms"
                                    class="ml-3 block text-sm font-medium leading-6 text-white">ยกเลิก</label>
                            @endif
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <div class="mt-6 p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
      <div class="max-w-full">
          <div>
              <label class="text-lg font-semibold text-white">เลือกช่างผู้ดำเนินการ</label>
                <select id="location" name="location" wire:model="tech_id" wire:click="technical" class="bg-gray-900 mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-white ring-1 ring-inset ring-gray-700 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  <option selected>เลือกช่างผู้ดำเนินการ</option>
                  @foreach($technic as $t)
                  <option value="{{ $t->id }}">ชื่อ : {{ $t->name }} วันที่สะดวก: {{ $t->qeue }}</option>
                  @endforeach
                </select>
          </div>
      </div>
  </div>
        
</div>
</div>
