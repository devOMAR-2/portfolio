@php
    use Carbon\Carbon;

    $message = null;
    $hour = Carbon::now()->hour;
    $nightStart = 20;
    $morningStart = 6;
    $afternoonStart = 12;
    $eveningStart = 17;

    // Cover the extreme case of a fantasy world where night start at 0 and morning start at 1
    $nightStart = $nightStart === 0 ? 24 : $nightStart;

    $key = match (true) {
        $hour >= $nightStart || $hour < $morningStart => 'night',
        $hour < $afternoonStart => 'morning',
        $hour < $eveningStart => 'afternoon',
        default => 'evening',
    };

    $message = fn() => match ($key) {
        'morning' => 'Good morning ☀️,',
        'afternoon' => 'Good afternoon 🌤️,',
        'evening' => 'Good evening 🌆,',
        'night' => 'Working late? Good night 🌙,',
    };
@endphp

<x-filament-widgets::widget class="fi-account-widget">
    <x-filament::section>
        <div class="flex w-full items-center justify-between gap-x-3">
            <div class="flex items-center gap-6">
                <x-filament-panels::avatar.user :src="filament()->getUserAvatarUrl(filament()->auth()->user())" :user="filament()->auth()->user()" size="w-12 h-12" />

                <div>
                    <h2 class="text-base font-semibold leading-6 text-gray-950 dark:text-white" style="margin-left: 1rem;">
                        {{ $message() }}
                    </h2>

                    <p class="text-sm text-gray-500 dark:text-gray-400" style="margin-left: 1rem;">
                        {{ filament()->getUserName(filament()->auth()->user()) }}
                    </p>
                </div>
            </div>

            <form action="{{ filament()->getLogoutUrl() }}" method="post">
                @csrf

                <x-filament::button color="gray" icon="heroicon-m-arrow-left-on-rectangle"
                    icon-alias="panels::widgets.account.logout-button" labeled-from="sm" tag="button" type="submit">
                    Logout
                </x-filament::button>
            </form>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
