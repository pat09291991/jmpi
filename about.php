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
    <link rel="icon" type="image/webp" href="/images/jmpi-logo.png">
</head>

<body class="font-['Poppins']">
    <?php include 'header.php'; ?>
    <div class="px-4 md:px-8 lg:px-16 xl:px-24 pt-16 md:pt-[100px] mt-16">
        <section class="w-full flex flex-col justify-center items-center pb-8" data-aos="fade-up">
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
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 mt-8" data-aos="fade-up">
                <div
                    class="flex-1 bg-[#F01B23] rounded-3xl text-white flex flex-col items-center justify-center px-4 md:px-8 lg:px-16 py-16">
                    <h2 class="text-base md:text-2xl font-bold mb-4">Mission</h2>
                    <p class="text-center text-sm sm:text-base md:text-lg">
                        To glorify God by producing high-quality, safe, and affordable meat products with integrity,
                        excellence, and compassion—serving our customers, supporting our communities, and honoring
                        Christ in all that we do.
                    </p>
                </div>
                <div
                    class="flex-1 bg-[#F01B23] rounded-3xl text-white flex flex-col items-center justify-center px-4 md:px-8 lg:px-16 py-16">
                    <h2 class="text-base md:text-2xl font-bold mb-4">Vision</h2>
                    <p class="text-center text-sm sm:text-base md:text-lg">
                        To be a trusted leader in the meat industry, known for honoring God through ethical practices,
                        exceptional quality, and compassionate service — impacting lives, nourishing communities, and
                        advancing His kingdom through our work.
                    </p>
                </div>
            </div>
        </section>

        <!-- Core Values Section -->
        <section class="w-full bg-white py-8 md:py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-[#252525]">
                <div class="space-y-6">
                    <div>
                        <h2 class="text-xl sm:text-2xl md:text-4xl font-extrabold text-[#F01B23]" data-aos="fade-up">
                            Core
                            Values</h2>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="0" class="text-sm sm:text-base md:text-lg">
                        <span class="font-bold">Christ-Centered Excellence</span> – We pursue greatness in all we do,
                        driven by our devotion to God. Every product we craft is a reflection of our commitment to honor
                        Him.
                    </div>
                    <div data-aos="fade-up" data-aos-delay="100" class="text-sm sm:text-base md:text-lg">
                        <span class="font-bold">Righteous Integrity</span> – We stand firm on truth. Our business is
                        built on honesty, accountability, and doing what's right—even when it's hard.
                    </div>
                    <div data-aos="fade-up" data-aos-delay="200" class="text-sm sm:text-base md:text-lg">
                        <span class="font-bold">Purpose-Driven Leadership</span> – We lead with conviction, stewarding
                        our influence to uplift people, transform communities, and advance God's Kingdom through
                        business.
                    </div>
                </div>
                <div class="space-y-6">
                    <div data-aos="fade-up" data-aos-delay="300" class="text-sm sm:text-base md:text-lg">
                        <span class="font-bold">Relentless Quality</span> – Excellence isn't optional. We dominate the
                        industry with world-class standards in food safety, flavor, and innovation—delivered with
                        discipline and care.
                    </div>
                    <div data-aos="fade-up" data-aos-delay="400" class="text-sm sm:text-base md:text-lg">
                        <span class="font-bold">Empowerment Through Faith</span> – We cultivate a workplace where faith,
                        hard work, and character are nurtured—empowering every team member to grow spiritually and
                        professionally.
                    </div>
                    <div data-aos="fade-up" data-aos-delay="500" class="text-sm sm:text-base md:text-lg">
                        <span class="font-bold">Servant-Hearted Impact</span> – Our success is a tool for service. We
                        are committed to generosity, community-building, and being a beacon of hope in the marketplace.
                    </div>
                    <div data-aos="fade-up" data-aos-delay="600" class="text-sm sm:text-base md:text-lg">
                        <span class="font-bold">Bold Stewardship</span> – Every resource is a gift from God. We manage
                        His provision with wisdom, courage, and a vision for generational impact.
                    </div>
                </div>
            </div>
        </section>

        <!-- Executive Committee Section -->
        <section class="w-full py-12 md:py-20">
            <h2 class="text-xl sm:text-2xl md:text-4xl font-extrabold text-[#F01B23] text-center mb-10">OUR EXECUTIVE
                COMMITTEE</h2>
            <div class="max-w-6xl mx-auto">
                <?php if (!empty($executives)): ?>
                <div class="grid grid-cols-4 grid-rows-3 gap-0">
                    <?php foreach ($executives as $i => $exec): ?>
                    <?php if ($i === 0): ?>
                    <div class="relative col-span-2 row-span-2">
                        <img src="<?= htmlspecialchars($exec['image']) ?>" alt="<?= htmlspecialchars($exec['name']) ?>"
                            class="rounded-2xl w-full h-full object-cover shadow-lg"
                            style="min-height:320px;max-height:100%;object-fit:cover;" />
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 px-4 py-3 rounded-b-2xl">
                            <div class="font-bold text-white text-lg md:text-xl">
                                <?= htmlspecialchars($exec['name']) ?>
                            </div>
                            <div class="text-white text-xs md:text-base">
                                <?= htmlspecialchars($exec['position']) ?>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="relative">
                        <img src="<?= htmlspecialchars($exec['image']) ?>" alt="<?= htmlspecialchars($exec['name']) ?>"
                            class="rounded-2xl w-full h-full object-cover shadow-lg"
                            style="min-height:150px;max-height:100%;object-fit:cover;" />
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 px-2 py-2 rounded-b-2xl">
                            <div class="font-bold text-white text-sm md:text-base">
                                <?= htmlspecialchars($exec['name']) ?>
                            </div>
                            <div class="text-white text-xs md:text-sm">
                                <?= htmlspecialchars($exec['position']) ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </div>

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
    </script>
</body>