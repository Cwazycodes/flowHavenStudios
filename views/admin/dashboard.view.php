<?php include base_path('views/partials/header.php'); ?>

<section class="bg-[#f2e9dc] py-20 px-6">
  <div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-[#845d45] font-quicksand">admin dashboard</h1>
      <div class="flex gap-3">
        <button onclick="openCreateSlotModal()" class="bg-[#845d45] hover:bg-[#6e4635] text-white px-4 py-2 rounded font-quicksand">
          create new slot
        </button>
        <a href="/admin/logout" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded font-quicksand">
          logout
        </a>
      </div>
    </div>

    <!-- Flash Messages -->
    <?php if (isset($_SESSION['_flash']['success'])): ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 font-quicksand">
        <?= $_SESSION['_flash']['success'] ?>
      </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['_flash']['error'])): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 font-quicksand">
        <?= $_SESSION['_flash']['error'] ?>
      </div>
    <?php endif; ?>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-blue-100">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-600 font-quicksand">upcoming slots</p>
            <p class="text-2xl font-semibold text-gray-900"><?= $totalSlots ?></p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-green-100">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
            </svg>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-600 font-quicksand">upcoming bookings</p>
            <p class="text-2xl font-semibold text-gray-900"><?= $totalBookings ?></p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-purple-100">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-600 font-quicksand">today</p>
            <p class="text-lg font-semibold text-gray-900 font-quicksand"><?= date('M j, Y') ?></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Time Slots Management -->
    <div class="mb-8">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-[#845d45] font-quicksand">upcoming time slots</h2>
        <p class="text-sm text-gray-600 font-quicksand">showing <?= count($timeSlots) ?> of <?= $totalSlots ?> upcoming slots</p>
      </div>
      
      <?php if (empty($timeSlots)): ?>
        <div class="bg-white rounded shadow p-6 text-center">
          <p class="text-gray-600 font-quicksand">no upcoming time slots. <button onclick="openCreateSlotModal()" class="text-[#845d45] hover:underline">create one now</button></p>
        </div>
      <?php else: ?>
        <div class="overflow-x-auto">
          <table class="min-w-full bg-white rounded shadow mb-4">
            <thead class="bg-[#845d45] text-white">
              <tr>
                <th class="text-left px-4 py-2 font-quicksand">date & time</th>
                <th class="text-left px-4 py-2 font-quicksand">capacity</th>
                <th class="text-left px-4 py-2 font-quicksand">booked</th>
                <th class="text-left px-4 py-2 font-quicksand">actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($timeSlots as $slot): ?>
                <tr class="border-t hover:bg-gray-50">
                  <td class="px-4 py-2 font-quicksand"><?= date('l, F j, Y - H:i', strtotime($slot['slot_time'])) ?></td>
                  <td class="px-4 py-2"><?= $slot['capacity'] ?></td>
                  <td class="px-4 py-2">
                    <span class="<?= $slot['booked_count'] >= $slot['capacity'] ? 'text-red-600 font-semibold' : 'text-green-600' ?>">
                      <?= $slot['booked_count'] ?>
                    </span>
                  </td>
                  <td class="px-4 py-2 space-x-2">
                    <button onclick="openEditSlotModal(<?= htmlspecialchars(json_encode($slot)) ?>)" 
                            class="text-blue-600 hover:underline text-sm font-quicksand">edit</button>
                    <form method="POST" action="/admin/delete-slot" class="inline" onsubmit="return confirm('Delete this slot? This will cancel all bookings!')">
                      <input type="hidden" name="slot_id" value="<?= $slot['id'] ?>">
                      <button type="submit" class="text-red-600 hover:underline text-sm font-quicksand">delete</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        
        <!-- Slots Pagination -->
        <?php if ($totalSlotsPages > 1): ?>
          <div class="flex justify-between items-center mb-6">
            <div class="text-sm text-gray-600 font-quicksand">
              page <?= $slotsPage ?> of <?= $totalSlotsPages ?>
            </div>
            <div class="flex space-x-2">
              <?php if ($slotsPage > 1): ?>
                <a href="?slots_page=<?= $slotsPage - 1 ?><?= isset($_GET['bookings_page']) ? '&bookings_page=' . $_GET['bookings_page'] : '' ?>" 
                   class="px-3 py-1 bg-[#845d45] text-white rounded hover:bg-[#6e4635] font-quicksand text-sm">previous</a>
              <?php endif; ?>
              
              <?php if ($slotsPage < $totalSlotsPages): ?>
                <a href="?slots_page=<?= $slotsPage + 1 ?><?= isset($_GET['bookings_page']) ? '&bookings_page=' . $_GET['bookings_page'] : '' ?>" 
                   class="px-3 py-1 bg-[#845d45] text-white rounded hover:bg-[#6e4635] font-quicksand text-sm">next</a>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>

    <!-- Bookings Management -->
    <div>
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-[#845d45] font-quicksand">upcoming bookings</h2>
        <p class="text-sm text-gray-600 font-quicksand">showing <?= count($bookings) ?> of <?= $totalBookings ?> upcoming bookings</p>
      </div>
      
      <?php if (empty($bookings)): ?>
        <div class="bg-white rounded shadow p-6 text-center">
          <p class="text-gray-600 font-quicksand">no upcoming bookings yet.</p>
        </div>
      <?php else: ?>
        <div class="overflow-x-auto">
          <table class="min-w-full bg-white rounded shadow mb-4">
            <thead class="bg-[#845d45] text-white">
              <tr>
                <th class="text-left px-4 py-2 font-quicksand">time</th>
                <th class="text-left px-4 py-2 font-quicksand">name</th>
                <th class="text-left px-4 py-2 font-quicksand">email</th>
                <th class="text-left px-4 py-2 font-quicksand">phone</th>
                <th class="text-left px-4 py-2 font-quicksand">ref</th>
                <th class="text-left px-4 py-2 font-quicksand">action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bookings as $b): ?>
                <tr class="border-t hover:bg-gray-50">
                  <td class="px-4 py-2 font-quicksand"><?= date('D, M j - H:i', strtotime($b['slot_time'])) ?></td>
                  <td class="px-4 py-2"><?= htmlspecialchars($b['first_name']) ?> <?= htmlspecialchars($b['last_name']) ?></td>
                  <td class="px-4 py-2"><?= htmlspecialchars($b['email']) ?></td>
                  <td class="px-4 py-2"><?= htmlspecialchars($b['phone']) ?></td>
                  <td class="px-4 py-2 text-xs text-gray-500"><?= htmlspecialchars($b['ref']) ?></td>
                  <td class="px-4 py-2">
                    <form method="POST" action="/admin/cancel" onsubmit="return confirm('Cancel this booking?')">
                      <input type="hidden" name="booking_id" value="<?= $b['id'] ?>">
                      <button type="submit" class="text-red-600 hover:underline text-sm font-quicksand">cancel</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        
        <!-- Bookings Pagination -->
        <?php if ($totalBookingsPages > 1): ?>
          <div class="flex justify-between items-center">
            <div class="text-sm text-gray-600 font-quicksand">
              page <?= $bookingsPage ?> of <?= $totalBookingsPages ?>
            </div>
            <div class="flex space-x-2">
              <?php if ($bookingsPage > 1): ?>
                <a href="?bookings_page=<?= $bookingsPage - 1 ?><?= isset($_GET['slots_page']) ? '&slots_page=' . $_GET['slots_page'] : '' ?>" 
                   class="px-3 py-1 bg-[#845d45] text-white rounded hover:bg-[#6e4635] font-quicksand text-sm">previous</a>
              <?php endif; ?>
              
              <?php if ($bookingsPage < $totalBookingsPages): ?>
                <a href="?bookings_page=<?= $bookingsPage + 1 ?><?= isset($_GET['slots_page']) ? '&slots_page=' . $_GET['slots_page'] : '' ?>" 
                   class="px-3 py-1 bg-[#845d45] text-white rounded hover:bg-[#6e4635] font-quicksand text-sm">next</a>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Create Slot Modal -->
<div id="createSlotModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
  <div class="flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold text-[#845d45] font-quicksand">create new slot</h3>
        <button onclick="closeCreateSlotModal()" class="text-gray-500 hover:text-gray-700">&times;</button>
      </div>
      <form method="POST" action="/admin/create-slot" class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-1">date</label>
          <input type="date" name="date" required class="w-full px-3 py-2 border rounded font-quicksand" min="<?= date('Y-m-d') ?>">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-1">time</label>
          <input type="time" name="time" required class="w-full px-3 py-2 border rounded font-quicksand">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-1">capacity</label>
          <input type="number" name="capacity" value="6" min="1" max="20" required class="w-full px-3 py-2 border rounded font-quicksand">
        </div>
        <div class="flex space-x-3">
          <button type="submit" class="flex-1 bg-[#845d45] hover:bg-[#6e4635] text-white py-2 rounded font-quicksand">create</button>
          <button type="button" onclick="closeCreateSlotModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 rounded font-quicksand">cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Slot Modal -->
<div id="editSlotModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
  <div class="flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold text-[#845d45] font-quicksand">edit slot</h3>
        <button onclick="closeEditSlotModal()" class="text-gray-500 hover:text-gray-700">&times;</button>
      </div>
      <form method="POST" action="/admin/edit-slot" class="space-y-4">
        <input type="hidden" name="slot_id" id="editSlotId">
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-1">date</label>
          <input type="date" name="date" id="editSlotDate" required class="w-full px-3 py-2 border rounded font-quicksand">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-1">time</label>
          <input type="time" name="time" id="editSlotTime" required class="w-full px-3 py-2 border rounded font-quicksand">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-1">capacity</label>
          <input type="number" name="capacity" id="editSlotCapacity" min="1" max="20" required class="w-full px-3 py-2 border rounded font-quicksand">
        </div>
        <div class="flex space-x-3">
          <button type="submit" class="flex-1 bg-[#845d45] hover:bg-[#6e4635] text-white py-2 rounded font-quicksand">update</button>
          <button type="button" onclick="closeEditSlotModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 rounded font-quicksand">cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function openCreateSlotModal() {
  document.getElementById('createSlotModal').classList.remove('hidden');
}

function closeCreateSlotModal() {
  document.getElementById('createSlotModal').classList.add('hidden');
}

function openEditSlotModal(slot) {
  const modal = document.getElementById('editSlotModal');
  const datetime = new Date(slot.slot_time);
  
  document.getElementById('editSlotId').value = slot.id;
  document.getElementById('editSlotDate').value = datetime.toISOString().split('T')[0];
  document.getElementById('editSlotTime').value = datetime.toTimeString().substr(0,5);
  document.getElementById('editSlotCapacity').value = slot.capacity;
  
  modal.classList.remove('hidden');
}

function closeEditSlotModal() {
  document.getElementById('editSlotModal').classList.add('hidden');
}
</script>

<?php include base_path('views/partials/footer.php'); ?>