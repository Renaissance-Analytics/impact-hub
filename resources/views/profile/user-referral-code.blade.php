<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">Referral Code</h3>

                <p class="mt-1 text-sm text-gray-600">
                    Recruit new players and earn rewards. Share your referral code with friends and family.
                </p>
            </div>

            <div class="px-4 sm:px-0">

            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-4">
                        <p class="block font-medium text-sm text-gray-700" for="current_password">
                            Current Stats:
                        </p>
                        <div>
                            <div class="flex-1 relative">
                                <p class="mt-1 block w-full">
                                    <span class="text-gray-600">Visits: </span>
                                    <span class="text-gray-900">{{ auth()->user()->referralCode->visits }}</span>
                                </p>
                                <p class="mt-1 block w-full">
                                    <span class="text-gray-600">Clicks: </span>
                                    <span class="text-gray-900">{{ auth()->user()->referralCode->clicks }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <div class="w-full px-4">
                            <p class="block font-medium text-sm text-gray-700">
                                This is your referral link:
                            </p>
                            <div
                                class="mt-4 py-2 px-4 border border-dashed border-gray-700 flex justify-center items-center rounded-md">
                                <p class="text-gray-600 dark:text-gray-400">
                                    {{ auth()->user()->referralLink() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"
                x-data="{ copied: false }">

                <div x-show="copied" x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="text-sm text-gray-600 mr-3">
                    Copied.
                </div>

                <button
                    @click="navigator.clipboard.writeText('{{ auth()->user()->referralLink() }}').then(() => { copied = true; setTimeout(() => { copied = false; }, 2000); })"
                    type="button"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Copy Referral Code
                </button>
            </div>
        </div>
    </div>
</div>
