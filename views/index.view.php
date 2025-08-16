<?php include 'partials/header.php'; ?>

<div class="relative isolate overflow-hidden">
  <!-- Background image -->
  <picture>
    <source media="(max-width: 767px)" srcset="/assets/images/MainBackground.jpg">
    <source media="(max-width: 1023px)" srcset="/assets/images/MainBackground.jpg">
    <img src="/assets/images/MainBackground.jpg" alt="Flow Haven Studios Interior" 
         class="absolute inset-0 -z-10 size-full object-cover object-center" 
         loading="eager" />
  </picture>

  <div class="absolute inset-0 -z-10 bg-gradient-to-t from-black/60 via-black/20 to-black/40"></div>
  
  <!-- Responsive hero content -->
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl py-20 sm:py-32 lg:py-48 xl:py-56">
      <div class="text-center">
        <!-- Responsive heading -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-semibold tracking-tight text-balance text-white font-quicksand leading-tight">
          <span class="block sm:inline">find your flow</span>
          <span class="block sm:inline"> at flow haven</span>
        </h1>
        
        <!-- Responsive subtitle -->
        <p class="mt-6 sm:mt-8 text-base sm:text-lg lg:text-xl font-medium text-pretty text-white/90 font-quicksand max-w-2xl mx-auto">
          boutique reformer pilates studio in the heart of bethnal green
        </p>
        
        <!-- CTA button -->
        <div class="mt-8 sm:mt-10">
          <a href="/book" 
             class="inline-block rounded-full border-2 border-white px-6 sm:px-8 py-3 sm:py-4 text-white font-quicksand hover:bg-white hover:text-[#845d45] transition-all duration-300 font-medium text-base sm:text-lg shadow-lg hover:shadow-xl active:scale-95">
            book your session
          </a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Scroll indicator -->
  <div class="absolute bottom-8 sm:bottom-12 left-1/2 transform -translate-x-1/2 z-10">
    <button onclick="document.querySelector('.brand-story-section').scrollIntoView({behavior: 'smooth'})" 
            class="animate-bounce focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 rounded-full p-2"
            aria-label="Scroll to content">
      <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white hover:text-[#f2e9dc] transition-colors duration-200" 
           fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
      </svg>
    </button>
  </div>
  
  <!-- fade gradient -->
  <div class="absolute bottom-0 left-0 right-0 h-16 sm:h-24 lg:h-32 bg-gradient-to-t from-[#f2e9dc] via-[#f2e9dc]/50 to-transparent z-0"></div>
</div>

<!-- Brand Story Section -->
<div class="bg-[#f2e9dc] py-12 sm:py-16 lg:py-24 brand-story-section -mt-8 sm:-mt-12 lg:-mt-16" id="main-content">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl text-center">
      <p class="text-xl sm:text-2xl lg:text-3xl xl:text-4xl font-semibold leading-relaxed text-[#2b2a24] font-quicksand mb-8 sm:mb-10">
        flow haven is your power hour: intimate, soft-luxury reformer pilates, taught with precision and care. welcome to all. come for the burn, stay for the belonging.
      </p>
      <div class="mt-8 sm:mt-10">
        <a href="/book" 
           class="inline-block rounded-full border-2 border-[#845d45] px-6 sm:px-8 py-3 sm:py-4 text-[#845d45] font-quicksand hover:bg-[#845d45] hover:text-white transition-all duration-300 font-medium text-base sm:text-lg shadow-md hover:shadow-lg active:scale-95">
          find your flow
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Experience Section with responsive gallery -->
<div class="bg-[#f2e9dc] py-12 sm:py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <!-- Section header -->
    <div class="mx-auto max-w-3xl text-center mb-12 sm:mb-16 lg:mb-20">
      <h2 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-semibold tracking-tight text-balance text-[#2b2a24] font-quicksand">
        experience flow haven
      </h2>
      <p class="mt-4 sm:mt-6 text-base sm:text-lg text-[#845d45] font-quicksand">
        step inside our boutique studio and discover the space where transformation happens
      </p>
    </div>
    
    <!-- Responsive Gallery -->
    <div class="relative">
      <!-- Mobile: Horizontal scroll -->
      <div class="lg:hidden">
        <div class="flex gap-4 sm:gap-6 overflow-x-auto pb-4 snap-x snap-mandatory scrollbar-hide" 
             style="scrollbar-width: none; -ms-overflow-style: none;">
          
          <!-- Gallery items for mobile -->
          <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pt-80 pb-8 sm:pt-48 lg:pt-80 hover:transform hover:scale-105 transition-transform duration-200 flex-none w-80 snap-start">
            <img src="/assets/images/studio-reformers.jpg" alt="reformer pilates equipment" class="absolute inset-0 -z-10 size-full object-cover" />
            <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>
            <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-white/10"></div>

            <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm/6 text-[#f2e9dc]">
              <span class="mr-8 font-quicksand">state-of-the-art equipment</span>
            </div>
            <h3 class="mt-3 text-lg/6 font-semibold text-white font-quicksand">
              <span>premium reformers</span>
            </h3>
            <p class="mt-2 text-sm text-[#f2e9dc]/80 font-quicksand">
              experience pilates on our top-quality reformer machines in an intimate, welcoming environment.
            </p>
          </article>

          <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pt-80 pb-8 sm:pt-48 lg:pt-80 hover:transform hover:scale-105 transition-transform duration-200 flex-none w-80 snap-start">
            <img src="/assets/images/studio-atmosphere.jpg" alt="flow haven studio atmosphere" class="absolute inset-0 -z-10 size-full object-cover" />
            <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>
            <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-white/10"></div>

            <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm/6 text-[#f2e9dc]">
              <span class="mr-8 font-quicksand">bethnal green location</span>
            </div>
            <h3 class="mt-3 text-lg/6 font-semibold text-white font-quicksand">
              <span>boutique studio space</span>
            </h3>
            <p class="mt-2 text-sm text-[#f2e9dc]/80 font-quicksand">
              beautifully designed space in the heart of east london, creating the perfect atmosphere for your practice.
            </p>
          </article>

          <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pt-80 pb-8 sm:pt-48 lg:pt-80 hover:transform hover:scale-105 transition-transform duration-200 flex-none w-80 snap-start">
            <img src="/assets/images/studio-community.jpg" alt="flow haven community" class="absolute inset-0 -z-10 size-full object-cover" />
            <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>
            <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-white/10"></div>

            <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm/6 text-[#f2e9dc]">
              <span class="mr-8 font-quicksand">expert instruction</span>
            </div>
            <h3 class="mt-3 text-lg/6 font-semibold text-white font-quicksand">
              <span>personalized attention</span>
            </h3>
            <p class="mt-2 text-sm text-[#f2e9dc]/80 font-quicksand">
              small class sizes ensure every member receives individual guidance and form corrections.
            </p>
          </article>

          <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pt-80 pb-8 sm:pt-48 lg:pt-80 hover:transform hover:scale-105 transition-transform duration-200 flex-none w-80 snap-start">
            <img src="/assets/images/studio-juices.jpg" alt="fresh wellness juices" class="absolute inset-0 -z-10 size-full object-cover" />
            <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>
            <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-white/10"></div>

            <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm/6 text-[#f2e9dc]">
              <span class="mr-8 font-quicksand">wellness refreshments</span>
            </div>
            <h3 class="mt-3 text-lg/6 font-semibold text-white font-quicksand">
              <span>fresh pressed juices</span>
            </h3>
            <p class="mt-2 text-sm text-[#f2e9dc]/80 font-quicksand">
              nourish your body post-workout with our selection of cold-pressed juices and wellness drinks.
            </p>
          </article>

          <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pt-80 pb-8 sm:pt-48 lg:pt-80 hover:transform hover:scale-105 transition-transform duration-200 flex-none w-80 snap-start">
            <img src="/assets/images/studio-equipment-2.jpg" alt="additional pilates equipment" class="absolute inset-0 -z-10 size-full object-cover" />
            <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>
            <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-white/10"></div>

            <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm/6 text-[#f2e9dc]">
              <span class="mr-8 font-quicksand">complete studio setup</span>
            </div>
            <h3 class="mt-3 text-lg/6 font-semibold text-white font-quicksand">
              <span>props & accessories</span>
            </h3>
            <p class="mt-2 text-sm text-[#f2e9dc]/80 font-quicksand">
              enhance your practice with our curated selection of props, from resistance bands to stability balls.
            </p>
          </article>

          <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pt-80 pb-8 sm:pt-48 lg:pt-80 hover:transform hover:scale-105 transition-transform duration-200 flex-none w-80 snap-start">
            <img src="/assets/images/studio-equipment-3.jpg" alt="more pilates equipment" class="absolute inset-0 -z-10 size-full object-cover" />
            <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>
            <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-white/10"></div>

            <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm/6 text-[#f2e9dc]">
              <span class="mr-8 font-quicksand">specialized tools</span>
            </div>
            <h3 class="mt-3 text-lg/6 font-semibold text-white font-quicksand">
              <span>advanced apparatus</span>
            </h3>
            <p class="mt-2 text-sm text-[#f2e9dc]/80 font-quicksand">
              explore movement with our range of specialized pilates apparatus designed for deeper muscle engagement.
            </p>
          </article>

        </div>
        
        <!-- Mobile scroll indicators -->
        <div class="flex justify-center mt-4 space-x-2">
          <div class="w-2 h-2 bg-[#845d45] rounded-full"></div>
          <div class="w-2 h-2 bg-[#845d45]/30 rounded-full"></div>
          <div class="w-2 h-2 bg-[#845d45]/30 rounded-full"></div>
        </div>
      </div>

      <!-- Desktop: Grid layout -->
      <div class="hidden lg:grid lg:grid-cols-3 xl:grid-cols-4 gap-6 xl:gap-8">
        
        <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 pt-80 pb-8 px-8 hover:scale-105 transition-transform duration-200">
          <img src="/assets/images/studio-reformers.jpg" alt="reformer pilates equipment" 
               class="absolute inset-0 -z-10 size-full object-cover" loading="lazy" />
          <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>

          <div class="text-sm text-[#f2e9dc] font-quicksand mb-2">state-of-the-art equipment</div>
          <h3 class="text-lg font-semibold text-white font-quicksand mb-3">premium reformers</h3>
          <p class="text-sm text-[#f2e9dc]/80 font-quicksand">
            experience pilates on our top-quality reformer machines in an intimate, welcoming environment.
          </p>
        </article>

        <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 pt-80 pb-8 px-8 hover:scale-105 transition-transform duration-200">
          <img src="/assets/images/studio-atmosphere.jpg" alt="flow haven studio atmosphere" 
               class="absolute inset-0 -z-10 size-full object-cover" loading="lazy" />
          <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>

          <div class="text-sm text-[#f2e9dc] font-quicksand mb-2">bethnal green location</div>
          <h3 class="text-lg font-semibold text-white font-quicksand mb-3">boutique studio space</h3>
          <p class="text-sm text-[#f2e9dc]/80 font-quicksand">
            beautifully designed space in the heart of east london, creating the perfect atmosphere for your practice.
          </p>
        </article>

        <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 pt-80 pb-8 px-8 hover:scale-105 transition-transform duration-200">
          <img src="/assets/images/studio-community.jpg" alt="flow haven community" 
               class="absolute inset-0 -z-10 size-full object-cover" loading="lazy" />
          <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>

          <div class="text-sm text-[#f2e9dc] font-quicksand mb-2">expert instruction</div>
          <h3 class="text-lg font-semibold text-white font-quicksand mb-3">personalized attention</h3>
          <p class="text-sm text-[#f2e9dc]/80 font-quicksand">
            small class sizes ensure every member receives individual guidance and form corrections.
          </p>
        </article>

        <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 pt-80 pb-8 px-8 hover:scale-105 transition-transform duration-200 xl:block hidden">
          <img src="/assets/images/studio-juices.jpg" alt="fresh wellness juices" 
               class="absolute inset-0 -z-10 size-full object-cover" loading="lazy" />
          <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>

          <div class="text-sm text-[#f2e9dc] font-quicksand mb-2">wellness refreshments</div>
          <h3 class="text-lg font-semibold text-white font-quicksand mb-3">fresh pressed juices</h3>
          <p class="text-sm text-[#f2e9dc]/80 font-quicksand">
            nourish your body post-workout with our selection of cold-pressed juices and wellness drinks.
          </p>
        </article>

        <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 pt-80 pb-8 px-8 hover:scale-105 transition-transform duration-200 xl:block hidden">
          <img src="/assets/images/studio-equipment-2.jpg" alt="additional pilates equipment" 
               class="absolute inset-0 -z-10 size-full object-cover" loading="lazy" />
          <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>

          <div class="text-sm text-[#f2e9dc] font-quicksand mb-2">complete studio setup</div>
          <h3 class="text-lg font-semibold text-white font-quicksand mb-3">props & accessories</h3>
          <p class="text-sm text-[#f2e9dc]/80 font-quicksand">
              enhance your practice with our curated selection of props, from resistance bands to stability balls.
          </p>
        </article>

        <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 pt-80 pb-8 px-8 hover:scale-105 transition-transform duration-200 xl:block hidden">
          <img src="/assets/images/studio-equipment-3.jpg" alt="more pilates equipment" 
               class="absolute inset-0 -z-10 size-full object-cover" loading="lazy" />
          <div class="absolute inset-0 -z-10 bg-gradient-to-t from-[#2b2a24] via-[#2b2a24]/40"></div>

          <div class="text-sm text-[#f2e9dc] font-quicksand mb-2">specialized tools</div>
          <h3 class="text-lg font-semibold text-white font-quicksand mb-3">advanced apparatus</h3>
          <p class="text-sm text-[#f2e9dc]/80 font-quicksand">
          explore movement with our range of specialized pilates apparatus designed for deeper muscle engagement.
          </p>
        </article>

      </div>
    </div>
  </div>
</div>

<!-- Benefits Section with responsive icons -->
<div class="bg-[#f2e9dc] py-12 sm:py-16 lg:py-24 benefits-section">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <!-- Section header -->
    <div class="mx-auto max-w-3xl text-center mb-12 sm:mb-16 lg:mb-20">
      <h2 class="text-lg sm:text-xl font-semibold text-[#845d45] font-quicksand">why flow haven?</h2>
      <p class="mt-2 text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-bold tracking-tight text-[#2b2a24] font-quicksand">
        discover the benefits of reformer pilates
      </p>
      <p class="mt-4 sm:mt-6 text-base sm:text-lg text-gray-600 font-quicksand">
        more than just a workout — experience strength, focus, and connection in our bethnal green studio
      </p>
    </div>

    <!-- Responsive benefits grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-12 lg:gap-8">
      
      <!-- Strength & Flexibility -->
      <div class="text-center sm:text-left lg:text-center">
        <div class="flex justify-center sm:justify-start lg:justify-center mb-4">
          <div class="h-12 w-12 sm:h-14 sm:w-14 flex items-center justify-center rounded-full bg-[#845d45] text-white">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640" class="w-5 h-5 sm:w-6 sm:h-6">
              <path fill="#ffffff" d="M96 176C96 149.5 117.5 128 144 128C170.5 128 192 149.5 192 176L192 288L448 288L448 176C448 149.5 469.5 128 496 128C522.5 128 544 149.5 544 176L544 192L560 192C586.5 192 608 213.5 608 240L608 288C625.7 288 640 302.3 640 320C640 337.7 625.7 352 608 352L608 400C608 426.5 586.5 448 560 448L544 448L544 464C544 490.5 522.5 512 496 512C469.5 512 448 490.5 448 464L448 352L192 352L192 464C192 490.5 170.5 512 144 512C117.5 512 96 490.5 96 464L96 448L80 448C53.5 448 32 426.5 32 400L32 352C14.3 352 0 337.7 0 320C0 302.3 14.3 288 32 288L32 240C32 213.5 53.5 192 80 192L96 192L96 176z"/>
            </svg>              
          </div>
        </div>
        <h3 class="text-base sm:text-lg font-semibold font-quicksand text-[#845d45] mb-3">
          strength & flexibility
        </h3>
        <p class="text-sm sm:text-base text-gray-600 font-quicksand leading-relaxed">
          improve posture, control, and total-body strength through guided reformer workouts.
        </p>
      </div>

      <!-- Bethnal Green Location -->
      <div class="text-center sm:text-left lg:text-center">
        <div class="flex justify-center sm:justify-start lg:justify-center mb-4">
          <div class="h-12 w-12 sm:h-14 sm:w-14 flex items-center justify-center rounded-full bg-[#845d45] text-white">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640" class="w-5 h-5 sm:w-6 sm:h-6">
              <path fill="#ffffff" d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/>
            </svg>
          </div>
        </div>
        <h3 class="text-base sm:text-lg font-semibold font-quicksand text-[#845d45] mb-3">
          bethnal green location
        </h3>
        <p class="text-sm sm:text-base text-gray-600 font-quicksand leading-relaxed">
          conveniently based in east london, close to the station and surrounded by local charm.
        </p>
      </div>

      <!-- Personalized Classes -->
      <div class="text-center sm:text-left lg:text-center">
        <div class="flex justify-center sm:justify-start lg:justify-center mb-4">
          <div class="h-12 w-12 sm:h-14 sm:w-14 flex items-center justify-center rounded-full bg-[#845d45] text-white">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640" class="w-5 h-5 sm:w-6 sm:h-6">
              <path fill="#ffffff" d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/>
            </svg>
          </div>
        </div>
        <h3 class="text-base sm:text-lg font-semibold font-quicksand text-[#845d45] mb-3">
          personalized classes
        </h3>
        <p class="text-sm sm:text-base text-gray-600 font-quicksand leading-relaxed">
          small group sessions mean you get attention, form checks, and modifications that suit your body.
        </p>
      </div>

      <!-- Mind-Body Connection -->
      <div class="text-center sm:text-left lg:text-center">
        <div class="flex justify-center sm:justify-start lg:justify-center mb-4">
          <div class="h-12 w-12 sm:h-14 sm:w-14 flex items-center justify-center rounded-full bg-[#845d45] text-white">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640" class="w-5 h-5 sm:w-6 sm:h-6">
              <path fill="#ffffff" d="M184 120C184 89.1 209.1 64 240 64L264 64C281.7 64 296 78.3 296 96L296 544C296 561.7 281.7 576 264 576L232 576C202.2 576 177.1 555.6 170 528C169.3 528 168.7 528 168 528C123.8 528 88 492.2 88 448C88 430 94 413.4 104 400C84.6 385.4 72 362.2 72 336C72 305.1 89.6 278.2 115.2 264.9C108.1 252.9 104 238.9 104 224C104 179.8 139.8 144 184 144L184 120zM456 120L456 144C500.2 144 536 179.8 536 224C536 239 531.9 253 524.8 264.9C550.5 278.2 568 305 568 336C568 362.2 555.4 385.4 536 400C546 413.4 552 430 552 448C552 492.2 516.2 528 472 528C471.3 528 470.7 528 470 528C462.9 555.6 437.8 576 408 576L376 576C358.3 576 344 561.7 344 544L344 96C344 78.3 358.3 64 376 64L400 64C430.9 64 456 89.1 456 120z"/>
            </svg>
          </div>
        </div>
        <h3 class="text-base sm:text-lg font-semibold font-quicksand text-[#845d45] mb-3">
          mind-body connection
        </h3>
        <p class="text-sm sm:text-base text-gray-600 font-quicksand leading-relaxed">
          leave each class feeling stronger, clearer, and more centered — physically and mentally.
        </p>
      </div>

    </div>
  </div>
</div>

<!-- Responsive Call to Action Section -->
<div class="bg-[#f2e9dc] py-8 sm:py-12 lg:py-16">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="relative isolate overflow-hidden rounded-2xl sm:rounded-3xl shadow-2xl">
      
      <!-- Background -->
      <div class="absolute inset-0 -z-10">
        <picture>
          <source media="(max-width: 767px)" srcset="/assets/images/stjBg.jpg">
          <img src="/assets/images/stjBg.jpg" alt="Flow Haven Studio" 
               class="h-full w-full object-cover object-center" loading="lazy" />
        </picture>
        <div class="absolute inset-0 bg-black/50"></div>
      </div>
      
      <!-- Content -->
      <div class="px-6 py-16 sm:px-16 sm:py-24 lg:py-32 text-center">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-semibold tracking-tight text-white font-quicksand mb-4 sm:mb-6">
          start your journey today
        </h2>
        <p class="mx-auto max-w-2xl text-base sm:text-lg lg:text-xl text-white/90 font-quicksand mb-8 sm:mb-10">
          join our bethnal green studio and experience the transformation of reformer pilates
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
          <a href="/book" 
             class="w-full sm:w-auto inline-block rounded-full bg-[#845d45] px-6 sm:px-8 py-3 sm:py-4 text-white font-quicksand shadow-lg hover:bg-[#6e4635] hover:shadow-xl transition-all duration-300 font-medium text-base sm:text-lg active:scale-95">
            book a class
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Performance optimization styles -->
<style>
/* Hide scrollbar for webkit browsers */
.scrollbar-hide::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for firefox */
.scrollbar-hide {
  scrollbar-width: none;
}

/* Smooth scrolling */
.scrollbar-hide {
  scroll-behavior: smooth;
}

/* Responsive image optimization */
picture img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Touch feedback for mobile */
@media (max-width: 767px) {
  .active\:scale-95:active {
    transform: scale(0.95);
  }
  
  /* Improve tap targets */
  button, a {
    min-height: 44px;
  }
}

/* Intersection Observer animation setup */
.animate-on-scroll {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.animate-on-scroll.in-view {
  opacity: 1;
  transform: translateY(0);
}

/* Hover effects for desktop */
@media (min-width: 1024px) {
  .hover\:scale-105:hover {
    transform: scale(1.05);
  }
}

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
  .animate-bounce {
    animation: none;
  }
  
  .transition-transform {
    transition: none;
  }
}
</style>

<!-- Enhanced JavaScript for homepage -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Intersection Observer for animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
      }
    });
  }, observerOptions);
  
  // Add animation class to sections
  const sections = document.querySelectorAll('.benefits-section > div, .brand-story-section > div');
  sections.forEach(section => {
    section.classList.add('animate-on-scroll');
    observer.observe(section);
  });
  
  // Mobile gallery scroll indicators
  const gallery = document.querySelector('.lg\\:hidden .flex.gap-4');
  const indicators = document.querySelectorAll('.flex.justify-center.mt-4 > div');
  
  if (gallery && indicators.length > 0) {
    gallery.addEventListener('scroll', () => {
      const scrollLeft = gallery.scrollLeft;
      const itemWidth = gallery.children[0].offsetWidth + 24; // width + gap
      const activeIndex = Math.round(scrollLeft / itemWidth);
      
      indicators.forEach((indicator, index) => {
        if (index === activeIndex) {
          indicator.classList.remove('bg-[#845d45]/30');
          indicator.classList.add('bg-[#845d45]');
        } else {
          indicator.classList.remove('bg-[#845d45]');
          indicator.classList.add('bg-[#845d45]/30');
        }
      });
    });
  }
  
  // Preload critical images
  const criticalImages = [
    '/assets/images/MainBackground.jpg',
    '/assets/images/studio-reformers.jpg'
  ];
  
  criticalImages.forEach(src => {
    const img = new Image();
    img.src = src;
  });
  
  // Lazy load non-critical images
  const lazyImages = document.querySelectorAll('img[loading="lazy"]');
  const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        if (img.dataset.src) {
          img.src = img.dataset.src;
          img.removeAttribute('data-src');
        }
        imageObserver.unobserve(img);
      }
    });
  });
  
  lazyImages.forEach(img => imageObserver.observe(img));
});
</script>

<?php include 'partials/footer.php'; ?>