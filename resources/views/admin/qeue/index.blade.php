<x-app-layout>
    <div class="py-12 lg:pl-80 lg:pr-9">
        <div class="max-w-full mx-auto">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                  <h1 class="text-base font-semibold leading-6 text-white">คิวช่าง</h1>
                  <p class="mt-2 text-sm text-gray-400">จัดการวันและเวลาที่เหมาะสมให้ช่างแต่ละคน</p>
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
                      <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">ชื่อช่าง</th>
                      <th scope="col" class="hidden py-2 pl-0 pr-8 font-semibold sm:table-cell">อีเมล</th>
                      <th scope="col" class="py-2 pl-0 pr-4 text-right font-semibold sm:pr-8 sm:text-left lg:pr-20">เบอร์โทรศัพท์</th>
                      <th scope="col" class="hidden py-2 pl-0 pr-8 font-semibold md:table-cell lg:pr-20">คิวช่าง</th>
                      <th scope="col" class="hidden py-2 pl-0 pr-4 text-right font-semibold sm:table-cell sm:pr-6 lg:pr-8"></th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-white/5">
                    @foreach ($data as $user)
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
                            <div class="flex rounded-md bg-gray-700/40 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-white/10">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 pr-1 text-green-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              
                              ยืนยันแล้ว
                            </div>
                            @else
                            <div class="flex rounded-md bg-gray-700/40 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-white/10">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 pr-1 text-red-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              
                              ยังไม่ยืนยัน
                            </div>
                            @endif
                          </div>
                        </td>
                        <td class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8">
                          <div class="flex items-center gap-x-4">
                            <div class="truncate text-sm font-medium leading-6 text-white">{{ $user->telephone ?? 'ยังไม่มี' }}</div>
                          </div>
                        </td>
                        <td class="hidden py-4 pl-0 pr-8 text-sm leading-6 text-gray-400 md:table-cell lg:pr-20">{{ $user->qeue ?? 'ยังไม่จัดคิว' }}</td>
                        <td class="hidden py-4 pl-0 pr-4 text-right text-sm leading-6 text-gray-400 sm:table-cell sm:pr-6 lg:pr-8">
                          <a href="{{ route('qeue.edit',$user->id) }}">
                            <button type="button" class="inline-flex items-center gap-x-2 rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                            แก้ไข
                          </button>
                        </a>
                        </td>
                        <td class="hidden py-4 pl-0 pr-4 text-right text-sm leading-6 text-gray-400 sm:table-cell sm:pr-6 lg:pr-8">
                          
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</x-app-layout>
