<?php include 'partials/header.php'; ?>
<!-- Mindbody Script - Must be loaded before widgets -->
<script src="https://widgets.mindbodyonline.com/javascripts/healcode.js" type="text/javascript"></script>

<style>
/* Consolidated Mindbody Button Styles */
.mindbody-btn,
.healcode-pricing-option-text-link,
.healcode-contract-text-link {
  display: inline-block !important;
  width: 100% !important;
  background-color: #845d45 !important;
  color: white !important;
  padding: 12px 24px !important;
  border-radius: 8px !important;
  text-decoration: none !important;
  font-family: 'Quicksand', sans-serif !important;
  font-weight: 500 !important;
  font-size: 16px !important;
  text-align: center !important;
  transition: all 0.3s ease !important;
  border: none !important;
  cursor: pointer !important;
  box-sizing: border-box !important;
}

.mindbody-btn:hover,
.healcode-pricing-option-text-link:hover,
.healcode-contract-text-link:hover {
  background-color: #6e4635 !important;
  transform: scale(1.05) !important;
  color: white !important;
}

.mindbody-btn:active,
.healcode-pricing-option-text-link:active,
.healcode-contract-text-link:active {
  transform: scale(0.98) !important;
}

/* Special styling for buttons on dark background (monthly membership cards) */
.bg-\[#845d45\] .healcode-contract-text-link {
  background-color: white !important;
  color: #845d45 !important;
  border: 2px solid white !important;
}

.bg-\[#845d45\] .healcode-contract-text-link:hover {
  background-color: #f2e9dc !important;
  color: #845d45 !important;
  border: 2px solid #f2e9dc !important;
}

/* Card content alignment - ensures buttons align at bottom */
.pricing-card .text-center {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.pricing-card .text-center ul {
  flex-grow: 1;
}

/* Minimum heights for consistent card sizes */
.pricing-card {
  display: flex;
  flex-direction: column;
}

.pricing-card > div {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}

/* Smaller buttons for student and workspace sections */
.student-pricing-btn,
.workspace-pricing-btn {
  padding: 8px 16px !important;
  font-size: 14px !important;
  border-radius: 6px !important;
}

/* Enhanced card hover effects */
.pricing-card {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.pricing-card:hover {
  transform: translateY(-4px);
}

.pricing-card-group {
  position: relative;
  overflow: hidden;
}

.pricing-card-overlay {
  position: absolute;
  inset: 0;
  background: rgba(132, 93, 69, 0.05);
  opacity: 0;
  transition: opacity 0.3s ease;
  border-radius: 1rem;
  pointer-events: none;
}

.pricing-card-group:hover .pricing-card-overlay {
  opacity: 1;
}

/* Fix for unlimited classes card text color */
.unlimited-card h3,
.unlimited-card .price-text {
  color: white !important;
}

.unlimited-card p {
  color: rgba(255, 255, 255, 0.8) !important;
}
</style>

<div class="bg-[#f2e9dc] min-h-screen">
  <!-- Hero Section -->
  <div class="relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-[#845d45]/5 to-transparent"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 sm:py-24 lg:py-32">
      <div class="text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-[#2b2a24] font-quicksand mb-6">
          class pricing
        </h1>
        <p class="text-base sm:text-lg lg:text-xl text-[#845d45] font-quicksand leading-relaxed max-w-3xl mx-auto mb-8">
          choose the perfect package for your pilates journey. from single sessions to monthly memberships, 
          we have options to suit every schedule and budget.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
          <div class="flex items-center text-sm text-[#845d45] font-quicksand">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            small group classes (max 6 people)
          </div>
          <div class="flex items-center text-sm text-[#845d45] font-quicksand">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            all levels welcome
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pricing Sections -->
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 lg:pb-32">
    
    <!-- Standard Pricing -->
    <div class="mb-16 lg:mb-20">
      <div class="text-center mb-12">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#2b2a24] font-quicksand mb-4">
          standard pricing
        </h2>
        <p class="text-base sm:text-lg text-[#845d45] font-quicksand">
          our regular rates for all pilates enthusiasts
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mb-8">
        
        <!-- Single Session -->
        <div class="pricing-card pricing-card-group bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 lg:p-8 border border-[#845d45]/10">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">single session</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£25</div>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 14 days</p>
            <ul class="text-left space-y-2 mb-6">
              <li class="flex items-center text-sm text-gray-600 font-quicksand">
                <svg class="w-4 h-4 mr-2 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                perfect for trying us out
              </li>
              <li class="flex items-center text-sm text-gray-600 font-quicksand">
                <svg class="w-4 h-4 mr-2 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                50-minute reformer class
              </li>
              <li class="flex items-center text-sm text-gray-600 font-quicksand">
                <svg class="w-4 h-4 mr-2 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                expert instruction included
              </li>
            </ul>
            
            <healcode-widget 
              data-version="0.2" 
              data-link-class="mindbody-btn" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="100002" 
              data-bw-identity-site="true" 
              data-type="pricing-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
          <div class="pricing-card-overlay"></div>
        </div>

        <!-- Starter Package -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 lg:p-8 border-2 border-[#845d45] relative">
          <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <span class="bg-[#845d45] text-white px-4 py-1 rounded-full text-xs font-medium font-quicksand">most popular</span>
          </div>
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">starter intro</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£55</div>
            <p class="text-sm text-gray-600 font-quicksand mb-2">3 sessions</p>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 1 month</p>
            <ul class="text-left space-y-2 mb-6">
              <li class="flex items-center text-sm text-gray-600 font-quicksand">
                <svg class="w-4 h-4 mr-2 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                ideal for beginners
              </li>
              <li class="flex items-center text-sm text-gray-600 font-quicksand">
                <svg class="w-4 h-4 mr-2 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                build your routine
              </li>
              <li class="flex items-center text-sm text-gray-600 font-quicksand">
                <svg class="w-4 h-4 mr-2 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                £18.33 per session
              </li>
            </ul>
            
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-pricing-option-text-link" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="100003" 
              data-bw-identity-site="true" 
              data-type="pricing-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
        </div>

        <!-- Monthly Membership -->
        <div class="pricing-card bg-[#845d45] rounded-2xl shadow-lg hover:shadow-xl p-6 lg:p-8 text-white">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold font-quicksand mb-2">4 class monthly membership</h3>
            <div class="text-3xl lg:text-4xl font-bold font-quicksand mb-2">£90</div>
            <p class="text-sm text-white/80 font-quicksand mb-2">£22.50 classes per month</p>
            <p class="text-sm text-white/80 font-quicksand mb-6">recurring monthly</p>
            <ul class="text-left space-y-2 mb-6">
              <li class="flex items-center text-sm text-white/90 font-quicksand">
                <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                best value for regulars
              </li>
              <li class="flex items-center text-sm text-white/90 font-quicksand">
                <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                £22.50 per session
              </li>
              <li class="flex items-center text-sm text-white/90 font-quicksand">
                <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                priority booking
              </li>
            </ul>
            
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-contract-text-link" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="109" 
              data-bw-identity-site="true" 
              data-type="contract-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
        </div>

      </div>

      <!-- Class Packages -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        
        <!-- 4 Class Package -->
        <div class="pricing-card pricing-card-group bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 lg:p-8 border border-[#845d45]/10">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">4 class package</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£96</div>
            <p class="text-sm text-gray-600 font-quicksand mb-2">£24.50 per session</p>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 1 month</p>
            <div class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full inline-block mb-4 font-quicksand">
              save £4
            </div>
            
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-pricing-option-text-link" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="100033" 
              data-bw-identity-site="true" 
              data-type="pricing-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
          <div class="pricing-card-overlay"></div>
        </div>

        <!-- 8 Class Package -->
        <div class="pricing-card pricing-card-group bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 lg:p-8 border border-[#845d45]/10">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">8 class package</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£180</div>
            <p class="text-sm text-gray-600 font-quicksand mb-2">£22.50 per session</p>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 2 months</p>
            <div class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full inline-block mb-4 font-quicksand">
              save £20
            </div>
            
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-pricing-option-text-link" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="100034" 
              data-bw-identity-site="true" 
              data-type="pricing-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
          <div class="pricing-card-overlay"></div>
        </div>

        <!-- 12 Class Package -->
        <div class="pricing-card pricing-card-group bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 lg:p-8 border border-[#845d45]/10">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">12 class package</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£252</div>
            <p class="text-sm text-gray-600 font-quicksand mb-2">£21 per session</p>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 2 months</p>
            <div class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full inline-block mb-4 font-quicksand">
              save £48
            </div>
            
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-pricing-option-text-link" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="100035" 
              data-bw-identity-site="true" 
              data-type="pricing-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
          <div class="pricing-card-overlay"></div>
        </div>

      </div>

      <!-- Centered row for last 2 packages -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 max-w-4xl mx-auto mt-6 lg:mt-8">
        
        <!-- 20 Class Package -->
        <div class="pricing-card pricing-card-group bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 lg:p-8 border border-[#845d45]/10">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">20 class package</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£400</div>
            <p class="text-sm text-gray-600 font-quicksand mb-2">£20 per session</p>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 3 months</p>
            <div class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full inline-block mb-4 font-quicksand">
              save £100
            </div>
            
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-pricing-option-text-link" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="100007" 
              data-bw-identity-site="true" 
              data-type="pricing-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
          <div class="pricing-card-overlay"></div>
        </div>

        <!-- Unlimited Classes Monthly -->
        <div class="pricing-card unlimited-card bg-[#845d45] rounded-2xl shadow-lg hover:shadow-xl p-6 lg:p-8 text-white">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold font-quicksand mb-2">unlimited classes monthly membership</h3>
            <div class="text-3xl lg:text-4xl font-bold price-text font-quicksand mb-2">£200</div>
            <p class="text-sm font-quicksand mb-6">recurring monthly</p>
            
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-contract-text-link" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="115" 
              data-bw-identity-site="true" 
              data-type="contract-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
        </div>

      </div>
    </div>

    <!-- Student Pricing -->
    <div class="mb-16 lg:mb-20">
      <div class="text-center mb-12">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#2b2a24] font-quicksand mb-4">
          student pricing
        </h2>
        <p class="text-base sm:text-lg text-[#845d45] font-quicksand mb-2">
          special rates for students with valid ID
        </p>
        <p class="text-sm text-gray-600 font-quicksand">
          student ID required at time of booking and first class
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-6 lg:gap-4">
        
        <!-- Student Single Session -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">single session</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-4">£18</div>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link student-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100030" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <!-- Student Starter Intro -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">starter intro</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£45</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">3 sessions</p>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link student-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100012" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <!-- Student 4 Classes -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">4 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£72</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£18 per session</p>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link student-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100039" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <!-- Student 8 Classes -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">8 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£130</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£16.25 per session</p>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link student-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100041" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <!-- Student 12 Classes -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">12 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£198</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£16.50 per session</p>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link student-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100037" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <!-- Student 20 Classes -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">20 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£300</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£15 per session</p>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link student-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100029" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

      </div>
    </div>

    <!-- Workspace/NHS Pricing -->
    <div class="mb-16 lg:mb-20">
      <div class="text-center mb-12">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#2b2a24] font-quicksand mb-4">
          workspace/nhs pricing
        </h2>
        <p class="text-base sm:text-lg text-[#845d45] font-quicksand mb-2">
          discounted rates for workspace members & the nhs community
        </p>
        <p class="text-sm text-gray-600 font-quicksand">
          workspace/nhs membership required
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-6 lg:gap-4">
        
        <!-- Workspace Single Session -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">single session</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-4">£20</div>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link workspace-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100013" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <!-- Workspace Starter Intro -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">starter intro</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£50</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">3 sessions</p>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link workspace-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100014" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <!-- Workspace 4 Classes -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">4 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£82</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£20.50 per session</p>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link workspace-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100038" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <!-- Workspace 8 Classes -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">8 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£150</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£18.75 per session</p>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link workspace-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100040" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <!-- Workspace 12 Classes -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">12 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£214</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£17.83 per session</p>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link workspace-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100036" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <!-- Workspace 20 Classes -->
        <div class="pricing-card bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">20 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£340</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£17 per session</p>
          
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link workspace-pricing-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100017" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

      </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center bg-white rounded-2xl shadow-xl p-8 lg:p-12">
      <h2 class="text-2xl sm:text-3xl font-bold text-[#2b2a24] font-quicksand mb-4">
        ready to start your pilates journey?
      </h2>
      <p class="text-base sm:text-lg text-[#845d45] font-quicksand mb-8 max-w-2xl mx-auto">
        choose your perfect package and book your first class today. all levels welcome, 
        and our expert instructors will guide you every step of the way.
      </p>
      
      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
        <a href="/book" 
           class="w-full sm:w-auto inline-block rounded-full bg-[#845d45] px-8 py-4 text-white font-quicksand hover:bg-[#6e4635] transition-all duration-300 font-medium text-lg shadow-lg hover:shadow-xl active:scale-95">
          book your class
        </a>
        <a href="/faq" 
           class="w-full sm:w-auto inline-block rounded-full border-2 border-[#845d45] px-8 py-4 text-[#845d45] font-quicksand hover:bg-[#845d45] hover:text-white transition-all duration-300 font-medium text-lg active:scale-95">
          have questions?
        </a>
      </div>

      <!-- Additional Info -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center text-sm text-gray-600 font-quicksand">
        <div class="flex items-center justify-center">
          <svg class="w-5 h-5 mr-2 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          all packages have expiry dates
        </div>
        <div class="flex items-center justify-center">
          <svg class="w-5 h-5 mr-2 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          24-hour cancellation policy
        </div>
        <div class="flex items-center justify-center">
          <svg class="w-5 h-5 mr-2 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
          maximum 6 people per class
        </div>
      </div>
    </div>

  </div>
</div>

<script>
// Initialize Mindbody widgets
document.addEventListener('DOMContentLoaded', function() {
  console.log('Page loaded, checking HealCode...');
  
  setTimeout(function() {
    if (typeof HealCode !== 'undefined') {
      console.log('HealCode found, initializing...');
      HealCode.init();
      
      setTimeout(function() {
        const links = document.querySelectorAll('[class*="healcode"]');
        console.log('Found Mindbody links:', links.length);
      }, 1000);
    } else {
      console.log('HealCode not found');
    }
  }, 500);
});

// Handle purchase clicks with fallback
function handlePurchaseClick(element) {
  console.log('Purchase button clicked');
  
  const mindbodyLink = document.querySelector('.healcode-pricing-option-text-link');
  
  if (mindbodyLink) {
    console.log('Found Mindbody link, clicking...');
    mindbodyLink.click();
  } else {
    console.log('Mindbody link not found, trying to initialize...');
    
    if (typeof HealCode !== 'undefined') {
      HealCode.init();
      
      setTimeout(function() {
        const retryLink = document.querySelector('.healcode-pricing-option-text-link');
        if (retryLink) {
          retryLink.click();
          console.log('Clicked Mindbody link on retry');
        } else {
          console.log('Fallback: redirecting to booking');
          window.location.href = '/book';
        }
      }, 500);
    } else {
      console.log('HealCode not available, redirecting to booking');
      window.location.href = '/book';
    }
  }
}
</script>

<?php include 'partials/footer.php'; ?>