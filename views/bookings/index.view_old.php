<?php include 'views/partials/header.php'; ?>

<section class="bg-[#f2e9dc] py-16 sm:py-24 lg:py-32">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-8 sm:mb-12">
      <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#845d45] font-quicksand">book a class</h2>
      <p class="mt-2 text-sm sm:text-base text-gray-600 font-quicksand">choose from available time slots below.</p>
    </div>

    <!-- Mobile: Stack cards, Tablet+: Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6">
      <?php foreach ($slots as $dateKey => $slotGroup): ?>
        <?php
          [$dayName, $dateStr] = explode(', ', $dateKey);
          $formattedDate = date('F j', strtotime($dateStr)); // "August 2"
        ?>
        <!-- Responsive card with proper mobile sizing -->
        <div class="bg-[#fef5df] rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-4 sm:p-6">
          <h3 class="text-lg sm:text-xl font-semibold text-[#845d45] mb-4 font-quicksand text-center">
            <?= strtolower($dayName) ?> – <?= strtolower($formattedDate) ?>
          </h3>

          <div class="space-y-3">
            <?php foreach ($slotGroup as $slot): ?>
              <?php if ((int)$slot['capacity'] > 0): ?>
                <div class="relative">
                  <a href="/book/slot?id=<?= $slot['id'] ?>" class="block">
                    <button class="w-full rounded-full border-2 border-[#845d45] px-4 sm:px-6 lg:px-8 py-3 sm:py-4 text-[#845d45] font-quicksand hover:bg-[#845d45] hover:text-white transition-all duration-200 font-medium text-base sm:text-lg focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 active:scale-95">
                      <div class="flex flex-col items-center">
                        <div class="flex items-center gap-2 mb-1">
                          <?php
                            $start = DateTime::createFromFormat('H:i', $slot['time']);
                            $end = clone $start;
                            $end->modify('+50 minutes');
                          ?>
                          <span class="text-base sm:text-lg font-semibold"><?= $start->format('H:i') ?> – <?= $end->format('H:i') ?></span>
                          <?php if ($slot['women_only']): ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800 border border-pink-200">
                              ♀ women only
                            </span>
                          <?php endif; ?>
                        </div>
                        <span class="text-xs opacity-75"><?= $slot['capacity'] ?> spots available</span>
                      </div>
                    </button>
                  </a>
                </div>
              <?php else: ?>
                <div class="relative">
                  <button class="w-full rounded-full bg-gray-200 text-gray-500 font-medium px-4 sm:px-6 lg:px-8 py-3 sm:py-4 text-base sm:text-lg cursor-not-allowed opacity-60" disabled>
                    <div class="flex flex-col items-center">
                      <div class="flex items-center gap-2 mb-1">
                        <?php
                          $start = DateTime::createFromFormat('H:i', $slot['time']);
                          $end = clone $start;
                          $end->modify('+50 minutes');
                        ?>
                        <span class="text-base sm:text-lg font-semibold"><?= $start->format('H:i') ?> – <?= $end->format('H:i') ?></span>
                        <?php if ($slot['women_only']): ?>
                          <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600 border border-gray-300">
                            ♀ women only
                          </span>
                        <?php endif; ?>
                      </div>
                      <span class="text-xs text-gray-400">fully booked</span>
                    </div>
                  </button>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- No classes available message -->
    <?php if (empty($slots)): ?>
      <div class="text-center py-12">
        <div class="mx-auto max-w-md">
          <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <h3 class="mt-4 text-lg font-medium text-gray-900 font-quicksand">no classes available</h3>
          <p class="mt-2 text-sm text-gray-500 font-quicksand">check back soon for new time slots or contact us directly.</p>
          <div class="mt-6">
            <a href="mailto:hello@flowhavenstudios.com" 
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-[#845d45] hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#845d45] transition-colors">
              contact us
            </a>
          </div>
        </div>
      </div>
    <?php endif; ?>
    
    <!-- Help text for mobile users -->
    <div class="mt-8 sm:mt-12 text-center">
      <p class="text-xs sm:text-sm text-gray-500 font-quicksand">
        having trouble booking? <a href="mailto:hello@flowhavenstudios.com" class="text-[#845d45] hover:text-[#6e4635] underline">contact us</a> for assistance
      </p>
    </div>

  </div>
</section>

<!-- Loading state for better UX -->
<style>
  .loading-shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
  }
  
  @keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
  }
  
  @media (max-width: 640px) {
    /* Improve touch targets on mobile */
    button {
      min-height: 48px;
    }
  }

  /* Enhanced button styling for women-only classes */
  .women-only-button {
    position: relative;
  }
  
  .women-only-button::after {
    content: '';
    position: absolute;
    top: 2px;
    right: 2px;
    width: 8px;
    height: 8px;
    background-color: #ec4899;
    border-radius: 50%;
  }
</style>

<?php include 'views/partials/footer.php'; ?>