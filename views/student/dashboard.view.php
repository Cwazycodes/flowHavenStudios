<?php include base_path('views/partials/header.php'); ?>

<div class="min-h-screen bg-[#f2e9dc] py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-[#2b2a24] font-quicksand">student dashboard</h1>
            <p class="mt-2 text-[#845d45] font-quicksand">welcome back, <?= strtolower($student_profile['first_name']) ?></p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
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
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">total classes</dt>
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
                                    <path d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zM4 7h12v9a1 1 0 01-1 1H5a1 1 0 01-1-1V7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">this month</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand"><?= $stats['monthly_bookings'] ?></dd>
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
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">upcoming</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand"><?= $stats['upcoming_classes'] ?></dd>
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
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">completed</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand"><?= $stats['completed_classes'] ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mb-6 flex flex-wrap gap-4">
            <button onclick="openBookClassModal()" class="bg-[#845d45] text-white px-4 py-2 rounded-md hover:bg-[#6e4635] font-quicksand font-medium transition">
                book a class
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
            <!-- Upcoming Bookings -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3] mb-6">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">your upcoming classes</h3>
                    </div>
                    <div class="overflow-hidden">
                        <div class="max-h-64 overflow-y-auto">
                            <?php if (empty($upcoming_bookings)): ?>
                            <div class="p-6 text-center">
                                <svg class="w-12 h-12 text-[#845d45] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4M5 7h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z"></path>
                                </svg>
                                <p class="text-[#845d45] font-quicksand">no upcoming classes booked</p>
                                <button onclick="openBookClassModal()" class="mt-2 text-[#845d45] hover:text-[#6e4635] font-quicksand font-medium">book your first class</button>
                            </div>
                            <?php else: ?>
                            <table class="min-w-full divide-y divide-[#e8d7c3]">
                                <thead class="bg-[#f9f7f4] sticky top-0">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">date & time</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">instructor</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">class info</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-[#e8d7c3]">
                                    <?php foreach ($upcoming_bookings as $booking): ?>
                                    <tr class="hover:bg-[#f9f7f4] transition">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand">
                                            <div>
                                                <div class="font-medium"><?= date('M j, Y', strtotime($booking['start_time'])) ?></div>
                                                <div class="text-[#845d45]"><?= date('g:i A', strtotime($booking['start_time'])) ?> - <?= date('g:i A', strtotime($booking['end_time'])) ?></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand"><?= htmlspecialchars($booking['instructor_name']) ?></td>
                                        <td class="px-6 py-4 text-sm text-[#2b2a24] font-quicksand">
                                            <div class="text-[#845d45]"><?= $booking['total_booked'] ?>/<?= $booking['available_beds'] ?> beds booked</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button onclick="cancelBooking(<?= $booking['id'] ?>)" class="text-red-600 hover:text-red-800 font-quicksand transition">cancel</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Available Classes -->
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">available classes</h3>
                        <p class="text-sm text-[#845d45] font-quicksand">book your next session</p>
                    </div>
                    <div class="overflow-hidden">
                        <div class="max-h-96 overflow-y-auto">
                            <?php if (empty($available_slots)): ?>
                            <div class="p-6 text-center">
                                <svg class="w-12 h-12 text-[#845d45] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-[#845d45] font-quicksand">no available classes at the moment</p>
                                <p class="text-sm text-[#845d45] font-quicksand mt-1">check back soon for new slots</p>
                            </div>
                            <?php else: ?>
                            <div class="space-y-3 p-6">
                                <?php foreach ($available_slots as $slot): ?>
                                <div class="border border-[#e8d7c3] rounded-lg p-4 hover:bg-[#f9f7f4] transition">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-2">
                                                <h4 class="font-medium text-[#2b2a24] font-quicksand"><?= htmlspecialchars($slot['instructor_name']) ?></h4>
                                                <span class="text-sm text-[#845d45] font-quicksand"><?= ($slot['available_beds'] - $slot['booked_beds']) ?> beds left</span>
                                            </div>
                                            <div class="text-sm text-[#845d45] font-quicksand mb-2">
                                                <?= date('l, M j, Y', strtotime($slot['start_time'])) ?><br>
                                                <?= date('g:i A', strtotime($slot['start_time'])) ?> - <?= date('g:i A', strtotime($slot['end_time'])) ?>
                                            </div>
                                            <?php if ($slot['description']): ?>
                                            <p class="text-sm text-[#845d45] font-quicksand"><?= htmlspecialchars($slot['description']) ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <button onclick="bookClass(<?= $slot['id'] ?>)" class="ml-4 bg-[#845d45] text-white px-4 py-2 rounded-md hover:bg-[#6e4635] font-quicksand font-medium transition text-sm">
                                            book now
                                        </button>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Profile & Quick Actions -->
            <div class="space-y-6">
                <!-- Profile Summary -->
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">your profile</h3>
                    </div>
                    <div class="p-6">
                        <div class="text-center mb-4">
                            <div class="w-16 h-16 mx-auto bg-[#e8d7c3] rounded-full flex items-center justify-center mb-2">
                                <?php if (!empty($student_profile['profile_image'])): ?>
                                    <img src="<?= htmlspecialchars($student_profile['profile_image']) ?>" alt="profile" class="w-16 h-16 rounded-full object-cover">
                                <?php else: ?>
                                    <svg class="w-8 h-8 text-[#845d45]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <h4 class="font-medium text-[#2b2a24] font-quicksand"><?= htmlspecialchars($student_profile['first_name'] . ' ' . $student_profile['last_name']) ?></h4>
                            <p class="text-sm text-[#845d45] font-quicksand"><?= htmlspecialchars($student_profile['fitness_level'] ?? 'beginner') ?> level</p>
                        </div>
                        
                        <div class="space-y-2 text-sm">
                            <div>
                                <span class="font-medium text-[#2b2a24] font-quicksand">email:</span>
                                <span class="text-[#845d45] font-quicksand"><?= htmlspecialchars($student_profile['email']) ?></span>
                            </div>
                            
                            <?php if (!empty($student_profile['phone'])): ?>
                            <div>
                                <span class="font-medium text-[#2b2a24] font-quicksand">phone:</span>
                                <span class="text-[#845d45] font-quicksand"><?= htmlspecialchars($student_profile['phone']) ?></span>
                            </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($student_profile['preferred_location_name'])): ?>
                            <div>
                                <span class="font-medium text-[#2b2a24] font-quicksand">preferred location:</span>
                                <span class="text-[#845d45] font-quicksand"><?= htmlspecialchars($student_profile['preferred_location_name']) ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Class History -->
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">recent classes</h3>
                    </div>
                    <div class="p-6">
                        <div class="max-h-64 overflow-y-auto space-y-3">
                            <?php if (empty($booking_history)): ?>
                            <p class="text-[#845d45] font-quicksand text-sm text-center">no class history yet</p>
                            <?php else: ?>
                                <?php foreach (array_slice($booking_history, 0, 5) as $booking): ?>
                                <div class="flex justify-between items-center py-2 border-b border-[#e8d7c3] last:border-b-0">
                                    <div>
                                        <p class="text-sm font-medium text-[#2b2a24] font-quicksand"><?= htmlspecialchars($booking['instructor_name']) ?></p>
                                        <p class="text-xs text-[#845d45] font-quicksand"><?= date('M j, g:i A', strtotime($booking['start_time'])) ?></p>
                                    </div>
                                    <div class="text-right">
                                        <span class="px-2 py-1 text-xs rounded-full 
                                            <?php if ($booking['status'] === 'confirmed' && strtotime($booking['end_time']) < time()): ?>
                                                bg-blue-100 text-blue-800
                                            <?php elseif ($booking['status'] === 'confirmed'): ?>
                                                bg-green-100 text-green-800
                                            <?php else: ?>
                                                bg-gray-100 text-gray-800
                                            <?php endif; ?> font-quicksand">
                                            <?php if ($booking['status'] === 'confirmed' && strtotime($booking['end_time']) < time()): ?>
                                                completed
                                            <?php else: ?>
                                                <?= $booking['status'] ?>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        
                        <?php if (count($booking_history) > 5): ?>
                        <div class="mt-4 text-center">
                            <button onclick="viewAllHistory()" class="text-[#845d45] hover:text-[#6e4635] font-quicksand text-sm font-medium">view all history</button>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Quick Tips -->
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">studio tips</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3 text-sm">
                            <div class="flex items-start space-x-2">
                                <div class="w-2 h-2 bg-[#845d45] rounded-full mt-2"></div>
                                <p class="text-[#845d45] font-quicksand">arrive 10 minutes early for your first class</p>
                            </div>
                            <div class="flex items-start space-x-2">
                                <div class="w-2 h-2 bg-[#845d45] rounded-full mt-2"></div>
                                <p class="text-[#845d45] font-quicksand">bring a water bottle and towel</p>
                            </div>
                            <div class="flex items-start space-x-2">
                                <div class="w-2 h-2 bg-[#845d45] rounded-full mt-2"></div>
                                <p class="text-[#845d45] font-quicksand">wear comfortable athletic clothing</p>
                            </div>
                            <div class="flex items-start space-x-2">
                                <div class="w-2 h-2 bg-[#845d45] rounded-full mt-2"></div>
                                <p class="text-[#845d45] font-quicksand">cancel 12 hours in advance to avoid charges</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Book Class Modal -->
<div id="bookClassModal" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm" onclick="closeBookClassModal()"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto border border-[#e8d7c3] relative">
            <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">book a class</h3>
                <button onclick="closeBookClassModal()" class="absolute top-4 right-4 text-[#845d45] hover:text-[#6e4635]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div id="bookMessage" class="hidden mx-6 mt-4 p-3 rounded-md font-quicksand"></div>
            
            <div class="p-6">
                <div class="space-y-4">
                    <?php foreach ($available_slots as $slot): ?>
                    <div class="border border-[#e8d7c3] rounded-lg p-4 hover:bg-[#f9f7f4] transition">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-medium text-[#2b2a24] font-quicksand"><?= htmlspecialchars($slot['instructor_name']) ?></h4>
                                    <span class="text-sm text-[#845d45] font-quicksand"><?= ($slot['available_beds'] - $slot['booked_beds']) ?> beds available</span>
                                </div>
                                <div class="text-sm text-[#845d45] font-quicksand mb-2">
                                    <div class="font-medium"><?= date('l, M j, Y', strtotime($slot['start_time'])) ?></div>
                                    <div><?= date('g:i A', strtotime($slot['start_time'])) ?> - <?= date('g:i A', strtotime($slot['end_time'])) ?></div>
                                </div>
                                <?php if ($slot['description']): ?>
                                <p class="text-sm text-[#845d45] font-quicksand mb-2"><?= htmlspecialchars($slot['description']) ?></p>
                                <?php endif; ?>
                                <div class="text-sm font-medium text-[#2b2a24] font-quicksand">£25.00</div>
                            </div>
                            <button onclick="confirmBooking(<?= $slot['id'] ?>, '<?= htmlspecialchars($slot['instructor_name']) ?>', '<?= date('M j, Y g:i A', strtotime($slot['start_time'])) ?>')" 
                                    class="ml-4 bg-[#845d45] text-white px-4 py-2 rounded-md hover:bg-[#6e4635] font-quicksand font-medium transition">
                                book now
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
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
                        <?php if (!empty($student_profile['profile_image'])): ?>
                            <img src="<?= htmlspecialchars($student_profile['profile_image']) ?>" alt="current profile" class="w-24 h-24 rounded-full object-cover">
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
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-[#845d45] font-quicksand">first name</label>
                        <input type="text" name="first_name" value="<?= htmlspecialchars($student_profile['first_name']) ?>" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#845d45] font-quicksand">last name</label>
                        <input type="text" name="last_name" value="<?= htmlspecialchars($student_profile['last_name']) ?>" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">phone</label>
                    <input type="tel" name="phone" value="<?= htmlspecialchars($student_profile['phone'] ?? '') ?>" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">fitness level</label>
                    <select name="fitness_level" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                        <option value="beginner" <?= ($student_profile['fitness_level'] ?? 'beginner') === 'beginner' ? 'selected' : '' ?>>beginner</option>
                        <option value="intermediate" <?= ($student_profile['fitness_level'] ?? 'beginner') === 'intermediate' ? 'selected' : '' ?>>intermediate</option>
                        <option value="advanced" <?= ($student_profile['fitness_level'] ?? 'beginner') === 'advanced' ? 'selected' : '' ?>>advanced</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">emergency contact name</label>
                    <input type="text" name="emergency_contact_name" value="<?= htmlspecialchars($student_profile['emergency_contact_name'] ?? '') ?>" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">emergency contact phone</label>
                    <input type="tel" name="emergency_contact_phone" value="<?= htmlspecialchars($student_profile['emergency_contact_phone'] ?? '') ?>" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">medical conditions/notes</label>
                    <textarea name="medical_conditions" rows="3" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand"><?= htmlspecialchars($student_profile['medical_conditions'] ?? '') ?></textarea>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="marketing_consent" <?= ($student_profile['marketing_consent'] ?? false) ? 'checked' : '' ?> class="h-4 w-4 text-[#845d45] focus:ring-[#845d45] border-[#e8d7c3] rounded">
                    <label class="ml-2 block text-sm text-[#845d45] font-quicksand">receive marketing emails</label>
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
function openBookClassModal() {
    document.getElementById('bookClassModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeBookClassModal() {
    document.getElementById('bookClassModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    hideBookMessage();
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
function showBookMessage(message, isError = false) {
    const messageDiv = document.getElementById('bookMessage');
    messageDiv.textContent = message;
    messageDiv.className = `mx-6 mt-4 p-3 rounded-md font-quicksand ${isError ? 'bg-red-100 text-red-700 border border-red-300' : 'bg-green-100 text-green-700 border border-green-300'}`;
    messageDiv.classList.remove('hidden');
}

function hideBookMessage() {
    document.getElementById('bookMessage').classList.add('hidden');
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

// Booking functions
async function bookClass(slotId) {
    try {
        const response = await fetch('/student/book-class', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ slot_id: slotId })
        });
        
        const result = await response.json();
        
        if (result.success) {
            showBookMessage('class booked successfully! you will receive a confirmation email shortly.', false);
            setTimeout(() => {
                closeBookClassModal();
                location.reload();
            }, 3000);
        } else {
            showBookMessage(result.message || 'failed to book class', true);
        }
    } catch (error) {
        showBookMessage('an error occurred. please try again.', true);
    }
}

async function confirmBooking(slotId, instructorName, dateTime) {
    if (confirm(`confirm booking with ${instructorName} on ${dateTime}? cost: £25.00`)) {
        await bookClass(slotId);
    }
}

async function cancelBooking(bookingId) {
    if (!confirm('are you sure you want to cancel this booking? cancellations made less than 12 hours before class time may incur a fee.')) {
        return;
    }
    
    try {
        const response = await fetch('/student/cancel-booking', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ booking_id: bookingId })
        });
        
        const result = await response.json();
        
        if (result.success) {
            location.reload();
        } else {
            alert('failed to cancel booking: ' + result.message);
        }
    } catch (error) {
        alert('an error occurred while cancelling the booking');
    }
}

// Form submissions
document.getElementById('uploadProfileForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('/student/upload-profile-image', {
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
        const response = await fetch('/student/update-profile', {
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

// Additional functions
function viewAllHistory() {
    // This would open a detailed history modal or navigate to a history page
    alert('full history view coming soon');
}

// Close modals on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeBookClassModal();
        closeUploadProfileModal();
        closeProfileModal();
    }
});
</script>

<?php include base_path('views/partials/footer.php');