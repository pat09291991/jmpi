<!-- Footer Section -->
<footer class="w-full">
    <div
        class="bg-[#F01B23] w-full py-16 px-2 md:px-4 lg:px-20 flex flex-col lg:flex-row justify-between items-center lg:items-start gap-8">
        <!-- Left Column -->
        <div
            class="w-full lg:flex-1 lg:max-w-xs flex flex-col items-center lg:items-start text-center lg:text-left text-white mb-6 lg:mb-0">
            <span class="font-extrabold text-base sm:text-lg md:text-xl mb-1 lg:text-xl">BE A DEALER!</span>
            <span class="text-xs sm:text-sm md:text-base">Interested in becoming a dealer?<span
                    class="hidden lg:inline"><br></span><span class="inline lg:block"> Fill out our form
                    now!</span></span>
            <a href="/dealer.php"
                class="mt-4 lg:mt-6 inline-block px-4 md:px-6 lg:px-8 py-2 lg:py-3 bg-white text-[#F01B23] font-bold rounded-full shadow transition hover:bg-[#F01B23] hover:text-white text-xs md:text-sm lg:text-base">DEALER
                FORM</a>
        </div>
        <!-- Center Column -->
        <div class="w-full lg:flex-1 lg:max-w-xl flex flex-col items-center text-center mb-6 lg:mb-0">
            <img src="/images/jmpi-logo.webp" alt="Joshua's Meat Products, Inc." class="h-20 lg:h-32 mb-2">
            <div class="text-white mb-1 text-sm lg:text-base">
                <?php
        if (!isset($nav))
          $nav = json_decode(file_get_contents(__DIR__ . '/data/nav.json'), true);
        $footer_nav = array_filter($nav, function ($item) {
          return $item['name'] !== 'HOME';
        });
        $footer_nav = array_map(function ($item) {
          return $item;
        }, $footer_nav);
        $footer_links = array_map(function ($item) {
          return '<a href="' . htmlspecialchars($item['link']) . '" class="hover:underline">' . htmlspecialchars($item['name']) . '</a>';
        }, $footer_nav);
        echo implode(' | ', $footer_links);
        ?>
                <span>|
                    <a href="https://www.facebook.com/highqualitymeat" target="_blank" class="inline-block">
                        <img src="/images/facebook.png" alt="Facebook" class="h-4 w-4 inline-block">
                    </a>
                    <a href="https://www.instagram.com/info.jmpi/" target="_blank" class="inline-block">
                        <img src="/images/instagram.png" alt="Instagram" class="h-4 w-4 inline-block">
                    </a>
                </span>
            </div>

        </div>
        <!-- Right Column -->
        <div class=" w-full lg:flex-1 lg:max-w-xs flex flex-col items-center lg:items-end text-center lg:text-right
                        text-white text-base lg:text-xl">
            <span class="text-xs sm:text-sm md:text-base">Access our product promotion materials by clicking
                'Download'
                to get a copy of our brochure.</span>
            <a href="/images/Download-Brochure.pdf" download
                class="mt-4 lg:mt-6 inline-block px-4 md:px-6 lg:px-8 py-2 lg:py-3 bg-white text-[#F01B23] font-bold rounded-full shadow transition hover:bg-[#F01B23] hover:text-white flex items-center justify-center gap-2 text-xs md:text-sm lg:text-base">
                DOWNLOAD
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
        </div>
    </div>
    <div class="bg-gray-50 w-full py-8 text-center text-gray-400 text-xs lg:text-sm">
        Copyright 2025. All Rights Reserved
    </div>
</footer>

<!-- Fixed Messenger Icon -->
<a href="https://l.messenger.com/l.php?u=http%3A%2F%2Fm.me%2F260334401164329&h=AT3S6XOMpF3tkHKgm4udKuiznlFfulFc32zT96HO5LKtTHhoZ1h-YJn5jaC7bnVRi1NzASKiWG4IOD4WJU4qp7LrI6Cx3RjIWVycKneBWhY_SttlKpkfdjyuw_LJRqOPf95rN-FZQAAQfSlJWnJRyw"
    target="_blank" class="fixed bottom-6 right-6 z-50 hover:scale-110 transition-transform duration-200">
    <img src="/images/messenger.png" alt="Chat with us on Messenger" class="w-14 h-14 shadow-lg rounded-full">
</a>