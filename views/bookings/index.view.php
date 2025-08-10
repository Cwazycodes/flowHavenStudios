<?php include 'views/partials/header.php'; ?>

<section class="bg-[#f2e9dc] py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="text-center mb-10">
      <h2 class="text-3xl font-bold text-[#845d45] sm:text-4xl font-quicksand">book a class</h2>
      <p class="mt-2 text-sm text-gray-600 font-quicksand">choose from available time slots below.</p>
    </div>

    <div class="flex flex-wrap justify-center gap-6">
    <?php foreach ($slots as $dateKey => $slotGroup): ?>
  <?php
    [$dayName, $dateStr] = explode(', ', $dateKey);
    $formattedDate = date('F j', strtotime($dateStr)); // "August 2"
  ?>
  <div class="w-[500px] bg-[#fef5df] rounded-lg shadow p-6 hover:shadow-xl">
    <h3 class="text-xl font-semibold text-[#845d45] mb-4 font-quicksand"><?= strtolower($dayName) ?> – <?= strtolower($formattedDate) ?></h3>

    <div class="space-y-2">
      <?php foreach ($slotGroup as $slot): ?>
        <?php if ((int)$slot['capacity'] > 0): ?>
          <a href="/book/slot?id=<?= $slot['id'] ?>" class="block">
            <button class="w-full rounded-full border-2 border-[#845d45] px-8 py-4 text-[#845d45] font-quicksand hover:bg-[#845d45] hover:text-white transition font-medium text-lg">
            <?php
              $start = DateTime::createFromFormat('H:i', $slot['time']);
              $end = clone $start;
              $end->modify('+50 minutes');
            ?>
            <?= $start->format('H:i') ?> – <?= $end->format('H:i') ?>
              <!-- <span class="ml-2 text-xs text-white">(<?= $slot['capacity'] ?> spots)</span> -->
            </button>
          </a>
        <?php else: ?>
          <button class="w-full rounded-full bg-gray-300 text-gray-500 font-medium px-8 py-4 text-lg cursor-not-allowed" disabled>
          <?php
            $start = DateTime::createFromFormat('H:i', $slot['time']);
            $end = clone $start;
            $end->modify('+50 minutes');
          ?>
          <?= $start->format('H:i') ?> – <?= $end->format('H:i') ?>
            <span class="ml-2 text-xs text-gray-500">(fully booked)</span>
          </button>
        <?php endif; ?>
        <div class="h-1"></div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endforeach; ?>

    </div>
  </div>
</section>

<?php include 'views/partials/footer.php'; ?>