<?php
$nav = json_decode(file_get_contents(__DIR__ . '/data/nav.json'), true);
define('ACTIVE_PAGE', 'ABOUT JMPI');
$aosAnimations = ['fade-up', 'fade-down', 'zoom-in'];
function randomAos()
{
  global $aosAnimations;
  $anim = $aosAnimations[array_rand($aosAnimations)];
  $delay = rand(0, 6) * 100;
  return "data-aos=\"$anim\" data-aos-delay=\"$delay\"";
}
$executives = json_decode(file_get_contents(__DIR__ . '/data/executives.json'), true);
$featuredVideos = json_decode(file_get_contents(__DIR__ . '/data/featuredvideos.json'), true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Joshua's Meat Products, Inc.</title>
    <link href="/output.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/webp" href="/images/yticon.png">
    <!-- Responsive text for all sections -->
    <style>
    .about-responsive-title {
        @apply text-xl sm: text-2xl md:text-3xl font-extrabold;
    }

    .about-responsive-subtitle {
        @apply text-lg sm: text-xl md:text-2xl font-bold;
    }

    .about-responsive-p {
        @apply text-sm sm: text-base md:text-lg;
    }
    </style>
</head>

<body class="font-['Poppins']">
    <?php include 'header.php'; ?>
    <section
        class="w-full flex flex-col justify-center items-center pb-8 px-4 md:px-8 lg:px-16 xl:px-24 pt-16 md:pt-[100px] mt-16"
        data-aos="fade-up">
        <p class="text-[#252525] mb-4 text-sm sm:text-base md:text-lg">
            <span class="font-bold text-lg sm:text-xl md:text-3xl mb-2 text-[#252525]">Joshua's Meat Products,
                Inc.</span>
            was founded in 1993 by Manny and Virginia Valencia in Nagcarlan, Laguna, Philippines. Starting with a
            modest investment of PHP 2,000 from their wedding gifts, the couple began producing homemade longganisa,
            initially selling to neighbors. Over time, JMPI expanded its product line to include more than 30 types
            of processed meat products such as bologna, smoked longganisa, ham, tocino, and hotdogs. The company's
            commitment to quality and food safety has earned it a double A rating from the National Meat Inspection
            Services (NMIS) since May 2006.
        </p>
        <p class="text-[#252525] mb-8 text-sm sm:text-base md:text-lg">
            Today, JMPI distributes its products across various regions like Laguna, Metro Manila, Bicol, and parts
            of northern Luzon, employing over 350 staff and producing seven to ten tons of meat products daily. JMP
            sources raw meat internationally and also from local suppliers, supporting the Nagcarlan community, and
            maintains strict food safety and sanitation standards.
        </p>
        <div class="flex flex-col md:flex-row gap-6 md:gap-8 mt-8" data-aos="fade-up" data-aos-delay="200">
            <div
                class="flex-1 bg-[#F01B23] rounded-3xl text-white flex flex-col items-center justify-center px-4 md:px-8 lg:px-16 py-16">
                <h2 class="text-lg sm:text-2xl md:text-4xl font-bold mb-4">Mission</h2>
                <p class="text-center text-sm sm:text-base md:text-lg">
                    To glorify God by producing high-quality, safe, and affordable meat products with integrity,
                    excellence, and compassion—serving our customers, supporting our communities, and honoring
                    Christ in all that we do.
                </p>
            </div>
            <div
                class="flex-1 bg-[#F01B23] rounded-3xl text-white flex flex-col items-center justify-center px-4 md:px-8 lg:px-16 py-16">
                <h2 class="text-lg sm:text-2xl md:text-4xl font-bold mb-4">Vision</h2>
                <p class="text-center text-sm sm:text-base md:text-lg">
                    To be a trusted leader in the meat industry, known for honoring God through ethical practices,
                    exceptional quality, and compassionate servirof— impacting lives, nourishing communities, and
                    advancing His kingdom through our work.
                </p>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="w-full bg-white py-8 md:py-16 px-4 md:px-8 lg:px-16 xl:px-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-[#252525]">
            <div class="space-y-6" data-aos="fade-up" data-aos-delay="400">
                <div>
                    <h2 class="text-lg sm:text-2xl md:text-4xl font-extrabold text-[#F01B23]">
                        Core
                        Values</h2>
                </div>
                <div class="text-sm sm:text-base md:text-lg">
                    <span class="font-bold">Christ-Centered Excellence</span> – We pursue greatness in all we do,
                    driven by our devotion to God. Every product we craft is a reflection of our commitment to honor
                    Him.
                </div>
                <div class="text-sm sm:text-base md:text-lg">
                    <span class="font-bold">Righteous Integrity</span> – We stand firm on truth. Our business is
                    built on honesty, accountability, and doing what's right—even when it's hard.
                </div>
                <div class="text-sm sm:text-base md:text-lg">
                    <span class="font-bold">Purpose-Driven Leadership</span> – We lead with conviction, stewarding
                    our influence to uplift people, transform communities, and advance God's Kingdom through
                    business.
                </div>
            </div>
            <div class="space-y-6" data-aos="fade-up" data-aos-delay="400">
                <div class="text-sm sm:text-base md:text-lg">
                    <span class="font-bold">Relentless Quality</span> – Excellence isn't optional. We dominate the
                    industry with world-class standards in food safety, flavor, and innovation—delivered with
                    discipline and care.
                </div>
                <div class="text-sm sm:text-base md:text-lg">
                    <span class="font-bold">Empowerment Through Faith</span> – We cultivate a workplace where faith,
                    hard work, and character are nurtured—empowering every team member to grow spiritually and
                    professionally.
                </div>
                <div class="text-sm sm:text-base md:text-lg">
                    <span class="font-bold">Servant-Hearted Impact</span> – Our success is a tool for service. We
                    are committed to generosity, community-building, and being a beacon of hope in the marketplace.
                </div>
                <div class="text-sm sm:text-base md:text-lg">
                    <span class="font-bold">Bold Stewardship</span> – Every resource is a gift from God. We manage
                    His provision with wisdom, courage, and a vision for generational impact.
                </div>
            </div>
        </div>
    </section>

    <!-- Executives Section -->
    <section class="w-full py-8 md:py-16 px-4 md:px-8 lg:px-16 xl:px-24">
        <h2 class="text-lg sm:text-2xl md:text-4xl font-extrabold text-[#F01B23] text-center mb-10">Executives</h2>
        <?php if (!empty($executives)): ?>
        <div class="flex justify-center items-center w-full">
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-6 w-full">
                <?php foreach ($executives as $exec): ?>
                <div class="flex flex-col items-center" data-aos="fade-up">
                    <div class="relative w-full max-w-[500px] aspect-square">
                        <img src="<?= htmlspecialchars($exec['image']) ?>" alt="<?= htmlspecialchars($exec['name']) ?>"
                            class="rounded-2xl w-full h-full object-cover shadow-lg" />
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-[#F01B23] rounded-b-2xl px-2 py-3 text-white text-center">
                            <div class="font-extrabold text-base sm:text-lg md:text-xl">
                                <?= htmlspecialchars($exec['name']) ?>
                            </div>
                            <?php if (!empty($exec['position'])): ?>
                            <div class="text-xs sm:text-sm md:text-base font-normal">
                                <?= htmlspecialchars($exec['position']) ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </section>

    <!-- Target Audience Section -->
    <section class="w-full bg-gray-100 py-8 md:py-16 px-4 md:px-8 lg:px-16 xl:px-24">
        <div data-aos="fade-up">
            <h2 class="text-lg sm:text-2xl md:text-4xl font-extrabold text-[#F01B23] mb-6 text-center">
                Target
                Audience</h2>
            <p class="text-[#252525] text-sm sm:text-base md:text-lg text-left">
                This product appeals to a diverse range of customers, including budget-conscious families from middle to
                lower-middle income households seeking value-for-money meals and locally-produced, trusted meat brands;
                small to medium food businesses such as carinderias, eateries, canteens, and food stalls that require
                consistent
                quality, supply, and affordable bulk pricing; institutional buyers like schools, lapitals, and company
                cafeterias that need reliable, safe, and cost-effective meat products in volume; local supermarkets and
                sari-sari stores
                that rely on popular, fast-moving, and recognizable meat brands; and working individuals and students
                who
                prefer convenient, ready-to-cook or easy-to-prepare meals without compromising on taste or budget.
            </p>
        </div>
    </section>

    <!-- Unique Selling Proposition (USP) Section -->
    <section class="w-full bg-white py-8 md:py-16 px-4 md:px-8 lg:px-16 xl:px-24">
        <h2 class="text-lg sm:text-2xl md:text-4xl font-extrabold text-[#F01B23] mb-6" data-aos="fade-up">Unique Selling
            Proposition
            (USP)</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 text-[#252525]">
            <div class="space-y-6" data-aos="fade-up" data-aos-delay="100">
                <div class="text-sm sm:text-base md:text-lg"><span class="font-bold">High Quality You Can Taste, Prices
                        You Can Afford</span> – We combine
                    premium
                    ingredients and expert processing to deliver flavorful meat products at a price every Filipino can
                    enjoy.
                </div>
                <div class="text-sm sm:text-base md:text-lg"><span class="font-bold">God-Centered, People-Focused</span>
                    – Rooted in faith, our company operates
                    with
                    integrity, compassion, and a mission to serve communities through honest, high-quality food.</div>
                <div class="text-sm sm:text-base md:text-lg"><span class="font-bold">Trusted by Filipino Families for
                        Over 30 Years</span> – With decades of
                    experience,
                    Joshua's has earned the trust of homes, retailers, and food businesses across the country.</div>
                <div class="text-sm sm:text-base md:text-lg"><span class="font-bold">Wide Variety, One Standard:
                        Excellence</span> – From tocino to
                    longganisa,
                    hotdogs
                    to ham—we offer a complete range of meat products made to the highest standards of taste and safety.
                </div>
            </div>
            <div class="space-y-6" data-aos="fade-up" data-aos-delay="200">
                <div class="text-sm sm:text-base md:text-lg"><span class="font-bold">NMIS Double A Certified
                        Facility</span> – Our processing plant meets
                    national food
                    safety and hygiene benchmarks, giving customers peace of mind with every purchase.</div>
                <div class="text-sm sm:text-base md:text-lg"><span class="font-bold">FDA Registered Products</span> – We
                    ensure that the product complies with
                    the FDA's
                    food safety and manufacturing regulations. The registration process involves thorough inspection and
                    evaluation of your production processes, providing transparency and assurance to consumers and
                    regulatory
                    bodies.</div>
                <div class="text-sm sm:text-base md:text-lg"><span class="font-bold">Supporting Local, Serving
                        National</span> – We proudly source from local
                    farmers
                    and workers, helping grow the economy while distributing our products throughout Luzon and beyond.
                </div>
                <div class="text-sm sm:text-base md:text-lg"><span class="font-bold">Consistent Flavor, Every
                        Time</span> – Our
                    time-tested recipes and reliable
                    production processes ensure every bite tastes just as good as the last—always.</div>
            </div>
        </div>
    </section>

    <!-- Featured Videos Section -->
    <section class="w-full bg-white py-8 md:py-16 px-4 md:px-8 lg:px-16 xl:px-24">
        <h2 class="text-lg sm:text-2xl md:text-4xl font-extrabold text-[#F01B23] mb-6">Featured: Videos</h2>
        <div class="flex flex-col items-center">
            <div class="swiper featured-videos-swiper w-full max-w-[90rem] mx-auto">
                <div class="swiper-pagination mb-6"></div>
                <div class="swiper-wrapper">
                    <?php foreach ($featuredVideos as $index => $video): ?>
                    <div class="swiper-slide" style="width: 80%; max-width: 1200px;">
                        <div class="relative w-full pt-[56.25%] bg-black rounded-t-3xl overflow-hidden">
                            <iframe class="absolute top-0 left-0 w-full h-full rounded-t-3xl"
                                src="https://www.youtube.com/embed/<?= htmlspecialchars(explode('v=', parse_url($video['url'], PHP_URL_QUERY) ? $video['url'] : explode('?v=', $video['url'])[1])[1] ?? substr($video['url'], strrpos($video['url'], '=') + 1)) ?>?<?= $index === 0 ? 'autoplay=1&mute=1' : '' ?>"
                                title="<?= htmlspecialchars($video['title']) ?>" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div
                            class="bg-[#F01B23] text-white text-center font-bold py-3 text-sm sm:text-base md:text-lg rounded-b-3xl">
                            <?= htmlspecialchars($video['title']) ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
    AOS.init({
        once: false,
        duration: 800
    });
    window.addEventListener('load', () => {
        setTimeout(() => {
            AOS.refresh();
        }, 500);
    });

    // Initialize Featured Videos Swiper with Coverflow Effect
    const featuredVideosSwiper = new Swiper('.featured-videos-swiper', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 30,
            stretch: 0,
            depth: 150,
            modifier: 1.5,
            slideShadows: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
            type: 'bullets',
        },
        breakpoints: {
            640: {
                slidesPerView: 1.5,
            },
            1024: {
                slidesPerView: 2,
            }
        }
    });

    // Pause video when slide changes
    featuredVideosSwiper.on('slideChange', function() {
        const iframes = document.querySelectorAll('.featured-videos-swiper iframe');
        iframes.forEach(iframe => {
            iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        });
    });
    </script>
</body>