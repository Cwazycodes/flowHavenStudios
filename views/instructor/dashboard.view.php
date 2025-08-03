<?php include base_path('views/partials/header.php'); ?>

<div class="min-h-screen bg-[#f2e9dc] py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-[#2b2a24] font-quicksand">instructor dashboard</h1>
            <p class="mt-2 text-[#845d45] font-quicksand">welcome back, <?= strtolower($instructor_profile['first_name']) ?></p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white overflow-hidden shadow-md rounded-lg border border-[#e8d7c3]">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-[#845d45] rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zM4 7h12v9a1 1 0 01-1 1H5a1 1 0 01-1-1V7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">total slots</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand"><?= $stats['total_slots'] ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-md rounded-lg border border-[#e8d7c3]">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-[#845d45] rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5zM8 15v-3a1 1 0 011-1h2a1 1 0 011 1v3H8z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">this week</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand"><?= $stats['weekly_slots'] ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-md rounded-lg border border-[#e8d7c3]">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-[#845d45] rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">total bookings</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand"><?= $stats['total_bookings'] ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-md rounded-lg border border-[#e8d7c3]">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-[#845d45] rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">today's classes</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand"><?= $stats['todays_classes'] ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mb-6 flex flex-wrap gap-4">
            <button onclick="openCreateSlotModal()" class="bg-[#845d45] text-white px-4 py-2 rounded-md hover:bg-[#6e4635] font-quicksand font-medium transition">
                create new slot
            </button>
            <button onclick="openUploadProfileModal()" class="bg-[#e8d7c3] text-[#845d45] border border-[#845d45] px-4 py-2 rounded-md hover:bg-[#845d45] hover:text-white font-quicksand font-medium transition">
                update profile picture
            </button>
            <button onclick="openProfileModal()" class="bg-[#e8d7c3] text-[#845d45] border border-[#845d45] px-4 py-2 rounded-md hover:bg-[#845d45] hover:text-white font-quicksand font-medium transition">
                edit profile
            </button>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Calendar View -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4] flex justify-between items-center">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">class schedule</h3>
                        <div class="flex items-center space-x-4">
                            <button onclick="changeMonth(-1)" class="p-2 rounded-md hover:bg-[#e8d7c3] text-[#845d45] transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <span id="currentMonthYear" class="text-lg font-medium text-[#2b2a24] font-quicksand min-w-[150px] text-center">
                                <?= date('F Y', strtotime($current_month . '-01')) ?>
                            </span>
                            <button onclick="changeMonth(1)" class="p-2 rounded-md hover:bg-[#e8d7c3] text-[#845d45] transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Calendar Grid -->
                    <div class="p-6">
                        <div class="grid grid-cols-7 gap-px bg-[#e8d7c3] rounded-lg overflow-hidden">
                            <!-- Day Headers -->
                            <div class="bg-[#f9f7f4] p-3 text-center">
                                <span class="text-sm font-medium text-[#845d45] font-quicksand">sun</span>
                            </div>
                            <div class="bg-[#f9f7f4] p-3 text-center">
                                <span class="text-sm font-medium text-[#845d45] font-quicksand">mon</span>
                            </div>
                            <div class="bg-[#f9f7f4] p-3 text-center">
                                <span class="text-sm font-medium text-[#845d45] font-quicksand">tue</span>
                            </div>
                            <div class="bg-[#f9f7f4] p-3 text-center">
                                <span class="text-sm font-medium text-[#845d45] font-quicksand">wed</span>
                            </div>
                            <div class="bg-[#f9f7f4] p-3 text-center">
                                <span class="text-sm font-medium text-[#845d45] font-quicksand">thu</span>
                            </div>
                            <div class="bg-[#f9f7f4] p-3 text-center">
                                <span class="text-sm font-medium text-[#845d45] font-quicksand">fri</span>
                            </div>
                            <div class="bg-[#f9f7f4] p-3 text-center">
                                <span class="text-sm font-medium text-[#845d45] font-quicksand">sat</span>
                            </div>
                            
                            <!-- Calendar Days -->
                            <div id="calendarDays" class="contents">
                                <!-- Days will be generated by JavaScript -->
                            </div>
                        </div>
                        
                        <!-- Legend -->
                        <div class="mt-4 flex flex-wrap items-center gap-4 text-sm">
                            <div class="flex items-center space-x-2">
                                <div class="w-4 h-4 bg-[#845d45] rounded"></div>
                                <span class="text-[#845d45] font-quicksand">your slots</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-4 h-4 bg-gray-300 rounded"></div>
                                <span class="text-[#845d45] font-quicksand">other instructors</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-4 h-4 bg-green-200 border-2 border-green-500 rounded"></div>
                                <span class="text-[#845d45] font-quicksand">fully booked</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- Hidden data script for slots -->
<script type="application/json" id="slotsData">
<?= json_encode($slots_by_date, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>
</script>

            <!-- Quick Actions & Profile -->
            <div class="space-y-6">
                <!-- Profile Summary -->
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">your profile</h3>
                    </div>
                    <div class="p-6">
                        <div class="text-center mb-4">
                            <div class="w-16 h-16 mx-auto bg-[#e8d7c3] rounded-full flex items-center justify-center mb-2">
                                <?php if (!empty($instructor_profile['profile_image'])): ?>
                                    <img src="<?= htmlspecialchars($instructor_profile['profile_image']) ?>" alt="profile" class="w-16 h-16 rounded-full object-cover">
                                <?php else: ?>
                                    <svg class="w-8 h-8 text-[#845d45]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <h4 class="font-medium text-[#2b2a24] font-quicksand"><?= htmlspecialchars($instructor_profile['first_name'] . ' ' . $instructor_profile['last_name']) ?></h4>
                            <p class="text-sm text-[#845d45] font-quicksand">instructor</p>
                        </div>
                        
                        <div class="space-y-2 text-sm">
                            <div>
                                <span class="font-medium text-[#2b2a24] font-quicksand">email:</span>
                                <span class="text-[#845d45] font-quicksand"><?= htmlspecialchars($instructor_profile['email']) ?></span>
                            </div>
                            
                            <?php if (!empty($instructor_profile['phone'])): ?>
                            <div>
                                <span class="font-medium text-[#2b2a24] font-quicksand">phone:</span>
                                <span class="text-[#845d45] font-quicksand"><?= htmlspecialchars($instructor_profile['phone']) ?></span>
                            </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($instructor_profile['profile']['specializations'])): ?>
                            <div>
                                <span class="font-medium text-[#2b2a24] font-quicksand">specializations:</span>
                                <span class="text-[#845d45] font-quicksand"><?= htmlspecialchars($instructor_profile['profile']['specializations']) ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings -->
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">recent bookings</h3>
                    </div>
                    <div class="p-6">
                        <div class="max-h-64 overflow-y-auto space-y-3">
                            <?php if (empty($recent_bookings)): ?>
                            <p class="text-[#845d45] font-quicksand text-sm text-center">no recent bookings</p>
                            <?php else: ?>
                                <?php foreach (array_slice($recent_bookings, 0, 5) as $booking): ?>
                                <div class="flex justify-between items-center py-2 border-b border-[#e8d7c3] last:border-b-0">
                                    <div>
                                        <p class="text-sm font-medium text-[#2b2a24] font-quicksand"><?= htmlspecialchars($booking['student_name']) ?></p>
                                        <p class="text-xs text-[#845d45] font-quicksand"><?= date('M j, g:i A', strtotime($booking['start_time'])) ?></p>
                                    </div>
                                    <div class="text-right">
                                        <span class="px-2 py-1 text-xs rounded-full 
                                            <?php if ($booking['status'] === 'confirmed'): ?>
                                                bg-green-100 text-green-800
                                            <?php else: ?>
                                                bg-gray-100 text-gray-800
                                            <?php endif; ?> font-quicksand">
                                            <?= $booking['status'] ?>
                                        </span>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Slot Details Modal -->
<div id="slotDetailsModal" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm" onclick="closeSlotDetailsModal()"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-lg w-full max-h-[90vh] overflow-y-auto border border-[#e8d7c3] relative">
            <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                <h3 id="slotModalTitle" class="text-lg font-medium text-[#2b2a24] font-quicksand">class details</h3>
                <button onclick="closeSlotDetailsModal()" class="absolute top-4 right-4 text-[#845d45] hover:text-[#6e4635]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div id="slotDetailsContent" class="p-6">
                <!-- Content will be populated by JavaScript -->
            </div>
        </div>
    </div>
</div>

<!-- Create Slot Modal -->
<div id="createSlotModal" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm" onclick="closeCreateSlotModal()"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full max-h-[90vh] overflow-y-auto border border-[#e8d7c3] relative">
            <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">create new slot</h3>
                <button onclick="closeCreateSlotModal()" class="absolute top-4 right-4 text-[#845d45] hover:text-[#6e4635]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div id="slotMessage" class="hidden mx-6 mt-4 p-3 rounded-md font-quicksand"></div>
            
            <form id="createSlotForm" class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">date</label>
                    <input type="date" id="slotDate" name="date" required min="<?= date('Y-m-d') ?>" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-[#845d45] font-quicksand">start time</label>
                        <input type="time" name="start_time" required class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#845d45] font-quicksand">end time</label>
                        <input type="time" name="end_time" required class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">available beds</label>
                    <input type="number" name="available_beds" value="6" min="1" max="10" required class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">class type</label>
                    <input type="text" name="class_type" value="reformer pilates" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">description (optional)</label>
                    <textarea name="description" rows="3" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand" placeholder="e.g., morning flow session"></textarea>
                </div>
                <div id="conflictWarning" class="hidden p-3 bg-red-100 border border-red-300 rounded-md">
                    <p class="text-sm text-red-700 font-quicksand">⚠️ Another instructor has a class at this time. You cannot book this slot.</p>
                </div>
                <button type="submit" id="createSlotBtn" class="w-full bg-[#845d45] text-white py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium transition">
                    create slot
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Upload Profile Picture Modal -->
<div id="uploadProfileModal" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm" onclick="closeUploadProfileModal()"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full border border-[#e8d7c3] relative">
            <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">update profile picture</h3>
                <button onclick="closeUploadProfileModal()" class="absolute top-4 right-4 text-[#845d45] hover:text-[#6e4635]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div id="uploadMessage" class="hidden mx-6 mt-4 p-3 rounded-md font-quicksand"></div>
            
            <form id="uploadProfileForm" class="p-6 space-y-4">
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto bg-[#e8d7c3] rounded-full flex items-center justify-center mb-4">
                        <?php if (!empty($instructor_profile['profile_image'])): ?>
                            <img src="<?= htmlspecialchars($instructor_profile['profile_image']) ?>" alt="current profile" class="w-24 h-24 rounded-full object-cover">
                        <?php else: ?>
                            <svg class="w-12 h-12 text-[#845d45]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                            </svg>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">select image</label>
                    <input type="file" name="profile_image" accept="image/*" required class="mt-1 block w-full text-sm text-[#845d45] file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#e8d7c3] file:text-[#845d45] hover:file:bg-[#d4c3a6] font-quicksand">
                    <p class="mt-1 text-xs text-[#845d45] font-quicksand">png, jpg, jpeg up to 5mb</p>
                </div>
                <button type="submit" class="w-full bg-[#845d45] text-white py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium transition">
                    upload picture
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div id="profileModal" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm" onclick="closeProfileModal()"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full max-h-[90vh] overflow-y-auto border border-[#e8d7c3] relative">
            <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">edit profile</h3>
                <button onclick="closeProfileModal()" class="absolute top-4 right-4 text-[#845d45] hover:text-[#6e4635]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div id="profileMessage" class="hidden mx-6 mt-4 p-3 rounded-md font-quicksand"></div>
            
            <form id="profileForm" class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">bio</label>
                    <textarea name="bio" rows="4" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand"><?= htmlspecialchars($instructor_profile['profile']['bio'] ?? '') ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">specializations</label>
                    <input type="text" name="specializations" placeholder="e.g., reformer pilates, mat pilates" value="<?= htmlspecialchars($instructor_profile['profile']['specializations'] ?? '') ?>" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">certifications</label>
                    <input type="text" name="certifications" placeholder="e.g., BASI certified" value="<?= htmlspecialchars($instructor_profile['profile']['certifications'] ?? '') ?>" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">instagram handle (optional)</label>
                    <input type="text" name="instagram_handle" placeholder="@username" value="<?= htmlspecialchars($instructor_profile['profile']['instagram_handle'] ?? '') ?>" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <button type="submit" class="w-full bg-[#845d45] text-white py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium transition">
                    update profile
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Calendar and slot data
let currentDate = new Date('<?= $current_month ?>-01');
let slotsData = {};
let currentInstructorId = <?= auth()['id'] ?>;

// Initialize calendar
document.addEventListener('DOMContentLoaded', function() {
    // Load slots data from hidden script element
    try {
        const slotsDataElement = document.getElementById('slotsData');
        if (slotsDataElement) {
            slotsData = JSON.parse(slotsDataElement.textContent);
            console.log('Slots data loaded from script element:', slotsData);
        } else {
            console.error('Slots data element not found');
            slotsData = {};
        }
    } catch (error) {
        console.error('Error parsing slots data:', error);
        slotsData = {};
    }
    
    // Add a small delay to ensure DOM is fully ready
    setTimeout(() => {
        renderCalendar();
        setupFormHandlers();
    }, 100);
});

function renderCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    
    console.log('=== RENDER CALENDAR DEBUG ===');
    console.log('Rendering calendar for:', year, month + 1);
    console.log('Current date object:', currentDate);
    console.log('Slots data keys:', Object.keys(slotsData));
    console.log('Slots data:', slotsData);
    
    // Update month/year display
    const monthYearElement = document.getElementById('currentMonthYear');
    if (monthYearElement) {
        monthYearElement.textContent = currentDate.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
    }
    
    // Get first day of month and number of days
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const daysInMonth = lastDay.getDate();
    const startingDayOfWeek = firstDay.getDay();
    
    // Get previous month days to fill in
    const prevMonth = new Date(year, month, 0);
    const daysInPrevMonth = prevMonth.getDate();
    
    const calendarDays = document.getElementById('calendarDays');
    if (!calendarDays) {
        console.error('Calendar days element not found!');
        return;
    }
    
    calendarDays.innerHTML = '';
    
    // Add previous month's trailing days
    for (let i = startingDayOfWeek - 1; i >= 0; i--) {
        const day = daysInPrevMonth - i;
        const dayDiv = createDayElement(day, true, year, month - 1);
        calendarDays.appendChild(dayDiv);
    }
    
    // Add current month days
    for (let day = 1; day <= daysInMonth; day++) {
        const dayDiv = createDayElement(day, false, year, month);
        calendarDays.appendChild(dayDiv);
    }
    
    // Add next month's leading days to fill the grid
    const totalCells = calendarDays.children.length;
    const remainingCells = 42 - totalCells; // 6 rows × 7 days
    for (let day = 1; day <= remainingCells && remainingCells < 7; day++) {
        const dayDiv = createDayElement(day, true, year, month + 1);
        calendarDays.appendChild(dayDiv);
    }
    
    console.log('=== END RENDER CALENDAR DEBUG ===');
}

function createDayElement(day, isOtherMonth, year, month) {
    const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
    const isToday = dateStr === new Date().toISOString().split('T')[0];
    const isPast = new Date(dateStr) < new Date().setHours(0, 0, 0, 0);
    
    console.log('Creating day element for:', dateStr, 'Has slots:', !!slotsData[dateStr]); // Debug log
    
    const dayDiv = document.createElement('div');
    dayDiv.className = `bg-white min-h-[120px] p-2 ${isOtherMonth ? 'text-gray-400' : 'text-[#2b2a24]'} ${isPast && !isOtherMonth ? 'bg-gray-50' : ''}`;
    
    // Day number
    const dayNumber = document.createElement('div');
    dayNumber.className = `text-sm font-medium mb-2 ${isToday ? 'w-6 h-6 bg-[#845d45] text-white rounded-full flex items-center justify-center' : ''}`;
    dayNumber.textContent = day;
    dayDiv.appendChild(dayNumber);
    
    // Add slots for this date - ensure we check slotsData properly
    if (!isOtherMonth && slotsData && slotsData[dateStr] && Array.isArray(slotsData[dateStr])) {
        console.log('Adding slots for date:', dateStr, 'Slots:', slotsData[dateStr]); // Debug log
        const slotsContainer = document.createElement('div');
        slotsContainer.className = 'space-y-1';
        
        slotsData[dateStr].forEach(slot => {
            const slotElement = createSlotElement(slot);
            slotsContainer.appendChild(slotElement);
        });
        
        dayDiv.appendChild(slotsContainer);
    }
    
    // Add click handler for empty days (for creating new slots)
    if (!isOtherMonth && !isPast) {
        dayDiv.addEventListener('click', function(e) {
            if (e.target === dayDiv || e.target === dayNumber) {
                openCreateSlotModalForDate(dateStr);
            }
        });
        dayDiv.classList.add('cursor-pointer', 'hover:bg-[#f9f7f4]');
    }
    
    return dayDiv;
}

function createSlotElement(slot) {
    const isOwnSlot = slot.instructor_id == currentInstructorId;
    const isFullyBooked = slot.booked_beds >= slot.available_beds;
    const startTime = new Date(slot.start_time).toLocaleTimeString('en-US', { 
        hour: 'numeric', 
        minute: '2-digit', 
        hour12: true 
    });
    
    const slotDiv = document.createElement('div');
    slotDiv.className = `text-xs p-1 rounded cursor-pointer transition-colors ${
        isOwnSlot 
            ? (isFullyBooked ? 'bg-green-200 border-2 border-green-500 text-green-800' : 'bg-[#845d45] text-white hover:bg-[#6e4635]')
            : 'bg-gray-300 text-gray-700'
    }`;
    
    if (isOwnSlot) {
        slotDiv.innerHTML = `
            <div class="font-medium">${startTime}</div>
            <div>${slot.booked_beds}/${slot.available_beds} beds</div>
        `;
        slotDiv.addEventListener('click', () => openSlotDetails(slot));
    } else {
        // Show other instructor's initials
        const initials = slot.instructor_first_name.charAt(0) + slot.instructor_last_name.charAt(0);
        slotDiv.innerHTML = `
            <div class="font-medium">${initials}</div>
            <div>${startTime}</div>
        `;
    }
    
    return slotDiv;
}

function changeMonth(direction) {
    currentDate.setMonth(currentDate.getMonth() + direction);
    
    // Fetch new data for the month
    const monthStr = currentDate.getFullYear() + '-' + String(currentDate.getMonth() + 1).padStart(2, '0');
    fetchCalendarData(monthStr);
}

async function fetchCalendarData(monthStr) {
    try {
        console.log('Fetching calendar data for month:', monthStr); // Debug log
        const response = await fetch(`/instructor/calendar-data?month=${monthStr}`);
        const result = await response.json();
        
        console.log('Fetched calendar data:', result); // Debug log
        
        if (result.success) {
            slotsData = result.slots_by_date;
            renderCalendar();
        } else {
            console.error('Failed to fetch calendar data:', result.message);
        }
    } catch (error) {
        console.error('Error fetching calendar data:', error);
    }
}

function openSlotDetails(slot) {
    const modal = document.getElementById('slotDetailsModal');
    const title = document.getElementById('slotModalTitle');
    const content = document.getElementById('slotDetailsContent');
    
    const startTime = new Date(slot.start_time);
    const endTime = new Date(slot.end_time);
    
    title.textContent = `Class on ${startTime.toLocaleDateString('en-US', { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    })}`;
    
    content.innerHTML = `
        <div class="space-y-4">
            <div class="bg-[#f9f7f4] p-4 rounded-lg">
                <h4 class="font-medium text-[#2b2a24] font-quicksand mb-2">class information</h4>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="font-medium text-[#845d45] font-quicksand">time:</span>
                        <span class="text-[#2b2a24] font-quicksand">${startTime.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', hour12: true })} - ${endTime.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', hour12: true })}</span>
                    </div>
                    <div>
                        <span class="font-medium text-[#845d45] font-quicksand">beds:</span>
                        <span class="text-[#2b2a24] font-quicksand">${slot.booked_beds}/${slot.available_beds}</span>
                    </div>
                    <div>
                        <span class="font-medium text-[#845d45] font-quicksand">type:</span>
                        <span class="text-[#2b2a24] font-quicksand">${slot.class_type}</span>
                    </div>
                    <div>
                        <span class="font-medium text-[#845d45] font-quicksand">status:</span>
                        <span class="text-[#2b2a24] font-quicksand">${slot.status}</span>
                    </div>
                </div>
                ${slot.description ? `<div class="mt-2"><span class="font-medium text-[#845d45] font-quicksand">description:</span> <span class="text-[#2b2a24] font-quicksand">${slot.description}</span></div>` : ''}
            </div>
            
            <div>
                <h4 class="font-medium text-[#2b2a24] font-quicksand mb-3">booked students (${slot.students.length})</h4>
                ${slot.students.length > 0 ? 
                    `<div class="space-y-2">
                        ${slot.students.map(student => `
                            <div class="flex justify-between items-center p-2 bg-white border border-[#e8d7c3] rounded">
                                <span class="text-[#2b2a24] font-quicksand">${student.name}</span>
                                <button onclick="cancelStudentBooking(${student.booking_id}, '${student.name}')" class="text-red-600 hover:text-red-800 text-sm font-quicksand">cancel</button>
                            </div>
                        `).join('')}
                    </div>` : 
                    '<p class="text-[#845d45] font-quicksand text-sm italic">no students booked yet</p>'
                }
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-[#e8d7c3]">
                <button onclick="editSlot(${slot.id})" class="flex-1 bg-[#e8d7c3] text-[#845d45] px-4 py-2 rounded-md hover:bg-[#845d45] hover:text-white font-quicksand font-medium transition">
                    edit slot
                </button>
                <button onclick="cancelSlot(${slot.id})" class="flex-1 bg-red-100 text-red-700 px-4 py-2 rounded-md hover:bg-red-200 font-quicksand font-medium transition">
                    cancel slot
                </button>
            </div>
        </div>
    `;
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function openCreateSlotModalForDate(dateStr) {
    document.getElementById('slotDate').value = dateStr;
    openCreateSlotModal();
}

function openCreateSlotModal() {
    document.getElementById('createSlotModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeSlotDetailsModal() {
    document.getElementById('slotDetailsModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function closeCreateSlotModal() {
    document.getElementById('createSlotModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    document.getElementById('createSlotForm').reset();
    hideSlotMessage();
    hideConflictWarning();
}

function closeUploadProfileModal() {
    document.getElementById('uploadProfileModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    document.getElementById('uploadProfileForm').reset();
    hideUploadMessage();
}

function openProfileModal() {
    document.getElementById('profileModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeProfileModal() {
    document.getElementById('profileModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    hideProfileMessage();
}

function openUploadProfileModal() {
    document.getElementById('uploadProfileModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

// Message functions
function showSlotMessage(message, isError = false) {
    const messageDiv = document.getElementById('slotMessage');
    messageDiv.textContent = message;
    messageDiv.className = `mx-6 mt-4 p-3 rounded-md font-quicksand ${isError ? 'bg-red-100 text-red-700 border border-red-300' : 'bg-green-100 text-green-700 border border-green-300'}`;
    messageDiv.classList.remove('hidden');
}

function hideSlotMessage() {
    document.getElementById('slotMessage').classList.add('hidden');
}

function showUploadMessage(message, isError = false) {
    const messageDiv = document.getElementById('uploadMessage');
    messageDiv.textContent = message;
    messageDiv.className = `mx-6 mt-4 p-3 rounded-md font-quicksand ${isError ? 'bg-red-100 text-red-700 border border-red-300' : 'bg-green-100 text-green-700 border border-green-300'}`;
    messageDiv.classList.remove('hidden');
}

function hideUploadMessage() {
    document.getElementById('uploadMessage').classList.add('hidden');
}

function showProfileMessage(message, isError = false) {
    const messageDiv = document.getElementById('profileMessage');
    messageDiv.textContent = message;
    messageDiv.className = `mx-6 mt-4 p-3 rounded-md font-quicksand ${isError ? 'bg-red-100 text-red-700 border border-red-300' : 'bg-green-100 text-green-700 border border-green-300'}`;
    messageDiv.classList.remove('hidden');
}

function hideProfileMessage() {
    document.getElementById('profileMessage').classList.add('hidden');
}

function showConflictWarning() {
    document.getElementById('conflictWarning').classList.remove('hidden');
    document.getElementById('createSlotBtn').disabled = true;
    document.getElementById('createSlotBtn').classList.add('opacity-50', 'cursor-not-allowed');
}

function hideConflictWarning() {
    document.getElementById('conflictWarning').classList.add('hidden');
    document.getElementById('createSlotBtn').disabled = false;
    document.getElementById('createSlotBtn').classList.remove('opacity-50', 'cursor-not-allowed');
}

// Check for time conflicts when creating slots
function checkTimeConflict() {
    const date = document.getElementById('slotDate').value;
    const startTimeInput = document.querySelector('input[name="start_time"]');
    const endTimeInput = document.querySelector('input[name="end_time"]');
    
    if (!date || !startTimeInput.value || !endTimeInput.value) {
        hideConflictWarning();
        return;
    }
    
    const startDateTime = new Date(`${date}T${startTimeInput.value}`);
    const endDateTime = new Date(`${date}T${endTimeInput.value}`);
    
    // Check if any existing slots conflict with this time
    const slotsOnDate = slotsData[date] || [];
    let hasConflict = false;
    
    for (const slot of slotsOnDate) {
        const slotStart = new Date(slot.start_time);
        const slotEnd = new Date(slot.end_time);
        
        // Check if times overlap
        if ((startDateTime >= slotStart && startDateTime < slotEnd) ||
            (endDateTime > slotStart && endDateTime <= slotEnd) ||
            (startDateTime <= slotStart && endDateTime >= slotEnd)) {
            hasConflict = true;
            break;
        }
    }
    
    if (hasConflict) {
        showConflictWarning();
    } else {
        hideConflictWarning();
    }
}

function setupFormHandlers() {
    // Create Slot Form
    const createSlotForm = document.getElementById('createSlotForm');
    if (createSlotForm) {
        // Add time conflict checking
        const dateInput = document.getElementById('slotDate');
        const startTimeInput = document.querySelector('input[name="start_time"]');
        const endTimeInput = document.querySelector('input[name="end_time"]');
        
        [dateInput, startTimeInput, endTimeInput].forEach(input => {
            if (input) {
                input.addEventListener('change', checkTimeConflict);
            }
        });
        
        createSlotForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (document.getElementById('createSlotBtn').disabled) {
                return;
            }
            
            const formData = new FormData(this);
            
            try {
                const response = await fetch('/instructor/create-slot', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    showSlotMessage('slot created successfully!', false);
                    setTimeout(() => {
                        closeCreateSlotModal();
                        location.reload();
                    }, 2000);
                } else {
                    showSlotMessage(result.message || 'failed to create slot', true);
                }
            } catch (error) {
                showSlotMessage('an error occurred. please try again.', true);
            }
        });
    }

    // Upload Profile Form
    const uploadProfileForm = document.getElementById('uploadProfileForm');
    if (uploadProfileForm) {
        uploadProfileForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            try {
                const response = await fetch('/instructor/upload-profile-image', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    showUploadMessage('profile picture updated successfully!', false);
                    setTimeout(() => {
                        closeUploadProfileModal();
                        location.reload();
                    }, 2000);
                } else {
                    showUploadMessage(result.message || 'failed to upload image', true);
                }
            } catch (error) {
                showUploadMessage('an error occurred. please try again.', true);
            }
        });
    }

    // Profile Form
    const profileForm = document.getElementById('profileForm');
    if (profileForm) {
        profileForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            try {
                const response = await fetch('/instructor/update-profile', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    showProfileMessage('profile updated successfully!', false);
                    setTimeout(() => {
                        closeProfileModal();
                        location.reload();
                    }, 2000);
                } else {
                    showProfileMessage(result.message || 'failed to update profile', true);
                }
            } catch (error) {
                showProfileMessage('an error occurred. please try again.', true);
            }
        });
    }
}

// Action functions
async function cancelSlot(slotId) {
    if (!confirm('are you sure you want to cancel this slot? all bookings will be cancelled and students will be notified.')) {
        return;
    }
    
    try {
        const response = await fetch('/instructor/cancel-slot', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ slot_id: slotId })
        });
        
        const result = await response.json();
        
        if (result.success) {
            closeSlotDetailsModal();
            location.reload();
        } else {
            alert('failed to cancel slot: ' + result.message);
        }
    } catch (error) {
        alert('an error occurred while cancelling the slot');
    }
}

async function cancelStudentBooking(bookingId, studentName) {
    if (!confirm(`are you sure you want to cancel ${studentName}'s booking?`)) {
        return;
    }
    
    try {
        const response = await fetch('/admin/cancel-booking', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ booking_id: bookingId })
        });
        
        const result = await response.json();
        
        if (result.success) {
            closeSlotDetailsModal();
            location.reload();
        } else {
            alert('failed to cancel booking: ' + result.message);
        }
    } catch (error) {
        alert('an error occurred while cancelling the booking');
    }
}

function editSlot(slotId) {
    // This would open an edit slot modal - implement as needed
    alert('edit slot functionality coming soon');
}

// Close modals on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeCreateSlotModal();
        closeUploadProfileModal();
        closeProfileModal();
        closeSlotDetailsModal();
    }
});

// Prevent modal close when clicking inside modal content
document.addEventListener('DOMContentLoaded', function() {
    const modals = ['createSlotModal', 'uploadProfileModal', 'profileModal', 'slotDetailsModal'];
    
    modals.forEach(modalId => {
        const modal = document.getElementById(modalId);
        if (modal) {
            const modalContent = modal.querySelector('.bg-white');
            if (modalContent) {
                modalContent.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }
        }
    });
});
</script>

<?php include base_path('views/partials/footer.php'); ?>