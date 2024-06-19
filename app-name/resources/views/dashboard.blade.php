<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @auth
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #212121">

                    {{ __("You're logged in!") }}

                </div>
                @endauth
            </div>
            <div style="text-align: center">
                <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white" style="font-size: xx-large">Welcome to my app!</h1>
            </div>
            <div class="img" style="width: 100%; margin-top: 3%">
            <img style="width: 100%; border-radius: 20px; border-width: thin; border-color: #FFB302" src="https://dnm.nflximg.net/api/v6/BvVbc2Wxr2w6QuoANoSpJKEIWjQ/AAAAQckPfOutRyhMCH-aBQ1t6e18o5eaSAUyVYeh30kHajSBqgbEixfTksZXuRMy-YELTw50Ngb9SaISPHT8XcmrEvFi7NiAjQnbKlNs8AAwPA8T_3yeW3COyoj_JSQGFn5KDi3GI7Pr47S819WNSa-aYcDROqc.jpg?r=026">
            </div>

        </div>

    </div>

</x-app-layout>
