<?php include 'partials/header.php'; ?>
<!-- Mindbody Script - Must be loaded before widgets -->
<script src="https://widgets.mindbodyonline.com/javascripts/healcode.js" type="text/javascript"></script>
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
        
        <!-- Single Session - Fixed Mindbody Integration -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-[#845d45]/10 group relative overflow-hidden">
          
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
            
            <!-- Mindbody Widget - Make this visible and clickable -->
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
          
          <!-- Hover Effect -->
          <div class="absolute inset-0 bg-[#845d45]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl pointer-events-none"></div>
        </div>

        <style>
        /* Style the Mindbody button to match your design */
        .mindbody-btn {
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
        }

        .mindbody-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }
        </style>

        <!-- Starter Package with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border-2 border-[#845d45] relative">
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
            
            <!-- Your Mindbody Widget -->
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-pricing-option-text-link starter-intro-btn" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="100003" 
              data-bw-identity-site="true" 
              data-type="pricing-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
        </div>

        <style>
        /* Style the Mindbody button for starter intro */
        .healcode-pricing-option-text-link.starter-intro-btn {
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
        }

        .healcode-pricing-option-text-link.starter-intro-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.starter-intro-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

        <!-- Monthly Membership with Mindbody Widget -->
        <div class="bg-[#845d45] rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 text-white">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold font-quicksand mb-2">monthly membership</h3>
            <div class="text-3xl lg:text-4xl font-bold font-quicksand mb-2">£100</div>
            <p class="text-sm text-white/80 font-quicksand mb-2">5 classes per month</p>
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
                £20 per session
              </li>
              <li class="flex items-center text-sm text-white/90 font-quicksand">
                <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                priority booking
              </li>
            </ul>
            
            <!-- Your Mindbody Widget -->
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-contract-text-link monthly-membership-btn" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="101" 
              data-bw-identity-site="true" 
              data-type="contract-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
        </div>

        <style>
        /* Style the Mindbody button for monthly membership */
        .healcode-contract-text-link.monthly-membership-btn {
          display: inline-block !important;
          width: 100% !important;
          background-color: rgba(255, 255, 255, 0.2) !important;
          color: white !important;
          padding: 12px 24px !important;
          border-radius: 8px !important;
          text-decoration: none !important;
          font-family: 'Quicksand', sans-serif !important;
          font-weight: 500 !important;
          font-size: 16px !important;
          text-align: center !important;
          transition: all 0.3s ease !important;
          border: 1px solid rgba(255, 255, 255, 0.3) !important;
          cursor: pointer !important;
          backdrop-filter: blur(10px) !important;
        }

        .healcode-contract-text-link.monthly-membership-btn:hover {
          background-color: rgba(255, 255, 255, 0.3) !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-contract-text-link.monthly-membership-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

      </div>

      <!-- Class Packages -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        
        <!-- 5 Class Package with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-[#845d45]/10">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">5 class package</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£115</div>
            <p class="text-sm text-gray-600 font-quicksand mb-2">£23 per session</p>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 1 month</p>
            <div class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full inline-block mb-4 font-quicksand">
              save £10
            </div>
            
            <!-- Your Mindbody Widget -->
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-pricing-option-text-link five-class-btn" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="100004" 
              data-bw-identity-site="true" 
              data-type="pricing-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
        </div>

        <style>
        /* Style the Mindbody button for 5 class package */
        .healcode-pricing-option-text-link.five-class-btn {
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
        }

        .healcode-pricing-option-text-link.five-class-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.five-class-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

        <!-- 10 Class Package with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-[#845d45]/10">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">10 class package</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£220</div>
            <p class="text-sm text-gray-600 font-quicksand mb-2">£22 per session</p>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 2 months</p>
            <div class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full inline-block mb-4 font-quicksand">
              save £30
            </div>
            
            <!-- Your Mindbody Widget -->
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-pricing-option-text-link ten-class-btn" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="100006" 
              data-bw-identity-site="true" 
              data-type="pricing-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
        </div>

        <style>
        /* Style the Mindbody button for 10 class package */
        .healcode-pricing-option-text-link.ten-class-btn {
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
        }

        .healcode-pricing-option-text-link.ten-class-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.ten-class-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

        <!-- 20 Class Package with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-[#845d45]/10">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">20 class package</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£400</div>
            <p class="text-sm text-gray-600 font-quicksand mb-2">£20 per session</p>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 3 months</p>
            <div class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full inline-block mb-4 font-quicksand">
              save £100
            </div>
            
            <!-- Your Mindbody Widget -->
            <healcode-widget 
              data-version="0.2" 
              data-link-class="healcode-pricing-option-text-link twenty-class-btn" 
              data-site-id="128729" 
              data-mb-site-id="5747508" 
              data-service-id="100007" 
              data-bw-identity-site="true" 
              data-type="pricing-link" 
              data-inner-html="Purchase Now">
            </healcode-widget>
          </div>
        </div>

        <style>
        /* Style the Mindbody button for 20 class package */
        .healcode-pricing-option-text-link.twenty-class-btn {
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
        }

        .healcode-pricing-option-text-link.twenty-class-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.twenty-class-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

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

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 lg:gap-4">
        
        <!-- Student Single Session with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">single session</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-4">£18</div>
          
          <!-- Your Mindbody Widget -->
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link student-single-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100009" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <style>
        /* Style the Mindbody button for student single session */
        .healcode-pricing-option-text-link.student-single-btn {
          display: inline-block !important;
          width: 100% !important;
          background-color: #845d45 !important;
          color: white !important;
          padding: 8px 16px !important;
          border-radius: 6px !important;
          text-decoration: none !important;
          font-family: 'Quicksand', sans-serif !important;
          font-weight: 500 !important;
          font-size: 14px !important;
          text-align: center !important;
          transition: all 0.3s ease !important;
          border: none !important;
          cursor: pointer !important;
        }

        .healcode-pricing-option-text-link.student-single-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.student-single-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

        <!-- Student Starter Intro with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">starter intro</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£45</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">3 sessions</p>
          
          <!-- Your Mindbody Widget -->
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link student-starter-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100012" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <style>
        /* Style the Mindbody button for student starter intro */
        .healcode-pricing-option-text-link.student-starter-btn {
          display: inline-block !important;
          width: 100% !important;
          background-color: #845d45 !important;
          color: white !important;
          padding: 8px 16px !important;
          border-radius: 6px !important;
          text-decoration: none !important;
          font-family: 'Quicksand', sans-serif !important;
          font-weight: 500 !important;
          font-size: 14px !important;
          text-align: center !important;
          transition: all 0.3s ease !important;
          border: none !important;
          cursor: pointer !important;
        }

        .healcode-pricing-option-text-link.student-starter-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.student-starter-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

        <!-- Student 5 Classes with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">5 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£85</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£17 per session</p>
          
          <!-- Your Mindbody Widget -->
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link student-five-class-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100010" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <style>
        /* Style the Mindbody button for student 5 classes */
        .healcode-pricing-option-text-link.student-five-class-btn {
          display: inline-block !important;
          width: 100% !important;
          background-color: #845d45 !important;
          color: white !important;
          padding: 8px 16px !important;
          border-radius: 6px !important;
          text-decoration: none !important;
          font-family: 'Quicksand', sans-serif !important;
          font-weight: 500 !important;
          font-size: 14px !important;
          text-align: center !important;
          transition: all 0.3s ease !important;
          border: none !important;
          cursor: pointer !important;
        }

        .healcode-pricing-option-text-link.student-five-class-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.student-five-class-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

        <!-- Student 10 Classes with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">10 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£160</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£16 per session</p>
          
          <!-- Your Mindbody Widget -->
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link student-ten-class-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100011" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <style>
        /* Style the Mindbody button for student 10 classes */
        .healcode-pricing-option-text-link.student-ten-class-btn {
          display: inline-block !important;
          width: 100% !important;
          background-color: #845d45 !important;
          color: white !important;
          padding: 8px 16px !important;
          border-radius: 6px !important;
          text-decoration: none !important;
          font-family: 'Quicksand', sans-serif !important;
          font-weight: 500 !important;
          font-size: 14px !important;
          text-align: center !important;
          transition: all 0.3s ease !important;
          border: none !important;
          cursor: pointer !important;
        }

        .healcode-pricing-option-text-link.student-ten-class-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.student-ten-class-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

<!-- Replace the existing student 20 classes div with this updated version -->
<div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
  <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">20 classes</h3>
  <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£300</div>
  <p class="text-xs text-gray-600 font-quicksand mb-4">£15 per session</p>
  
  <!-- Your Mindbody Widget -->
  <healcode-widget 
    data-version="0.2" 
    data-link-class="healcode-pricing-option-text-link student-twenty-class-btn" 
    data-site-id="128729" 
    data-mb-site-id="5747508" 
    data-service-id="100029" 
    data-bw-identity-site="true" 
    data-type="pricing-link" 
    data-inner-html="Purchase Now">
  </healcode-widget>
</div>

<style>
/* Style the Mindbody button for student 20 classes */
.healcode-pricing-option-text-link.student-twenty-class-btn {
  display: inline-block !important;
  width: 100% !important;
  background-color: #845d45 !important;
  color: white !important;
  padding: 8px 16px !important;
  border-radius: 6px !important;
  text-decoration: none !important;
  font-family: 'Quicksand', sans-serif !important;
  font-weight: 500 !important;
  font-size: 14px !important;
  text-align: center !important;
  transition: all 0.3s ease !important;
  border: none !important;
  cursor: pointer !important;
}

.healcode-pricing-option-text-link.student-twenty-class-btn:hover {
  background-color: #6e4635 !important;
  transform: scale(1.05) !important;
  color: white !important;
}

.healcode-pricing-option-text-link.student-twenty-class-btn:active {
  transform: scale(0.98) !important;
}
</style>

      </div>
    </div>

    <!-- Workspace Pricing -->
    <div class="mb-16 lg:mb-20">
      <div class="text-center mb-12">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#2b2a24] font-quicksand mb-4">
          workspace pricing
        </h2>
        <p class="text-base sm:text-lg text-[#845d45] font-quicksand mb-2">
          discounted rates for workspace members & co-working community
        </p>
        <p class="text-sm text-gray-600 font-quicksand">
          workspace membership required
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 lg:gap-4">
        
        <!-- Workspace Single Session with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">single session</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-4">£20</div>
          
          <!-- Your Mindbody Widget -->
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link workspace-single-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100013" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <style>
        /* Style the Mindbody button for workspace single session */
        .healcode-pricing-option-text-link.workspace-single-btn {
          display: inline-block !important;
          width: 100% !important;
          background-color: #845d45 !important;
          color: white !important;
          padding: 8px 16px !important;
          border-radius: 6px !important;
          text-decoration: none !important;
          font-family: 'Quicksand', sans-serif !important;
          font-weight: 500 !important;
          font-size: 14px !important;
          text-align: center !important;
          transition: all 0.3s ease !important;
          border: none !important;
          cursor: pointer !important;
        }

        .healcode-pricing-option-text-link.workspace-single-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.workspace-single-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

        <!-- Workspace Starter Intro with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">starter intro</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£50</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">3 sessions</p>
          
          <!-- Your Mindbody Widget -->
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link workspace-starter-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100014" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <style>
        /* Style the Mindbody button for workspace starter intro */
        .healcode-pricing-option-text-link.workspace-starter-btn {
          display: inline-block !important;
          width: 100% !important;
          background-color: #845d45 !important;
          color: white !important;
          padding: 8px 16px !important;
          border-radius: 6px !important;
          text-decoration: none !important;
          font-family: 'Quicksand', sans-serif !important;
          font-weight: 500 !important;
          font-size: 14px !important;
          text-align: center !important;
          transition: all 0.3s ease !important;
          border: none !important;
          cursor: pointer !important;
        }

        .healcode-pricing-option-text-link.workspace-starter-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.workspace-starter-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

        <!-- Workspace 5 Classes with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">5 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£96</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£19 per session</p>
          
          <!-- Your Mindbody Widget -->
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link workspace-five-class-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100015" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <style>
        /* Style the Mindbody button for workspace 5 classes */
        .healcode-pricing-option-text-link.workspace-five-class-btn {
          display: inline-block !important;
          width: 100% !important;
          background-color: #845d45 !important;
          color: white !important;
          padding: 8px 16px !important;
          border-radius: 6px !important;
          text-decoration: none !important;
          font-family: 'Quicksand', sans-serif !important;
          font-weight: 500 !important;
          font-size: 14px !important;
          text-align: center !important;
          transition: all 0.3s ease !important;
          border: none !important;
          cursor: pointer !important;
        }

        .healcode-pricing-option-text-link.workspace-five-class-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.workspace-five-class-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

        <!-- Workspace 10 Classes with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">10 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£180</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£18 per session</p>
          
          <!-- Your Mindbody Widget -->
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link workspace-ten-class-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100016" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <style>
        /* Style the Mindbody button for workspace 10 classes */
        .healcode-pricing-option-text-link.workspace-ten-class-btn {
          display: inline-block !important;
          width: 100% !important;
          background-color: #845d45 !important;
          color: white !important;
          padding: 8px 16px !important;
          border-radius: 6px !important;
          text-decoration: none !important;
          font-family: 'Quicksand', sans-serif !important;
          font-weight: 500 !important;
          font-size: 14px !important;
          text-align: center !important;
          transition: all 0.3s ease !important;
          border: none !important;
          cursor: pointer !important;
        }

        .healcode-pricing-option-text-link.workspace-ten-class-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.workspace-ten-class-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

        <!-- Workspace 20 Classes with Mindbody Widget -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">20 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£340</div>
          <p class="text-xs text-gray-600 font-quicksand mb-4">£17 per session</p>
          
          <!-- Your Mindbody Widget -->
          <healcode-widget 
            data-version="0.2" 
            data-link-class="healcode-pricing-option-text-link workspace-twenty-class-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508" 
            data-service-id="100017" 
            data-bw-identity-site="true" 
            data-type="pricing-link" 
            data-inner-html="Purchase Now">
          </healcode-widget>
        </div>

        <style>
        /* Style the Mindbody button for workspace 20 classes */
        .healcode-pricing-option-text-link.workspace-twenty-class-btn {
          display: inline-block !important;
          width: 100% !important;
          background-color: #845d45 !important;
          color: white !important;
          padding: 8px 16px !important;
          border-radius: 6px !important;
          text-decoration: none !important;
          font-family: 'Quicksand', sans-serif !important;
          font-weight: 500 !important;
          font-size: 14px !important;
          text-align: center !important;
          transition: all 0.3s ease !important;
          border: none !important;
          cursor: pointer !important;
        }

        .healcode-pricing-option-text-link.workspace-twenty-class-btn:hover {
          background-color: #6e4635 !important;
          transform: scale(1.05) !important;
          color: white !important;
        }

        .healcode-pricing-option-text-link.workspace-twenty-class-btn:active {
          transform: scale(0.98) !important;
        }
        </style>

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

<!-- Mindbody Script (if not already added at top) -->
<script src="https://widgets.mindbodyonline.com/javascripts/healcode.js" type="text/javascript"></script>

<style>
/* Enhanced card hover effects */
.group:hover {
  transform: translateY(-4px);
}

.cursor-pointer {
  cursor: pointer;
}

.transition-all {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>

<script>
// Initialize Mindbody widgets
document.addEventListener('DOMContentLoaded', function() {
  console.log('Page loaded, checking HealCode...');
  
  // Wait a moment for HealCode to be available
  setTimeout(function() {
    if (typeof HealCode !== 'undefined') {
      console.log('HealCode found, initializing...');
      HealCode.init();
      
      // Check again after initialization
      setTimeout(function() {
        const links = document.querySelectorAll('.healcode-pricing-option-text-link');
        console.log('Found Mindbody links:', links.length);
        links.forEach((link, index) => {
          console.log(`Link ${index}:`, link);
        });
      }, 1000);
    } else {
      console.log('HealCode not found');
    }
  }, 500);
});

// Handle purchase clicks with fallback
function handlePurchaseClick(element) {
  console.log('Purchase button clicked');
  
  // First try to find the Mindbody link
  const mindbodyLink = document.querySelector('.healcode-pricing-option-text-link');
  
  if (mindbodyLink) {
    console.log('Found Mindbody link, clicking...');
    mindbodyLink.click();
  } else {
    console.log('Mindbody link not found, trying to initialize...');
    
    // Try to reinitialize HealCode
    if (typeof HealCode !== 'undefined') {
      HealCode.init();
      
      // Try again after a short delay
      setTimeout(function() {
        const retryLink = document.querySelector('.healcode-pricing-option-text-link');
        if (retryLink) {
          retryLink.click();
          console.log('Clicked Mindbody link on retry');
        } else {
          // Fallback: redirect to booking page
          console.log('Fallback: redirecting to booking');
          window.location.href = '/book';
        }
      }, 500);
    } else {
      // Ultimate fallback
      console.log('HealCode not available, redirecting to booking');
      window.location.href = '/book';
    }
  }
}
</script>

<?php include 'partials/footer.php'; ?>