<?php include '../views/partials/header.php'; ?>

<section class="bg-[#f2e9dc] py-20">
  <div class="max-w-xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-[#845d45] mb-4 font-quicksand">confirm booking</h2>
    <p class="text-lg text-gray-700 mb-6 font-quicksand">
      you selected: <strong class='text-[#845d45]'><?= strtolower(date('l, F jS', strtotime($slot['slot_time']))) ?> at <?= date('H:i', strtotime($slot['slot_time'])) ?></strong>
    </p>
    <p class="mb-4 font-quicksand">spots available: <strong class='text-[#845d45]'><?= $slot['capacity'] ?></strong></p>
    
    <form action="/book/start" method="POST" class="space-y-4 max-w-md mx-auto">
  <input type="hidden" name="slot_id" value="<?= $slot['id'] ?>">
  <select id="bed" name="quantity" required class="w-full px-4 py-2 rounded border font-quicksand">
    <?php for($i = 1; $i <= $slot['capacity']; $i++): ?>
      <option value="<?= $i ?>"><?= $i ?> bed<?= $i > 1 ? 's' : '' ?></option>
    <?php endfor; ?>
  </select>
  <input type="text" name="first_name" placeholder="first name" required class="w-full px-4 py-2 rounded border font-quicksand" />
  <input type="text" name="last_name" placeholder="last name" required class="w-full px-4 py-2 rounded border font-quicksand" />
  <input type="email" name="email" placeholder="email" required class="w-full px-4 py-2 rounded border font-quicksand" />
  <input type="tel" name="phone" placeholder="phone" class="w-full px-4 py-2 rounded border font-quicksand" />

  <button type="submit" class="inline-block rounded-full border-2 border-[#845d45] px-8 py-4 text-[#845d45] font-quicksand hover:bg-[#845d45] hover:text-white transition font-medium text-lg">
    continue to payment
  </button>
</form>

  </div>
</section>

<?php include '../views/partials/footer.php'; ?>
