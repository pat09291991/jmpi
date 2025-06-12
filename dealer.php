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
  <link rel="icon" type="image/webp" href="/images/jmpi-logo.png">
  <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
</head>

<body class="bg-gray-50 font-['Poppins']">
  <?php include 'header.php'; ?>

  <div class="mx-auto px-4 py-12 md:px-8 lg:px-16 xl:px-24 pt-16 md:pt-[100px] mt-16">
    <div class="flex flex-wrap w-full lg:w-1/2">
      <h1 class="text-xl lg:text-3xl md:text-4xl font-extrabold text-[#252525] mb-6">JOSHUA'S MEAT PRODUCTS: AUTHORIZE
        DEALER/RESELLER APPLICATION FORM</h1>
    </div>
    <div class="mb-8">
      <h2 class="text-lg lg:text-2xl font-extrabold text-[#252525] mb-2">Become an Authorized Dealer!</h2>
      <p class="text-gray-700 text-sm md:text-lg">Please provide all required details below to qualify your business
        with us. If your company qualifies to become a dealer, our agent will be in contact with you to discuss further
        opportunities. Thank you for your interest in the JMPi Dealer Experience.</p>
    </div>
    <!-- Progress Indicator -->
    <div class="md:border-b-2 md:border-gray-200 mb-8 pb-3 overflow-x-auto sm:overflow-hidden">
      <div id="progress-indicator"
        class="flex items-center lg:gap-2 text-sm lg:text-xl font-semibold text-[#252525] relative">
        <span id="step1-indicator" class="step-label transition-all duration-200 relative">Contact Information</span>
        <span class="mx-2">&gt;</span>
        <span id="step2-indicator" class="step-label transition-all duration-200 relative">Interest &
          Requirements</span>
        <span class="mx-2">&gt;</span>
        <span id="step3-indicator" class="step-label transition-all duration-200 relative">Submit</span>
      </div>
    </div>
    <form id="dealer-form" class="bg-white rounded-2xl shadow p-4 sm:p-6 md:p-8" action="/process_dealer_form.php"
      method="POST">
      <!-- Step 1: Contact Information -->
      <div id="step1" class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
        <div class="flex items-center justify-end col-span-1 sm:col-span-2 mb-2">
          <button type="button" id="to-step2" class="text-xs sm:text-sm md:text-base hover:text-[#F01B23]">Next
            &gt;</button>
        </div>
        <div>
          <label for="company_name"
            class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base text-[#252525]">Company Name</label>
          <input type="text" id="company_name" name="company_name"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base"
            required>
        </div>
        <div>
          <label for="contact_person"
            class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base text-[#252525]">Contact Person</label>
          <input type="text" id="contact_person" name="contact_person"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base"
            required>
        </div>
        <div>
          <label for="business_email"
            class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base text-[#252525]">Business Email</label>
          <input type="email" id="business_email" name="business_email"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base"
            required>
          <p id="email-error" class="mt-1 text-xs text-red-500 hidden">Please enter a valid email address (e.g.,
            name@company.com)</p>
        </div>
        <div>
          <label for="phone_number"
            class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base text-[#252525]">Phone Number</label>
          <input type="text" id="phone_number" name="phone_number"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base"
            required>
        </div>
        <div class="sm:col-span-2">
          <label for="business_address"
            class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base text-[#252525]">Business Address</label>
          <input type="text" id="business_address" name="business_address"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base"
            required>
        </div>
      </div>
      <!-- Step 2: Interest & Requirements -->
      <div id="step2">
        <div class="flex items-center justify-between mb-8">
          <button type="button" id="back-to-step1" class="text-xs sm:text-sm md:text-base hover:text-[#F01B23]">&lt;
            Previous</button>
          <button type="button" id="to-step3" class="text-xs sm:text-sm md:text-base hover:text-[#F01B23]">Next
            &gt;</button>
        </div>
        <div class="mb-4">
          <label for="interested_products"
            class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base text-[#252525]">What Joshua's Meat
            Products are you interested in reselling?</label>
          <textarea type="text" id="interested_products" name="interested_products"
            placeholder="Please specify products or categories"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base"
            required style="height: 100px;"></textarea>
        </div>
        <div class="mb-4">
          <label for="estimated_quantity"
            class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base text-[#252525]">Estimated quantity of
            products required per month</label>
          <textarea type="text" id="estimated_quantity" name="estimated_quantity"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base"
            required style="height: 100px;"></textarea>
        </div>
        <div>
          <label for="interest_reason"
            class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base text-[#252525]">Why are you interested
            in becoming an authorized dealer for Joshua's Meat Products?</label>
          <textarea id="interest_reason" name="interest_reason" rows="3"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base"
            required></textarea>
        </div>
      </div>
      <!-- Step 3: Submit -->
      <div id="step3" class="flex flex-col gap-4 md:gap-6 hidden">
        <div class="flex items-center justify-between mb-2">
          <button type="button" id="back-to-step2" class="text-xs sm:text-sm md:text-base hover:text-[#F01B23]">&lt;
            Previous</button>
        </div>
        <div>
          <label for="additional_info"
            class="block font-bold mb-1 sm:mb-2 text-xs sm:text-sm md:text-base text-[#252525]">Additional
            Information</label>
          <textarea id="additional_info" name="additional_info" rows="3"
            placeholder="Any additional information or comments you'd like to add"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-3 focus:outline-none focus:ring-2 focus:ring-red-500 text-xs sm:text-sm md:text-base"></textarea>
        </div>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mt-4">
          <div class="flex-1">
            <p class="font-bold text-[#252525] mb-1 text-xs sm:text-sm md:text-base">Thank you for your interest in
              Joshua's Meat Products.<span class="font-normal text-gray-700"> Once you've completed the form, please
                submit it, and our agent will review your application. If your business qualifies, we will contact you
                to discuss further opportunities.</span></p>
          </div>
          <div class="flex flex-col items-center gap-4">
            <div class="h-captcha" data-sitekey="fe4037d4-0dc0-4e6a-bed0-05dc18fa7426"
              data-callback="onCaptchaVerified"></div>
            <button type="submit" id="submit-button"
              class="w-full md:w-40 h-12 bg-[#F01B23] text-white rounded-lg font-bold text-xs sm:text-sm md:text-base shadow hover:bg-[#F01B23] transition opacity-50 cursor-not-allowed"
              disabled>Submit</button>
          </div>
        </div>
        <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
          <p class="text-sm text-gray-600"><strong>Disclaimer:</strong> By submitting this form, you acknowledge that
            all information provided is accurate and complete. Joshua's Meat Products reserves the right to verify all
            information provided and may request additional documentation. Incomplete or inaccurate information may
            result in the rejection of your application.</p>
        </div>
      </div>
      <input type="hidden" id="recaptcha_token" name="recaptcha_token">
      <div id="validation-message"
        class="p-3 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm hidden mt-8">
        Please fill in all required fields before proceeding to the next step.
      </div>
    </form>
  </div>

  <!-- Confirmation Modal -->
  <div id="confirmation-modal"
    class="fixed inset-0 z-50 flex items-center justify-center bg-[#252525] bg-opacity-40 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
      <h2 class="text-lg font-bold mb-2 text-[#252525]">Confirm Submission</h2>
      <p class="mb-4 text-gray-700">Are you sure you want to submit your application?</p>
      <div class="flex justify-end gap-2">
        <button id="cancel-confirmation"
          class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-800">Cancel</button>
        <button id="confirm-submit"
          class="px-4 py-2 rounded bg-[#F01B23] hover:bg-[#F01B23] text-white font-bold">Confirm</button>
      </div>
    </div>
  </div>

  <!-- Thank You Modal -->
  <div id="thankyou-modal"
    class="fixed inset-0 z-50 flex items-center justify-center bg-[#252525] bg-opacity-40 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center">
      <h2 class="text-lg font-bold mb-2 text-green-700">Thank You!</h2>
      <p class="mb-4 text-gray-700">Your application has been submitted successfully.<br>We appreciate your interest in
        becoming a dealer.</p>
      <button id="close-thankyou"
        class="px-4 py-2 rounded bg-green-600 hover:bg-green-700 text-white font-bold mt-2">Close</button>
    </div>
  </div>

  <style>
    .step-label .active-underline {
      position: absolute;
      left: 0;
      right: 0;
      bottom: -12px;
      height: 3px;
      background: #111827;
      /* Tailwind gray-900 */
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
    const validationMessage = document.getElementById('validation-message');

    // Function to validate email format
    function validateEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }

    // Function to check if all required fields in a step are filled
    function validateStep(step) {
      const requiredFields = step.querySelectorAll('input[required], textarea[required]');
      let isValid = true;

      requiredFields.forEach(field => {
        if (!field.value.trim()) {
          isValid = false;
          field.classList.add('border-red-500');
        } else {
          field.classList.remove('border-red-500');

          // Additional validation for email field
          if (field.type === 'email') {
            const emailError = document.getElementById('email-error');
            if (!validateEmail(field.value.trim())) {
              isValid = false;
              field.classList.add('border-red-500');
              emailError.classList.remove('hidden');
              return;
            } else {
              emailError.classList.add('hidden');
            }
          }
        }
      });

      return isValid;
    }

    // Function to show validation message
    function showValidationMessage(message = 'Please fill in all required fields before proceeding to the next step.', type = 'error') {
      validationMessage.textContent = message;
      validationMessage.classList.remove('hidden');

      // Update styling based on message type
      if (type === 'success') {
        validationMessage.classList.remove('bg-red-50', 'border-red-200', 'text-red-700');
        validationMessage.classList.add('bg-green-50', 'border-green-200', 'text-green-700');
      } else {
        validationMessage.classList.remove('bg-green-50', 'border-green-200', 'text-green-700');
        validationMessage.classList.add('bg-red-50', 'border-red-200', 'text-red-700');
      }

      setTimeout(() => {
        validationMessage.classList.add('hidden');
      }, 5000);
    }

    function showStep(step) {
      step1.classList.add('hidden');
      step2.classList.add('hidden');
      step3.classList.add('hidden');
      [step1Indicator, step2Indicator, step3Indicator].forEach(el => {
        el.classList.remove('font-bold', 'text-gray-900');
        const underline = el.querySelector('.active-underline');
        if (underline) underline.remove();
      });

      // Hide validation message when changing steps
      validationMessage.classList.add('hidden');

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

    // Add event listeners for navigation buttons
    if (toStep2) {
      toStep2.onclick = () => {
        if (validateStep(step1)) {
          showStep(2);
        } else {
          showValidationMessage();
        }
      };
    }

    if (toStep3) {
      toStep3.onclick = () => {
        if (validateStep(step2)) {
          showStep(3);
        } else {
          showValidationMessage();
        }
      };
    }

    if (backToStep1) backToStep1.onclick = () => showStep(1);
    if (backToStep2) backToStep2.onclick = () => showStep(2);

    // Add input event listeners to remove red border when user starts typing
    document.querySelectorAll('input[required], textarea[required]').forEach(field => {
      field.addEventListener('input', function () {
        if (this.value.trim()) {
          this.classList.remove('border-red-500');

          // Real-time email validation
          if (this.type === 'email') {
            const emailError = document.getElementById('email-error');
            if (validateEmail(this.value.trim())) {
              this.classList.remove('border-red-500');
              emailError.classList.add('hidden');
            } else {
              this.classList.add('border-red-500');
              emailError.classList.remove('hidden');
            }
          }
        }
      });
    });

    document.addEventListener('DOMContentLoaded', function () {
      showStep(1);
    });

    // Add development mode check
    const isDevelopment = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';

    // Confirmation modal logic
    const confirmationModal = document.getElementById('confirmation-modal');
    const confirmSubmitBtn = document.getElementById('confirm-submit');
    const cancelConfirmationBtn = document.getElementById('cancel-confirmation');
    let pendingSubmitEvent = null;

    confirmSubmitBtn.addEventListener('click', function () {
      confirmationModal.classList.add('hidden');
      form.dataset.confirmed = 'true';
      form.submit();
    });

    cancelConfirmationBtn.addEventListener('click', function () {
      confirmationModal.classList.add('hidden');
      form.dataset.confirmed = '';
      pendingSubmitEvent = null;
    });

    // Get the submit button
    const submitButton = document.getElementById('submit-button');

    // Function to handle captcha verification
    function onCaptchaVerified(token) {
      if (isDevelopment) {
        submitButton.disabled = false;
        submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
        return;
      }

      // Verify the captcha
      fetch('/verify_captcha.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `h-captcha-response=${encodeURIComponent(token)}`
      })
        .then(response => response.json())
        .then(result => {
          if (result.success) {
            submitButton.disabled = false;
            submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
          } else {
            showValidationMessage(result.message || 'Captcha verification failed');
            hcaptcha.reset();
          }
        })
        .catch(error => {
          showValidationMessage('An error occurred during verification');
          console.error('Captcha verification error:', error);
          hcaptcha.reset();
        });
    }
  </script>

  <?php include 'footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="/js/index.js"></script>
</body>

</html>