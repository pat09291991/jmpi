<?php
$page_title = "Dealer/Reseller Application";
$nav = json_decode(file_get_contents(__DIR__ . '/data/nav.json'), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Joshua's Meat Products: Authorize Dealer/Reseller Application Form</title>
  <link href="/output.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 font-['Poppins']">
<?php include 'header.php'; ?>

<div class="mx-auto px-4 py-12 md:px-8 lg:px-16 xl:px-24 pt-16 md:pt-[100px] mt-16">
  <div class="flex flex-wrap w-full lg:w-1/2">
    <h1 class="text-xl lg:text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">JOSHUA'S MEAT PRODUCTS: AUTHORIZE DEALER/RESELLER APPLICATION FORM</h1>
  </div>
  <div class="mb-8">
    <h2 class="text-lg lg:text-2xl font-extrabold text-red-600 mb-2">Become an Authorized Dealer!</h2>
    <p class="text-gray-700 text-sm md:text-lg">Please provide all required details below to qualify your business with us. If your company qualifies to become a dealer, our agent will be in contact with you to discuss further opportunities. Thank you for your interest in the JMPi Dealer Experience.</p>
  </div>
  <!-- Progress Indicator -->
  <div class="md:border-b-2 md:border-gray-200 mb-8 pb-3 overflow-x-auto sm:overflow-hidden">
    <div id="progress-indicator" class="flex items-center lg:gap-2 text-sm lg:text-xl font-semibold text-gray-700 relative">
      <span id="step1-indicator" class="step-label transition-all duration-200 relative">Contact Information</span>
      <span class="mx-2">&gt;</span>
      <span id="step2-indicator" class="step-label transition-all duration-200 relative">Interest & Requirements</span>
      <span class="mx-2">&gt;</span>
      <span id="step3-indicator" class="step-label transition-all duration-200 relative">Submit</span>
    </div>
  </div>
  <form id="dealer-form" class="bg-white rounded-2xl shadow p-4 sm:p-6 md:p-8">
    <!-- Step 1: Contact Information -->
    <div id="step1" class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
      <div class="flex items-center justify-end col-span-1 sm:col-span-2 mb-2">
        <button type="button" id="to-step2" class="text-xs sm:text-sm md:text-base hover:text-red-600">Next &gt;</button>
      </div>
      <div>
        <label for="company_name" class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base">Company Name</label>
        <input type="text" id="company_name" name="company_name" class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base" required>
      </div>
      <div>
        <label for="contact_person" class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base">Contact Person</label>
        <input type="text" id="contact_person" name="contact_person" class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base" required>
      </div>
      <div>
        <label for="business_address" class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base">Business Address</label>
        <input type="text" id="business_address" name="business_address" class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base" required>
      </div>
      <div>
        <label for="business_email" class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base">Business Email</label>
        <input type="email" id="business_email" name="business_email" class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base" required>
      </div>
      <div class="sm:col-span-2">
        <label for="phone_number" class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base">Phone Number</label>
        <input type="text" id="phone_number" name="phone_number" class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base" required>
      </div>
    </div>
    <!-- Step 2: Interest & Requirements -->
    <div id="step2" class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 hidden">
      <div class="flex items-center justify-between col-span-1 sm:col-span-2 mb-2">
        <button type="button" id="back-to-step1" class="text-xs sm:text-sm md:text-base hover:text-red-600">&lt; Previous</button>
        <button type="button" id="to-step3" class="text-xs sm:text-sm md:text-base hover:text-red-600">Next &gt;</button>
      </div>
      <div class="col-span-2 lg:col-span-1">
        <label for="interested_products" class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base">What Joshua's Meat Products are you interested in reselling?</label>
        <input type="text" id="interested_products" name="interested_products" placeholder="Please specify products or categories" class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base" required>
      </div>
      <div class="col-span-2 lg:col-span-1">
        <label for="estimated_quantity" class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base">Estimated quantity of products required per month</label>
        <input type="text" id="estimated_quantity" name="estimated_quantity" class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base" required>
      </div>
      <div>
        <label for="interest_reason" class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base">Why are you interested in becoming an authorized dealer for Joshua's Meat Products?</label>
        <textarea id="interest_reason" name="interest_reason" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base" required></textarea>
      </div>
    </div>
    <!-- Step 3: Submit -->
    <div id="step3" class="flex flex-col gap-4 md:gap-6 hidden">
      <div class="flex items-center justify-between mb-2">
        <button type="button" id="back-to-step2" class="text-xs sm:text-sm md:text-base hover:text-red-600">&lt; Previous</button>
      </div>
      <div>
        <label for="additional_info" class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base">Additional Information</label>
        <textarea id="additional_info" name="additional_info" rows="3" placeholder="Any additional information or comments you'd like to add" class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base"></textarea>
      </div>
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mt-4">
        <div class="flex-1">
          <p class="font-bold text-gray-900 mb-1 text-xs sm:text-sm md:text-base">Thank you for your interest in Joshua's Meat Products.<span class="font-normal text-gray-700"> Once you've completed the form, please submit it, and our agent will review your application. If your business qualifies, we will contact you to discuss further opportunities.</span></p>
        </div>
        <button type="submit" class="w-full md:w-40 h-12 bg-red-600 text-white rounded-lg font-bold text-xs sm:text-sm md:text-base shadow hover:bg-red-700 transition">Submit</button>
      </div>
    </div>
  </form>
</div>

<style>
  .step-label .active-underline {
    position: absolute;
    left: 0;
    right: 0;
    bottom: -12px;
    height: 3px;
    background: #111827; /* Tailwind gray-900 */
    border-radius: 2px;
    content: '';
    z-index: 10;
  }
</style>

<script>
const step1 = document.getElementById('step1');
const step2 = document.getElementById('step2');
const step3 = document.getElementById('step3');
const toStep2 = document.getElementById('to-step2');
const toStep3 = document.getElementById('to-step3');
const backToStep1 = document.getElementById('back-to-step1');
const backToStep2 = document.getElementById('back-to-step2');
const step1Indicator = document.getElementById('step1-indicator');
const step2Indicator = document.getElementById('step2-indicator');
const step3Indicator = document.getElementById('step3-indicator');

function showStep(step) {
  step1.classList.add('hidden');
  step2.classList.add('hidden');
  step3.classList.add('hidden');
  [step1Indicator, step2Indicator, step3Indicator].forEach(el => {
    el.classList.remove('font-bold', 'text-gray-900');
    // Remove underline if present
    const underline = el.querySelector('.active-underline');
    if (underline) underline.remove();
  });
  if (step === 1) {
    step1.classList.remove('hidden');
    step1Indicator.classList.add('font-bold', 'text-gray-900');
    step1Indicator.insertAdjacentHTML('beforeend', '<span class="active-underline"></span>');
  } else if (step === 2) {
    step2.classList.remove('hidden');
    step2Indicator.classList.add('font-bold', 'text-gray-900');
    step2Indicator.insertAdjacentHTML('beforeend', '<span class="active-underline"></span>');
  } else if (step === 3) {
    step3.classList.remove('hidden');
    step3Indicator.classList.add('font-bold', 'text-gray-900');
    step3Indicator.insertAdjacentHTML('beforeend', '<span class="active-underline"></span>');
  }
}
if (toStep2) toStep2.onclick = () => showStep(2);
if (backToStep1) backToStep1.onclick = () => showStep(1);
if (toStep3) toStep3.onclick = () => showStep(3);
if (backToStep2) backToStep2.onclick = () => showStep(2);

document.addEventListener('DOMContentLoaded', function() {
  showStep(1);
});
</script>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="/js/index.js"></script>
</body>
</html> 