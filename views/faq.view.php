<?php include base_path('views/partials/header.php'); ?>

<div class="bg-[#f2e9dc] min-h-screen">
  <div class="mx-auto max-w-7xl px-6 py-16 sm:py-24 lg:px-8">
    <!-- Header Section -->
    <div class="mx-auto max-w-3xl text-center">
      <h2 class="text-4xl font-semibold tracking-tight text-[#2b2a24] sm:text-5xl font-quicksand">frequently asked questions</h2>
      <p class="mt-6 text-base/7 text-[#845d45] font-quicksand">have a different question and can't find the answer you're looking for? reach out to our support team by <a href="mailto:hello@flowhavenstudios.com" class="font-semibold text-[#845d45] hover:text-[#6e4635] underline decoration-2 underline-offset-2 transition-colors duration-200">sending us an email</a> and we'll get back to you as soon as we can.</p>
    </div>

    <!-- Search Bar -->
    <div class="mx-auto max-w-xl mt-12">
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
        <input type="text" 
               id="faq-search" 
               class="block w-full pl-10 pr-3 py-3 border border-[#845d45]/20 rounded-full text-[#2b2a24] placeholder-[#845d45]/60 focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:border-transparent bg-white/80 backdrop-blur-sm font-quicksand" 
               placeholder="Search FAQs..." 
               onkeyup="filterFAQs()">
      </div>
    </div>

    <!-- FAQ Categories -->
    <div class="flex flex-wrap justify-center gap-3 mt-8 mb-12">
      <button onclick="filterByCategory('all')" class="category-btn active px-4 py-2 rounded-full text-sm font-medium font-quicksand transition-all duration-200 bg-[#845d45] text-white">all</button>
      <button onclick="filterByCategory('location')" class="category-btn px-4 py-2 rounded-full text-sm font-medium font-quicksand transition-all duration-200 bg-white/60 text-[#845d45] hover:bg-[#845d45] hover:text-white">location</button>
      <button onclick="filterByCategory('classes')" class="category-btn px-4 py-2 rounded-full text-sm font-medium font-quicksand transition-all duration-200 bg-white/60 text-[#845d45] hover:bg-[#845d45] hover:text-white">classes</button>
      <button onclick="filterByCategory('booking')" class="category-btn px-4 py-2 rounded-full text-sm font-medium font-quicksand transition-all duration-200 bg-white/60 text-[#845d45] hover:bg-[#845d45] hover:text-white">booking</button>
      <button onclick="filterByCategory('equipment')" class="category-btn px-4 py-2 rounded-full text-sm font-medium font-quicksand transition-all duration-200 bg-white/60 text-[#845d45] hover:bg-[#845d45] hover:text-white">equipment</button>
    </div>

    <!-- FAQ Accordion -->
    <div class="mx-auto max-w-4xl mt-16">
      <div class="space-y-4" id="faq-container">
        
        <!-- Location FAQs -->
        <div class="faq-item bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-white/40" data-category="location">
          <button class="faq-question w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/40 rounded-2xl transition-all duration-200" onclick="toggleFAQ(this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#845d45]/10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </div>
              <span class="text-lg font-semibold text-[#2b2a24] font-quicksand">where are you located?</span>
            </div>
            <svg class="w-5 h-5 text-[#845d45] transition-transform duration-200 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="faq-answer hidden px-6 pb-6">
            <div class="pl-14 text-gray-600 font-quicksand leading-relaxed">
              we're based inside the pill box in bethnal green, east london. the address is unit g01, 115 coventry road, e2 6gh. we're just a 4-minute walk from bethnal green underground station, 3 minutes from the overground, and easily accessible by multiple bus routes.
            </div>
          </div>
        </div>

        <div class="faq-item bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-white/40" data-category="location">
          <button class="faq-question w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/40 rounded-2xl transition-all duration-200" onclick="toggleFAQ(this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#845d45]/10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
              </div>
              <span class="text-lg font-semibold text-[#2b2a24] font-quicksand">is there parking available?</span>
            </div>
            <svg class="w-5 h-5 text-[#845d45] transition-transform duration-200 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="faq-answer hidden px-6 pb-6">
            <div class="pl-14 text-gray-600 font-quicksand leading-relaxed">
              pay-and-display bays are available on the main roads outside the studio from 09:00 – 17:00, monday–saturday. sainsbury's car park (6-minute walk) offers 90 minutes of free parking. free on-street parking is usually available on nearby roads after 17:00 on saturdays and all-day sunday. always check local signs for the latest restrictions.
            </div>
          </div>
        </div>

        <!-- Classes FAQs -->
        <div class="faq-item bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-white/40" data-category="classes">
          <button class="faq-question w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/40 rounded-2xl transition-all duration-200" onclick="toggleFAQ(this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#845d45]/10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
              </div>
              <span class="text-lg font-semibold text-[#2b2a24] font-quicksand">do you offer classes for beginners?</span>
            </div>
            <svg class="w-5 h-5 text-[#845d45] transition-transform duration-200 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="faq-answer hidden px-6 pb-6">
            <div class="pl-14 text-gray-600 font-quicksand leading-relaxed">
              absolutely! we have classes for beginners, intermediate, and advanced levels, so whether you are brand new or experienced, there's a class suited to you.
            </div>
          </div>
        </div>

        <div class="faq-item bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-white/40" data-category="classes">
          <button class="faq-question w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/40 rounded-2xl transition-all duration-200" onclick="toggleFAQ(this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#845d45]/10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
              </div>
              <span class="text-lg font-semibold text-[#2b2a24] font-quicksand">do you run women-only or men-only classes?</span>
            </div>
            <svg class="w-5 h-5 text-[#845d45] transition-transform duration-200 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="faq-answer hidden px-6 pb-6">
            <div class="pl-14 text-gray-600 font-quicksand leading-relaxed">
              yes. we schedule women-only and men-only reformer sessions each week alongside our mixed-gender classes. exact days and times can vary, so please check the live timetable in the booking app or on our website before reserving your spot.
            </div>
          </div>
        </div>

        <div class="faq-item bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-white/40" data-category="location">
          <button class="faq-question w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/40 rounded-2xl transition-all duration-200" onclick="toggleFAQ(this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#845d45]/10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M10.5 4L12 2l1.5 2M10.5 4L12 6l1.5-2M10.5 4h3"></path>
                </svg>
              </div>
              <span class="text-lg font-semibold text-[#2b2a24] font-quicksand">do you have changing rooms or showers?</span>
            </div>
            <svg class="w-5 h-5 text-[#845d45] transition-transform duration-200 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="faq-answer hidden px-6 pb-6">
            <div class="pl-14 text-gray-600 font-quicksand leading-relaxed">
              while our studio doesn't have its own changing rooms, there are changing and shower facilities on the premises that our clients are welcome to use.
            </div>
          </div>
        </div>

        <div class="faq-item bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-white/40" data-category="classes">
          <button class="faq-question w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/40 rounded-2xl transition-all duration-200" onclick="toggleFAQ(this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#845d45]/10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <span class="text-lg font-semibold text-[#2b2a24] font-quicksand">do you offer private sessions?</span>
            </div>
            <svg class="w-5 h-5 text-[#845d45] transition-transform duration-200 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="faq-answer hidden px-6 pb-6">
            <div class="pl-14 text-gray-600 font-quicksand leading-relaxed">
              yes, we do! for private 1:1 or small group sessions, please email us at <a href="mailto:hello@flowhavenstudios.com" class="text-[#845d45] hover:text-[#6e4635] underline decoration-2 underline-offset-2 transition-colors duration-200">hello@flowhavenstudios.com</a> to enquire or book.
            </div>
          </div>
        </div>

        <!-- Booking FAQs -->
        <div class="faq-item bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-white/40" data-category="booking">
          <button class="faq-question w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/40 rounded-2xl transition-all duration-200" onclick="toggleFAQ(this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#845d45]/10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <span class="text-lg font-semibold text-[#2b2a24] font-quicksand">what's your lateness policy?</span>
            </div>
            <svg class="w-5 h-5 text-[#845d45] transition-transform duration-200 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="faq-answer hidden px-6 pb-6">
            <div class="pl-14 text-gray-600 font-quicksand leading-relaxed">
              we allow a 5-minute grace period. after that, you won't be allowed to join the class and your credit will be forfeited, so please arrive 5-10 minutes before your class to avoid disappointment.
            </div>
          </div>
        </div>

        <div class="faq-item bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-white/40" data-category="booking">
          <button class="faq-question w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/40 rounded-2xl transition-all duration-200" onclick="toggleFAQ(this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#845d45]/10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a2 2 0 100-4 2 2 0 000 4zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                </svg>
              </div>
              <span class="text-lg font-semibold text-[#2b2a24] font-quicksand">can i cancel or reschedule my class?</span>
            </div>
            <svg class="w-5 h-5 text-[#845d45] transition-transform duration-200 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="faq-answer hidden px-6 pb-6">
            <div class="pl-14 text-gray-600 font-quicksand leading-relaxed">
              yes! you can cancel or reschedule your booking up to 24 hours in advance. cancellations made after this window will result in the loss of class credit.
            </div>
          </div>
        </div>

        <div class="faq-item bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-white/40" data-category="booking">
          <button class="faq-question w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/40 rounded-2xl transition-all duration-200" onclick="toggleFAQ(this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#845d45]/10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a2 2 0 100-4 2 2 0 000 4zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                </svg>
              </div>
              <span class="text-lg font-semibold text-[#2b2a24] font-quicksand">how can i book a class?</span>
            </div>
            <svg class="w-5 h-5 text-[#845d45] transition-transform duration-200 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="faq-answer hidden px-6 pb-6">
            <div class="pl-14 text-gray-600 font-quicksand leading-relaxed">
              you can book classes directly via our website or booking platform. simply choose your date and time slot and secure your spot.
            </div>
          </div>
        </div>

        <!-- Equipment FAQs -->
        <div class="faq-item bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-white/40" data-category="equipment">
          <button class="faq-question w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/40 rounded-2xl transition-all duration-200" onclick="toggleFAQ(this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#845d45]/10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
              </div>
              <span class="text-lg font-semibold text-[#2b2a24] font-quicksand">what should i wear to class?</span>
            </div>
            <svg class="w-5 h-5 text-[#845d45] transition-transform duration-200 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="faq-answer hidden px-6 pb-6">
            <div class="pl-14 text-gray-600 font-quicksand leading-relaxed">
              please wear comfortable, breathable workout clothing that allows for movement. grip socks are essential for hygiene and safety. these are available to purchase at the front desk.
            </div>
          </div>
        </div>

        <div class="faq-item bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-white/40" data-category="equipment">
          <button class="faq-question w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/40 rounded-2xl transition-all duration-200" onclick="toggleFAQ(this)">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#845d45]/10 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m8 6V9a2 2 0 00-2-2H10a2 2 0 00-2 2v3.1M16 19v-3a2 2 0 00-2-2H10a2 2 0 00-2 2v3a2 2 0 002 2h4a2 2 0 002-2z"></path>
                </svg>
              </div>
              <span class="text-lg font-semibold text-[#2b2a24] font-quicksand">what equipment do i need to bring?</span>
            </div>
            <svg class="w-5 h-5 text-[#845d45] transition-transform duration-200 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="faq-answer hidden px-6 pb-6">
            <div class="pl-14 text-gray-600 font-quicksand leading-relaxed">
              just bring your grip socks and a water bottle. all pilates equipment is provided.
            </div>
          </div>
        </div>

      </div>

      <!-- No Results Message -->
      <div id="no-results" class="hidden text-center py-12">
        <div class="w-16 h-16 bg-[#845d45]/10 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-8 h-8 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-[#2b2a24] font-quicksand mb-2">no matches found</h3>
        <p class="text-[#845d45] font-quicksand">try a different search term or browse all FAQs</p>
      </div>
    </div>

    <!-- Contact CTA -->
    <div class="mx-auto max-w-2xl mt-20 text-center">
      <div class="bg-white/40 backdrop-blur-sm rounded-3xl p-8 border border-white/60">
        <h3 class="text-2xl font-semibold text-[#2b2a24] font-quicksand mb-4">still have questions?</h3>
        <p class="text-[#845d45] font-quicksand mb-6">our team is here to help you find your flow</p>
        <a href="mailto:hello@flowhavenstudios.com" class="inline-flex items-center gap-2 bg-[#845d45] text-white px-6 py-3 rounded-full font-medium font-quicksand hover:bg-[#6e4635] transition-colors duration-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
          </svg>
          contact us
        </a>
      </div>
    </div>
  </div>
</div>

<script>
function toggleFAQ(button) {
  const faqItem = button.closest('.faq-item');
  const answer = faqItem.querySelector('.faq-answer');
  const chevron = button.querySelector('.faq-chevron');
  
  // Close all other open FAQs
  document.querySelectorAll('.faq-item').forEach(item => {
    if (item !== faqItem) {
      item.querySelector('.faq-answer').classList.add('hidden');
      item.querySelector('.faq-chevron').style.transform = 'rotate(0deg)';
    }
  });
  
  // Toggle current FAQ
  answer.classList.toggle('hidden');
  
  if (answer.classList.contains('hidden')) {
    chevron.style.transform = 'rotate(0deg)';
  } else {
    chevron.style.transform = 'rotate(180deg)';
  }
}

function filterFAQs() {
  const searchTerm = document.getElementById('faq-search').value.toLowerCase();
  const faqItems = document.querySelectorAll('.faq-item');
  let visibleCount = 0;
  
  faqItems.forEach(item => {
    const question = item.querySelector('.faq-question span').textContent.toLowerCase();
    const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
    
    if (question.includes(searchTerm) || answer.includes(searchTerm)) {
      item.style.display = 'block';
      visibleCount++;
    } else {
      item.style.display = 'none';
    }
  });
  
  // Show/hide no results message
  document.getElementById('no-results').classList.toggle('hidden', visibleCount > 0);
}

function filterByCategory(category) {
  const faqItems = document.querySelectorAll('.faq-item');
  const categoryButtons = document.querySelectorAll('.category-btn');
  
  // Update active button
  categoryButtons.forEach(btn => {
    btn.classList.remove('active', 'bg-[#845d45]', 'text-white');
    btn.classList.add('bg-white/60', 'text-[#845d45]');
  });
  
  event.target.classList.add('active', 'bg-[#845d45]', 'text-white');
  event.target.classList.remove('bg-white/60', 'text-[#845d45]');
  
  // Filter FAQs
  let visibleCount = 0;
  faqItems.forEach(item => {
    const itemCategory = item.getAttribute('data-category');
    
    if (category === 'all' || itemCategory === category) {
      item.style.display = 'block';
      visibleCount++;
    } else {
      item.style.display = 'none';
    }
  });
  
  // Clear search when filtering by category
  document.getElementById('faq-search').value = '';
  document.getElementById('no-results').classList.add('hidden');
}
</script>

<?php include 'partials/footer.php'; ?>