<?php include 'partials/header.php'; ?>
  <div class="relative isolate overflow-hidden pt-20">
    <img src="/assets/images/MainBackground.jpg" alt="" class="absolute inset-0 -z-10 size-full object-cover" />

    <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
      <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-288.75"></div>
    </div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
        <div class="text-center">
          <h1 class="text-5xl font-semibold tracking-tight text-balance text-white sm:text-7xl font-quicksand">find Your flow at flow haven</h1>
          <p class="mt-8 text-lg font-medium text-pretty text-white sm:text-xl/8 font-quicksand">Boutique Reformer Pilates studio in the heart of Bethnal Green.</p>
          <div class="mt-10 h-12"></div> <!-- Spacer to maintain original hero height -->
        </div>
      </div>
    </div>
    
    <!-- Scroll Down Arrow positioned at bottom of hero -->
    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-10">
      <div class="animate-bounce">
        <svg class="w-8 h-8 text-white cursor-pointer hover:text-[#f2e9dc] transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" onclick="document.querySelector('.brand-story-section').scrollIntoView({behavior: 'smooth'})">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
      </div>
    </div>
    
    <!-- Fade gradient overlay -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-[#f2e9dc] via-[#f2e9dc]/50 to-transparent z-0"></div>
    
    <div aria-hidden="true" class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
      <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-288.75"></div>
    </div>
  </div>

  <!-- Brand Story Section with seamless connection -->
  <div class="bg-[#f2e9dc] py-16 sm:py-24 brand-story-section -mt-16">
    <div class="mx-auto max-w-4xl px-6 lg:px-8">
      <div class="mx-auto max-w-3xl text-center">
        <p class="text-4xl font-semibold leading-9 text-[#2b2a24] font-quicksand mb-8">
        flow haven is your power hour: intimate, soft-luxury reformer pilates, taught with precision and care. welcome to all. come for the burn, stay for the belonging.        </p>
        <div class="mt-10">
          <a href="/book" class="inline-block rounded-full border-2 border-[#845d45] px-8 py-4 text-[#845d45] font-quicksand hover:bg-[#845d45] hover:text-white transition font-medium text-lg">
            find your flow
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-[#f2e9dc] py-24 sm:py-5">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-4xl font-semibold tracking-tight text-balance text-[#2b2a24] sm:text-5xl font-quicksand">experience flow haven</h2>
        <p class="mt-2 text-lg/8 text-[#845d45] font-quicksand">step inside our boutique studio and discover the space where transformation happens.</p>
      </div>
      
      <!-- Horizontal Scrollable Cards with scroll indicators -->
      <div class="mt-16 sm:mt-20 relative">
        <!-- Left scroll indicator -->
        <div class="absolute left-2 top-1/2 -translate-y-1/2 z-10 opacity-50 lg:hidden">
          <div class="bg-white/80 rounded-full p-2 shadow-lg">
            <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
          </div>
        </div>
        
        <!-- Right scroll indicator -->
        <div class="absolute right-2 top-1/2 -translate-y-1/2 z-10 opacity-50 lg:hidden">
          <div class="bg-white/80 rounded-full p-2 shadow-lg">
            <svg class="w-5 h-5 text-[#845d45]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </div>
        </div>

        <div class="flex gap-8 overflow-x-auto pb-4 snap-x snap-mandatory scrollbar-hide" style="scrollbar-width: none; -ms-overflow-style: none;">
          
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
      </div>
    </div>
  </div>

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
</style>

  <div class="bg-[#f2e9dc] py-12 sm:py-16 benefits-section">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:text-center">
        <h2 class="text-xl font-semibold text-[#845d45] font-quicksand">why flow haven?</h2>
        <p class="mt-2 text-4xl font-bold tracking-tight text-[#2b2a24] sm:text-5xl font-quicksand">discover the benefits of reformer pilates</p>
        <p class="mt-6 text-lg text-gray-600 font-quicksand">more than just a workout — experience strength, focus, and connection in our bethnal green studio.</p>
      </div>

      <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
        <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-4">
          
          <!-- Strength & Flexibility -->
          <div class="flex flex-col">
            <dt class="flex items-center gap-x-3 text-lg font-semibold font-quicksand text-[#845d45]">
              <div class="h-10 w-10 flex items-center justify-center rounded-full bg-[#845d45] text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path d="M6 6h2v12H6zM16 6h2v12h-2zM9 12h6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              strength & flexibility
            </dt>
            <dd class="mt-4 text-base text-gray-600 font-quicksand">
              improve posture, control, and total-body strength through guided reformer workouts.
            </dd>
          </div>

          <!-- Bethnal Green Location -->
          <div class="flex flex-col">
            <dt class="flex items-center gap-x-3 text-lg font-semibold font-quicksand text-[#845d45]">
              <div class="h-10 w-10 flex items-center justify-center rounded-full bg-[#845d45] text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path d="M12 11c1.66 0 3-1.34 3-3S13.66 5 12 5s-3 1.34-3 3 1.34 3 3 3zM12 22s8-5.33 8-10a8 8 0 10-16 0c0 4.67 8 10 8 10z" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              bethnal green location
            </dt>
            <dd class="mt-4 text-base text-gray-600 font-quicksand">
              conveniently based in east london, close to the station and surrounded by local charm.
            </dd>
          </div>

          <!-- Personalized Classes -->
          <div class="flex flex-col">
            <dt class="flex items-center gap-x-3 text-lg font-semibold font-quicksand text-[#845d45]">
              <div class="h-10 w-10 flex items-center justify-center rounded-full bg-[#845d45] text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path d="M5.121 17.804A5.985 5.985 0 0112 15c1.657 0 3.156.672 4.243 1.758M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              personalized classes
            </dt>
            <dd class="mt-4 text-base text-gray-600 font-quicksand">
              small group sessions mean you get attention, form checks, and modifications that suit your body.
            </dd>
          </div>

          <!-- Mind-Body Connection -->
          <div class="flex flex-col">
            <dt class="flex items-center gap-x-3 text-lg font-semibold font-quicksand text-[#845d45]">
              <div class="h-10 w-10 flex items-center justify-center rounded-full bg-[#845d45] text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path d="M4 4v6h6M20 20v-6h-6M9 14a6 6 0 016-6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              mind-body connection
            </dt>
            <dd class="mt-4 text-base text-gray-600 font-quicksand">
              leave each class feeling stronger, clearer, and more centered — physically and mentally.
            </dd>
          </div>

        </dl>
      </div>
    </div>
  </div>

<!-- Fixed Call to Action Section for Mobile -->
<div class="bg-[#f2e9dc]">
  <div class="mx-auto max-w-7xl py-8 px-4 sm:py-12 sm:px-6 lg:px-8 lg:py-16">
    <div class="relative isolate overflow-hidden px-4 py-16 text-center shadow-2xl sm:rounded-3xl sm:px-16 sm:py-24">
      
      <!-- Background with proper mobile handling -->
      <div class="absolute inset-0 -z-10">
        <img src="assets/images/stjBg.jpg" alt="" class="h-full w-full object-cover object-center" />
        <!-- Dark overlay for better text readability -->
        <div class="absolute inset-0 bg-black/40"></div>
      </div>
      
      <h2 class="text-2xl font-semibold tracking-tight text-white sm:text-4xl lg:text-5xl font-quicksand">
        start your journey today
      </h2>
      <p class="mx-auto mt-4 max-w-xl text-base text-white/90 font-quicksand sm:mt-6 sm:text-lg">
        join our bethnal green studio and experience the transformation of reformer pilates.
      </p>

      <div class="mt-8 flex items-center justify-center gap-x-6 sm:mt-10">
        <a href="/book" class="inline-block rounded-full bg-[#845d45] px-6 py-3 text-white font-quicksand shadow-md hover:bg-[#6e4635] transition font-medium text-sm sm:text-base">
            Book a Class
        </a>
      </div>

    </div>
  </div>
</div>

<?php include 'partials/footer.php'; ?>