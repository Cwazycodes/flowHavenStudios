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
            <!-- Upcoming Slots -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">upcoming slots</h3>
                    </div>
                    <div class="overflow-hidden">
                        <div class="max-h-96 overflow-y-auto">
                            <table class="min-w-full divide-y divide-[#e8d7c3]">
                                <thead class="bg-[#f9f7f4] sticky top-0">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">date & time</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">beds</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">students</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-[#e8d7c3]">
                                    <?php foreach ($upcoming_slots as $slot): ?>
                                    <tr class="hover:bg-[#f9f7f4] transition">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand">
                                            <div>
                                                <div class="font-medium"><?= date('M j, Y', strtotime($slot['start_time'])) ?></div>
                                                <div class="text-[#845d45]"><?= date('g:i A', strtotime($slot['start_time'])) ?> - <?= date('g:i A', strtotime($slot['end_time'])) ?></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand">
                                            <span class="font-medium"><?= $slot['booked_beds'] ?>/<?= $slot['available_beds'] ?></span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-[#2b2a24] font-quicksand">
                                            <?php if ($slot['student_names']): ?>
                                                <div class="max-w-xs truncate" title="<?= htmlspecialchars($slot['student_names']) ?>">
                                                    <?= htmlspecialchars($slot['student_names']) ?>                                           
                                                </div>
                                            <?php else: ?>
                                                <span class="text-[#845d45] italic">no bookings yet</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                <?= $slot['status'] === 'scheduled' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?> font-quicksand">
                                                <?= $slot['status'] ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                            <button onclick="viewSlotDetails(<?= $slot['id'] ?>)" class="text-[#845d45] hover:text-[#6e4635] font-quicksand transition">view</button>
                                            <button onclick="editSlot(<?= $slot['id'] ?>)" class="text-[#845d45] hover:text-[#6e4635] font-quicksand transition">edit</button>
                                            <button onclick="cancelSlot(<?= $slot['id'] ?>)" class="text-red-600 hover:text-red-800 font-quicksand transition">cancel</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

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
                    <input type="date" name="date" required min="<?= date('Y-m-d') ?>" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
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
                <button type="submit" class="w-full bg-[#845d45] text-white py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium transition">
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
// Modal functions
function openCreateSlotModal() {
    document.getElementById('createSlotModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeCreateSlotModal() {
    document.getElementById('createSlotModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    document.getElementById('createSlotForm').reset();
    hideSlotMessage();
}

function openUploadProfileModal() {
    document.getElementById('uploadProfileModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
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

// Form submissions
document.getElementById('createSlotForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
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

document.getElementById('uploadProfileForm').addEventListener('submit', async function(e) {
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

document.getElementById('profileForm').addEventListener('submit', async function(e) {
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
            location.reload();
        } else {
            alert('failed to cancel slot: ' + result.message);
        }
    } catch (error) {
        alert('an error occurred while cancelling the slot');
    }
}

function viewSlotDetails(slotId) {
    // This would open a slot details modal - implement as needed
    alert('slot details view coming soon');
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
    }
});
</script>

<?php include base_path('views/partials/footer.php');