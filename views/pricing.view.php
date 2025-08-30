<?php include 'partials/header.php'; ?>

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
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-[#845d45]/10">
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
          </div>
        </div>

        <!-- Starter Package -->
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
          </div>
        </div>

        <!-- Monthly Membership -->
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
          </div>
        </div>

      </div>

      <!-- Class Packages -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        
        <!-- 5 Class Package -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-[#845d45]/10">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">5 class package</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£115</div>
            <p class="text-sm text-gray-600 font-quicksand mb-2">£23 per session</p>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 1 month</p>
            <div class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full inline-block mb-4 font-quicksand">
              save £10
            </div>
          </div>
        </div>

        <!-- 10 Class Package -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-[#845d45]/10">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">10 class package</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£220</div>
            <p class="text-sm text-gray-600 font-quicksand mb-2">£22 per session</p>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 2 months</p>
            <div class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full inline-block mb-4 font-quicksand">
              save £30
            </div>
          </div>
        </div>

        <!-- 20 Class Package -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 lg:p-8 border border-[#845d45]/10">
          <div class="text-center">
            <h3 class="text-xl lg:text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">20 class package</h3>
            <div class="text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand mb-2">£400</div>
            <p class="text-sm text-gray-600 font-quicksand mb-2">£20 per session</p>
            <p class="text-sm text-gray-600 font-quicksand mb-6">valid for 3 months</p>
            <div class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full inline-block mb-4 font-quicksand">
              save £100
            </div>
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

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 lg:gap-4">
        
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">single session</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand">£18</div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">starter intro</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£45</div>
          <p class="text-xs text-gray-600 font-quicksand">3 sessions</p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">5 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£85</div>
          <p class="text-xs text-gray-600 font-quicksand">£17 per session</p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">10 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£160</div>
          <p class="text-xs text-gray-600 font-quicksand">£16 per session</p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">20 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£300</div>
          <p class="text-xs text-gray-600 font-quicksand">£15 per session</p>
        </div>

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
        
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">single session</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand">£20</div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">starter intro</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£50</div>
          <p class="text-xs text-gray-600 font-quicksand">3 sessions</p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">5 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£96</div>
          <p class="text-xs text-gray-600 font-quicksand">£19 per session</p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">10 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£180</div>
          <p class="text-xs text-gray-600 font-quicksand">£18 per session</p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border border-[#845d45]/10 text-center">
          <h3 class="text-lg font-bold text-[#2b2a24] font-quicksand mb-2">20 classes</h3>
          <div class="text-2xl font-bold text-[#845d45] font-quicksand mb-1">£340</div>
          <p class="text-xs text-gray-600 font-quicksand">£17 per session</p>
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

<?php include 'partials/footer.php'; ?>