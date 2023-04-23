<x-app-layout>
    <div class="py-12 lg:pl-80 lg:pr-9">
        <div class="max-w-full mx-auto">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                  <h1 class="text-base font-semibold leading-6 text-white">ผู้ใช้งาน</h1>
                  <p class="mt-2 text-sm text-gray-400">รายชื่อผู้ใช้ทั้งหมดในบัญชีของคุณ รวมถึงชื่อ ตำแหน่ง อีเมล และบทบาท</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                  <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    เพิ่มผู้ใช้งาน
                  </button>
                </div>
              </div>

            <div class="bg-gray-900 py-4">
                <table class="mt-6 w-full whitespace-nowrap text-left">
                  <colgroup>
                    <col class="w-full sm:w-4/12">
                    <col class="lg:w-4/12">
                    <col class="lg:w-2/12">
                    <col class="lg:w-1/12">
                    <col class="lg:w-1/12">
                  </colgroup>
                  <thead class="border-b border-white/10 text-sm leading-6 text-white">
                    <tr>
                      <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">ชื่อผู้ใช้</th>
                      <th scope="col" class="hidden py-2 pl-0 pr-8 font-semibold sm:table-cell">อีเมล</th>
                      <th scope="col" class="py-2 pl-0 pr-4 text-right font-semibold sm:pr-8 sm:text-left lg:pr-20">Status</th>
                      <th scope="col" class="hidden py-2 pl-0 pr-8 font-semibold md:table-cell lg:pr-20">ฐานะบัญชี</th>
                      <th scope="col" class="hidden py-2 pl-0 pr-4 text-right font-semibold sm:table-cell sm:pr-6 lg:pr-8">แก้ไข</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-white/5">
                    @foreach ($user_data as $user)
                    <tr>
                        <td class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8">
                          <div class="flex items-center gap-x-4">
                            <div class="truncate text-sm font-medium leading-6 text-white">{{ $user->name }}</div>
                          </div>
                        </td>
                        <td class="hidden py-4 pl-0 pr-4 sm:table-cell sm:pr-8">
                          <div class="flex gap-x-3">
                            <div class="font-mono text-sm leading-6 text-gray-400">{{ $user->email }}</div>
                            @if($user->email_verified_at != null)
                            <div class="rounded-md bg-gray-700/40 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-white/10">ยืนยันแล้ว</div>
                            @else
                            <div class="rounded-md bg-gray-700/40 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-white/10">ยังไม่ยืนยัน</div>
                            @endif
                          </div>
                        </td>
                        <td class="py-4 pl-0 pr-4 text-sm leading-6 sm:pr-8 lg:pr-20">
                          <div class="flex items-center justify-end gap-x-2 sm:justify-start">
                            <time class="text-gray-400 sm:hidden" datetime="2023-01-23T11:00">45 minutes ago</time>
                            <div class="flex-none rounded-full p-1 text-green-400 bg-green-400/10">
                              <div class="h-1.5 w-1.5 rounded-full bg-current"></div>
                            </div>
                            <div class="hidden text-white sm:block">Completed</div>
                          </div>
                        </td>
                        <td class="hidden py-4 pl-0 pr-8 text-sm leading-6 text-gray-400 md:table-cell lg:pr-20">25s</td>
                        <td class="hidden py-4 pl-0 pr-4 text-right text-sm leading-6 text-gray-400 sm:table-cell sm:pr-6 lg:pr-8">
                          <time datetime="2023-01-23T11:00">45 minutes ago</time>
                        </td>
                      </tr>
                    @endforeach
                    
                    <tr>
                      <td class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8">
                        <div class="flex items-center gap-x-4">
                          <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-8 w-8 rounded-full bg-gray-800">
                          <div class="truncate text-sm font-medium leading-6 text-white">Courtney Henry</div>
                        </div>
                      </td>
                      <td class="hidden py-4 pl-0 pr-4 sm:table-cell sm:pr-8">
                        <div class="flex gap-x-3">
                          <div class="font-mono text-sm leading-6 text-gray-400">11464223</div>
                          <div class="rounded-md bg-gray-700/40 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-white/10">main</div>
                        </div>
                      </td>
                      <td class="py-4 pl-0 pr-4 text-sm leading-6 sm:pr-8 lg:pr-20">
                        <div class="flex items-center justify-end gap-x-2 sm:justify-start">
                          <time class="text-gray-400 sm:hidden" datetime="2023-01-23T00:00">12 hours ago</time>
                          <div class="flex-none rounded-full p-1 text-rose-400 bg-rose-400/10">
                            <div class="h-1.5 w-1.5 rounded-full bg-current"></div>
                          </div>
                          <div class="hidden text-white sm:block">Error</div>
                        </div>
                      </td>
                      <td class="hidden py-4 pl-0 pr-8 text-sm leading-6 text-gray-400 md:table-cell lg:pr-20">1m 4s</td>
                      <td class="hidden py-4 pl-0 pr-4 text-right text-sm leading-6 text-gray-400 sm:table-cell sm:pr-6 lg:pr-8">
                        <time datetime="2023-01-23T00:00">12 hours ago</time>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
    </div>

</x-app-layout>
