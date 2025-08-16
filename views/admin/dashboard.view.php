<?php include base_path('views/partials/header.php'); ?>

<section class="bg-[#f2e9dc] py-8 sm:py-12 lg:py-20 px-4 sm:px-6">
  <div class="max-w-7xl mx-auto">
    
    <!-- Header with responsive layout -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
      <h1 class="text-2xl sm:text-3xl font-bold text-[#845d45] font-quicksand">admin dashboard</h1>
      <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
        <button onclick="openCreateSlotModal()" 
                class="bg-[#845d45] hover:bg-[#6e4635] text-white px-4 py-2 rounded font-quicksand text-sm sm:text-base transition-colors">
          + create slot
        </button>
        <a href="/admin/logout" 
           class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded font-quicksand text-center text-sm sm:text-base transition-colors">
          logout
        </a>
      </div>
    </div>

    <!-- Flash Messages -->
    <?php if (isset($_SESSION['_flash']['success'])): ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 font-quicksand text-sm">
        <?= $_SESSION['_flash']['success'] ?>
      </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['_flash']['error'])): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 font-quicksand text-sm">
        <?= $_SESSION['_flash']['error'] ?>
      </div>
    <?php endif; ?>

    <!-- Quick Stats - Responsive grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8">
      <div class="bg-white rounded-lg shadow p-4 sm:p-6">
        <div class="flex items-center">
          <div class="p-2 sm:p-3 rounded-full bg-blue-100">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
          </div>
          <div class="ml-3 sm:ml-4">
            <p class="text-xs sm:text-sm font-medium text-gray-600 font-quicksand">upcoming slots</p>
            <p class="text-xl sm:text-2xl font-semibold text-gray-900"><?= $totalSlots ?></p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow p-4 sm:p-6">
        <div class="flex items-center">
          <div class="p-2 sm:p-3 rounded-full bg-green-100">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
            </svg>
          </div>
          <div class="ml-3 sm:ml-4">
            <p class="text-xs sm:text-sm font-medium text-gray-600 font-quicksand">upcoming bookings</p>
            <p class="text-xl sm:text-2xl font-semibold text-gray-900"><?= $totalBookings ?></p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow p-4 sm:p-6 sm:col-span-2 lg:col-span-1">
        <div class="flex items-center">
          <div class="p-2 sm:p-3 rounded-full bg-purple-100">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
          </div>
          <div class="ml-3 sm:ml-4">
            <p class="text-xs sm:text-sm font-medium text-gray-600 font-quicksand">today</p>
            <p class="text-lg sm:text-xl font-semibold text-gray-900 font-quicksand"><?= date('M j, Y') ?></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Time Slots Management -->
    <div class="mb-8">
      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 mb-4">
        <h2 class="text-xl sm:text-2xl font-bold text-[#845d45] font-quicksand">upcoming time slots</h2>
        <p class="text-xs sm:text-sm text-gray-600 font-quicksand">
          showing <?= count($timeSlots) ?> of <?= $totalSlots ?> upcoming slots
        </p>
      </div>
      
      <?php if (empty($timeSlots)): ?>
        <div class="bg-white rounded shadow p-6 text-center">
          <p class="text-gray-600 font-quicksand text-sm">
            no upcoming time slots. 
            <button onclick="openCreateSlotModal()" class="text-[#845d45] hover:underline">create one now</button>
          </p>
        </div>
      <?php else: ?>
        
        <!-- Desktop Table -->
        <div class="hidden lg:block overflow-x-auto">
          <table class="min-w-full bg-white rounded shadow mb-4">
            <thead class="bg-[#845d45] text-white">
              <tr>
                <th class="text-left px-4 py-3 font-quicksand">date & time</th>
                <th class="text-left px-4 py-3 font-quicksand">capacity</th>
                <th class="text-left px-4 py-3 font-quicksand">booked</th>
                <th class="text-left px-4 py-3 font-quicksand">actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($timeSlots as $slot): ?>
                <tr class="border-t hover:bg-gray-50">
                  <td class="px-4 py-3 font-quicksand"><?= date('l, F j, Y - H:i', strtotime($slot['slot_time'])) ?></td>
                  <td class="px-4 py-3"><?= $slot['capacity'] ?></td>
                  <td class="px-4 py-3">
                    <span class="<?= $slot['booked_count'] >= $slot['capacity'] ? 'text-red-600 font-semibold' : 'text-green-600' ?>">
                      <?= $slot['booked_count'] ?>
                    </span>
                  </td>
                  <td class="px-4 py-3 space-x-2">
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
        
        <!-- Mobile/Tablet Cards -->
        <div class="lg:hidden space-y-4">
          <?php foreach ($timeSlots as $slot): ?>
            <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
              <div class="flex justify-between items-start mb-3">
                <div>
                  <h3 class="font-semibold text-gray-900 font-quicksand text-sm">
                    <?= date('l, F j', strtotime($slot['slot_time'])) ?>
                  </h3>
                  <p class="text-[#845d45] font-quicksand text-lg font-bold">
                    <?= date('H:i', strtotime($slot['slot_time'])) ?>
                  </p>
                </div>
                <div class="text-right">
                  <p class="text-xs text-gray-600 font-quicksand">capacity</p>
                  <p class="text-lg font-semibold"><?= $slot['capacity'] ?></p>
                </div>
              </div>
              
              <div class="flex justify-between items-center mb-3">
                <div>
                  <p class="text-xs text-gray-600 font-quicksand">booked</p>
                  <p class="<?= $slot['booked_count'] >= $slot['capacity'] ? 'text-red-600 font-semibold' : 'text-green-600' ?> text-lg">
                    <?= $slot['booked_count'] ?>
                  </p>
                </div>
              </div>
              
              <div class="flex gap-2 pt-3 border-t border-gray-200">
                <button onclick="openEditSlotModal(<?= htmlspecialchars(json_encode($slot)) ?>)" 
                        class="flex-1 bg-blue-50 text-blue-600 py-2 px-3 rounded text-sm font-quicksand hover:bg-blue-100 transition-colors">
                  edit
                </button>
                <form method="POST" action="/admin/delete-slot" class="flex-1" onsubmit="return confirm('Delete this slot? This will cancel all bookings!')">
                  <input type="hidden" name="slot_id" value="<?= $slot['id'] ?>">
                  <button type="submit" class="w-full bg-red-50 text-red-600 py-2 px-3 rounded text-sm font-quicksand hover:bg-red-100 transition-colors">
                    delete
                  </button>
                </form>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        
        <!-- Pagination -->
        <?php if ($totalSlotsPages > 1): ?>
          <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
            <div class="text-xs sm:text-sm text-gray-600 font-quicksand text-center sm:text-left">
              page <?= $slotsPage ?> of <?= $totalSlotsPages ?>
            </div>
            <div class="flex justify-center sm:justify-end space-x-2">
              <?php if ($slotsPage > 1): ?>
                <a href="?slots_page=<?= $slotsPage - 1 ?><?= isset($_GET['bookings_page']) ? '&bookings_page=' . $_GET['bookings_page'] : '' ?>" 
                   class="px-3 py-2 bg-[#845d45] text-white rounded hover:bg-[#6e4635] font-quicksand text-xs sm:text-sm transition-colors">
                  ← previous
                </a>
              <?php endif; ?>
              
              <?php if ($slotsPage < $totalSlotsPages): ?>
                <a href="?slots_page=<?= $slotsPage + 1 ?><?= isset($_GET['bookings_page']) ? '&bookings_page=' . $_GET['bookings_page'] : '' ?>" 
                   class="px-3 py-2 bg-[#845d45] text-white rounded hover:bg-[#6e4635] font-quicksand text-xs sm:text-sm transition-colors">
                  next →
                </a>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>

    <!-- Bookings Management -->
    <div>
      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 mb-4">
        <h2 class="text-xl sm:text-2xl font-bold text-[#845d45] font-quicksand">upcoming bookings</h2>
        <p class="text-xs sm:text-sm text-gray-600 font-quicksand">
          showing <?= count($bookings) ?> of <?= $totalBookings ?> upcoming bookings
        </p>
      </div>
      
      <?php if (empty($bookings)): ?>
        <div class="bg-white rounded shadow p-6 text-center">
          <p class="text-gray-600 font-quicksand text-sm">no upcoming bookings yet.</p>
        </div>
      <?php else: ?>
        
        <!-- Desktop Table -->
        <div class="hidden lg:block overflow-x-auto">
          <table class="min-w-full bg-white rounded shadow mb-4">
            <thead class="bg-[#845d45] text-white">
              <tr>
                <th class="text-left px-4 py-3 font-quicksand">time</th>
                <th class="text-left px-4 py-3 font-quicksand">name</th>
                <th class="text-left px-4 py-3 font-quicksand">email</th>
                <th class="text-left px-4 py-3 font-quicksand">phone</th>
                <th class="text-left px-4 py-3 font-quicksand">ref</th>
                <th class="text-left px-4 py-3 font-quicksand">action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bookings as $b): ?>
                <tr class="border-t hover:bg-gray-50">
                  <td class="px-4 py-3 font-quicksand text-sm"><?= date('D, M j - H:i', strtotime($b['slot_time'])) ?></td>
                  <td class="px-4 py-3 text-sm"><?= htmlspecialchars($b['first_name']) ?> <?= htmlspecialchars($b['last_name']) ?></td>
                  <td class="px-4 py-3 text-sm"><?= htmlspecialchars($b['email']) ?></td>
                  <td class="px-4 py-3 text-sm"><?= htmlspecialchars($b['phone']) ?></td>
                  <td class="px-4 py-3 text-xs text-gray-500"><?= htmlspecialchars($b['ref']) ?></td>
                  <td class="px-4 py-3">
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
        
        <!-- Mobile/Tablet Cards -->
        <div class="lg:hidden space-y-4">
          <?php foreach ($bookings as $b): ?>
            <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
              <div class="flex justify-between items-start mb-3">
                <div>
                  <h3 class="font-semibold text-gray-900 font-quicksand">
                    <?= htmlspecialchars($b['first_name']) ?> <?= htmlspecialchars($b['last_name']) ?>
                  </h3>
                  <p class="text-[#845d45] font-quicksand text-sm">
                    <?= date('D, M j - H:i', strtotime($b['slot_time'])) ?>
                  </p>
                </div>
              </div>
              
              <div class="space-y-2 mb-3 text-sm">
                <p class="text-gray-600 font-quicksand">
                  <span class="font-medium">email:</span> <?= htmlspecialchars($b['email']) ?>
                </p>
                <?php if ($b['phone']): ?>
                <p class="text-gray-600 font-quicksand">
                  <span class="font-medium">phone:</span> <?= htmlspecialchars($b['phone']) ?>
                </p>
                <?php endif; ?>
                <p class="text-gray-600 font-quicksand">
                  <span class="font-medium">ref:</span> <?= htmlspecialchars($b['ref']) ?>
                </p>
              </div>
              
              <div class="pt-3 border-t border-gray-200">
                <form method="POST" action="/admin/cancel" onsubmit="return confirm('Cancel this booking?')">
                  <input type="hidden" name="booking_id" value="<?= $b['id'] ?>">
                  <button type="submit" class="w-full bg-red-50 text-red-600 py-2 px-3 rounded text-sm font-quicksand hover:bg-red-100 transition-colors">
                    cancel booking
                  </button>
                </form>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        
        <!-- Bookings Pagination -->
        <?php if ($totalBookingsPages > 1): ?>
          <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div class="text-xs sm:text-sm text-gray-600 font-quicksand text-center sm:text-left">
              page <?= $bookingsPage ?> of <?= $totalBookingsPages ?>
            </div>
            <div class="flex justify-center sm:justify-end space-x-2">
              <?php if ($bookingsPage > 1): ?>
                <a href="?bookings_page=<?= $bookingsPage - 1 ?><?= isset($_GET['slots_page']) ? '&slots_page=' . $_GET['slots_page'] : '' ?>" 
                   class="px-3 py-2 bg-[#845d45] text-white rounded hover:bg-[#6e4635] font-quicksand text-xs sm:text-sm transition-colors">
                  ← previous
                </a>
              <?php endif; ?>
              
              <?php if ($bookingsPage < $totalBookingsPages): ?>
                <a href="?bookings_page=<?= $bookingsPage + 1 ?><?= isset($_GET['slots_page']) ? '&slots_page=' . $_GET['slots_page'] : '' ?>" 
                   class="px-3 py-2 bg-[#845d45] text-white rounded hover:bg-[#6e4635] font-quicksand text-xs sm:text-sm transition-colors">
                  next →
                </a>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Responsive Create Slot Modal -->
<div id="createSlotModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
  <div class="flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-lg w-full max-w-md mx-4">
      <div class="flex justify-between items-center p-4 sm:p-6 border-b">
        <h3 class="text-lg sm:text-xl font-bold text-[#845d45] font-quicksand">create new slot</h3>
        <button onclick="closeCreateSlotModal()" class="text-gray-500 hover:text-gray-700 p-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <form method="POST" action="/admin/create-slot" class="p-4 sm:p-6 space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-2">date</label>
          <input type="date" name="date" required 
                 class="w-full px-3 py-3 sm:py-2 border rounded font-quicksand text-base sm:text-sm focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45]" 
                 min="<?= date('Y-m-d') ?>">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-2">time</label>
          <input type="time" name="time" required 
                 class="w-full px-3 py-3 sm:py-2 border rounded font-quicksand text-base sm:text-sm focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45]">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-2">capacity</label>
          <input type="number" name="capacity" value="6" min="1" max="20" required 
                 class="w-full px-3 py-3 sm:py-2 border rounded font-quicksand text-base sm:text-sm focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45]">
        </div>
        <div class="flex flex-col sm:flex-row gap-3 pt-4">
          <button type="submit" 
                  class="flex-1 bg-[#845d45] hover:bg-[#6e4635] text-white py-3 sm:py-2 rounded font-quicksand transition-colors">
            create
          </button>
          <button type="button" onclick="closeCreateSlotModal()" 
                  class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-3 sm:py-2 rounded font-quicksand transition-colors">
            cancel
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Responsive Edit Slot Modal -->
<div id="editSlotModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
  <div class="flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-lg w-full max-w-md mx-4">
      <div class="flex justify-between items-center p-4 sm:p-6 border-b">
        <h3 class="text-lg sm:text-xl font-bold text-[#845d45] font-quicksand">edit slot</h3>
        <button onclick="closeEditSlotModal()" class="text-gray-500 hover:text-gray-700 p-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <form method="POST" action="/admin/edit-slot" class="p-4 sm:p-6 space-y-4">
        <input type="hidden" name="slot_id" id="editSlotId">
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-2">date</label>
          <input type="date" name="date" id="editSlotDate" required 
                 class="w-full px-3 py-3 sm:py-2 border rounded font-quicksand text-base sm:text-sm focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45]">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-2">time</label>
          <input type="time" name="time" id="editSlotTime" required 
                 class="w-full px-3 py-3 sm:py-2 border rounded font-quicksand text-base sm:text-sm focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45]">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 font-quicksand mb-2">capacity</label>
          <input type="number" name="capacity" id="editSlotCapacity" min="1" max="20" required 
                 class="w-full px-3 py-3 sm:py-2 border rounded font-quicksand text-base sm:text-sm focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45]">
        </div>
        <div class="flex flex-col sm:flex-row gap-3 pt-4">
          <button type="submit" 
                  class="flex-1 bg-[#845d45] hover:bg-[#6e4635] text-white py-3 sm:py-2 rounded font-quicksand transition-colors">
            update
          </button>
          <button type="button" onclick="closeEditSlotModal()" 
                  class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-3 sm:py-2 rounded font-quicksand transition-colors">
            cancel
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function openCreateSlotModal() {
  document.getElementById('createSlotModal').classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}

function closeCreateSlotModal() {
  document.getElementById('createSlotModal').classList.add('hidden');
  document.body.style.overflow = 'auto';
}

function openEditSlotModal(slot) {
  const modal = document.getElementById('editSlotModal');
  const datetime = new Date(slot.slot_time);
  
  document.getElementById('editSlotId').value = slot.id;
  document.getElementById('editSlotDate').value = datetime.toISOString().split('T')[0];
  document.getElementById('editSlotTime').value = datetime.toTimeString().substr(0,5);
  document.getElementById('editSlotCapacity').value = slot.capacity;
  
  modal.classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}

function closeEditSlotModal() {
  document.getElementById('editSlotModal').classList.add('hidden');
  document.body.style.overflow = 'auto';
}

// Close modals when clicking outside
document.addEventListener('click', function(e) {
  if (e.target.classList.contains('fixed') && e.target.classList.contains('inset-0')) {
    closeCreateSlotModal();
    closeEditSlotModal();
  }
});

// Handle mobile form inputs properly
document.addEventListener('DOMContentLoaded', function() {
  // Prevent zoom on iOS when focusing inputs
  const inputs = document.querySelectorAll('input, select, textarea');
  inputs.forEach(input => {
    if (window.innerWidth <= 768) {
      input.style.fontSize = '16px';
    }
  });
});
</script>

<?php include base_path('views/partials/footer.php'); ?>