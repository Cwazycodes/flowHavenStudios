<?php include base_path('views/partials/header.php'); ?>

<div class="min-h-screen bg-[#f2e9dc] py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-[#2b2a24] font-quicksand">admin dashboard</h1>
            <p class="mt-2 text-[#845d45] font-quicksand">manage your flow haven studios</p>
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
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">total users</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand"><?= $stats['total_users'] ?? 0 ?></dd>
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
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">students</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand"><?= $stats['total_students'] ?? 0 ?></dd>
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
                                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">instructors</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand"><?= $stats['total_instructors'] ?? 0 ?></dd>
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
                                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">today's bookings</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand"><?= $stats['todays_bookings'] ?? 0 ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mb-6 flex flex-wrap gap-4">
            <button onclick="openCreateInstructorModal()" class="bg-[#845d45] text-white px-4 py-2 rounded-md hover:bg-[#6e4635] font-quicksand font-medium transition">
                create instructor account
            </button>
            <button onclick="openManageUsersModal()" class="bg-[#e8d7c3] text-[#845d45] border border-[#845d45] px-4 py-2 rounded-md hover:bg-[#845d45] hover:text-white font-quicksand font-medium transition">
                manage users
            </button>
            <button onclick="openUploadProfileModal()" class="bg-[#e8d7c3] text-[#845d45] border border-[#845d45] px-4 py-2 rounded-md hover:bg-[#845d45] hover:text-white font-quicksand font-medium transition">
                update profile picture
            </button>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Bookings -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">recent bookings</h3>
                    </div>
                    <div class="overflow-hidden">
                        <div class="max-h-96 overflow-y-auto">
                            <?php if (!empty($recent_bookings)): ?>
                            <table class="min-w-full divide-y divide-[#e8d7c3]">
                                <thead class="bg-[#f9f7f4] sticky top-0">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">student</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">instructor</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">class time</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-[#e8d7c3]">
                                    <?php foreach ($recent_bookings as $booking): ?>
                                    <tr class="hover:bg-[#f9f7f4] transition">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand"><?= htmlspecialchars($booking['student_name'] ?? 'Unknown') ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand"><?= htmlspecialchars($booking['instructor_name'] ?? 'Unknown') ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand">
                                            <?= isset($booking['start_time']) ? date('M j, Y g:i A', strtotime($booking['start_time'])) : 'N/A' ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                <?= ($booking['status'] ?? '') === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?> font-quicksand">
                                                <?= htmlspecialchars($booking['status'] ?? 'pending') ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button onclick="cancelBooking(<?= $booking['id'] ?? 0 ?>)" class="text-red-600 hover:text-red-800 font-quicksand transition">cancel</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                            <div class="p-6 text-center">
                                <p class="text-[#845d45] font-quicksand">no recent bookings found</p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="space-y-6">
                <!-- Upcoming Classes -->
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">upcoming classes</h3>
                    </div>
                    <div class="p-6">
                        <div class="max-h-64 overflow-y-auto space-y-3">
                            <?php if (!empty($upcoming_slots)): ?>
                                <?php foreach (array_slice($upcoming_slots, 0, 5) as $slot): ?>
                                <div class="flex justify-between items-center py-2 border-b border-[#e8d7c3] last:border-b-0">
                                    <div>
                                        <p class="text-sm font-medium text-[#2b2a24] font-quicksand"><?= htmlspecialchars($slot['instructor_name'] ?? 'Unknown') ?></p>
                                        <p class="text-xs text-[#845d45] font-quicksand">
                                            <?= isset($slot['start_time']) ? date('M j, g:i A', strtotime($slot['start_time'])) : 'No time set' ?>
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-[#2b2a24] font-quicksand"><?= ($slot['booked_beds'] ?? 0) ?>/<?= ($slot['available_beds'] ?? 0) ?></p>
                                        <p class="text-xs text-[#845d45] font-quicksand">beds</p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-[#845d45] font-quicksand text-sm text-center">no upcoming classes</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- System Status -->
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">system status</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-[#845d45] font-quicksand">database</span>
                                <span class="flex items-center text-green-600">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                    <span class="text-sm font-quicksand">online</span>
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-[#845d45] font-quicksand">email service</span>
                                <span class="flex items-center text-green-600">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                    <span class="text-sm font-quicksand">active</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Instructor Modal -->
<div id="createInstructorModal" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm" onclick="closeCreateInstructorModal()"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full max-h-[90vh] overflow-y-auto border border-[#e8d7c3] relative">
            <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">create instructor account</h3>
                <button onclick="closeCreateInstructorModal()" class="absolute top-4 right-4 text-[#845d45] hover:text-[#6e4635]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div id="instructorMessage" class="hidden mx-6 mt-4 p-3 rounded-md font-quicksand"></div>
            
            <form id="createInstructorForm" class="p-6 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-[#845d45] font-quicksand">first name</label>
                        <input type="text" name="first_name" required class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#845d45] font-quicksand">last name</label>
                        <input type="text" name="last_name" required class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">email</label>
                    <input type="email" name="email" required class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">phone (optional)</label>
                    <input type="tel" name="phone" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">bio</label>
                    <textarea name="bio" rows="3" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">specializations</label>
                    <input type="text" name="specializations" placeholder="e.g., reformer pilates, mat pilates" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">certifications</label>
                    <input type="text" name="certifications" placeholder="e.g., BASI certified" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#845d45] font-quicksand">instagram handle (optional)</label>
                    <input type="text" name="instagram_handle" placeholder="@username" class="mt-1 block w-full border-[#e8d7c3] rounded-md shadow-sm focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" class="h-4 w-4 text-[#845d45] focus:ring-[#845d45] border-[#e8d7c3] rounded">
                    <label class="ml-2 block text-sm text-[#845d45] font-quicksand">featured instructor</label>
                </div>
                <button type="submit" class="w-full bg-[#845d45] text-white py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium transition">
                    create instructor account
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
                        <svg class="w-12 h-12 text-[#845d45]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                        </svg>
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

<!-- Manage Users Modal -->
<div id="manageUsersModal" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm" onclick="closeManageUsersModal()"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-hidden border border-[#e8d7c3] relative">
            <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">manage users</h3>
                <button onclick="closeManageUsersModal()" class="absolute top-4 right-4 text-[#845d45] hover:text-[#6e4635]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div class="p-6">
                <!-- Tab Navigation -->
                <div class="flex space-x-1 mb-6">
                    <button onclick="showUserTab('instructors')" id="instructorsTab" class="px-3 py-2 text-sm font-medium rounded-md bg-[#845d45] text-white font-quicksand">
                        instructors (<?= count($instructors ?? []) ?>)
                    </button>
                    <button onclick="showUserTab('students')" id="studentsTab" class="px-3 py-2 text-sm font-medium rounded-md text-[#845d45] hover:bg-[#e8d7c3] font-quicksand">
                        students (<?= count($students ?? []) ?>)
                    </button>
                </div>

                <!-- Instructors Tab -->
                <div id="instructorsContent" class="max-h-96 overflow-y-auto">
                    <?php if (!empty($instructors)): ?>
                    <table class="min-w-full divide-y divide-[#e8d7c3]">
                        <thead class="bg-[#f9f7f4] sticky top-0">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">specializations</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-[#e8d7c3]">
                            <?php foreach ($instructors as $instructor): ?>
                            <tr class="hover:bg-[#f9f7f4] transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand">
                                    <?= htmlspecialchars(($instructor['first_name'] ?? '') . ' ' . ($instructor['last_name'] ?? '')) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand"><?= htmlspecialchars($instructor['email'] ?? '') ?></td>
                                <td class="px-6 py-4 text-sm text-[#2b2a24] font-quicksand"><?= htmlspecialchars($instructor['specializations'] ?? 'not specified') ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 font-quicksand">
                                        <?= htmlspecialchars($instructor['status'] ?? 'active') ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button onclick="editUser(<?= $instructor['id'] ?? 0 ?>)" class="text-[#845d45] hover:text-[#6e4635] font-quicksand transition">edit</button>
                                    <button onclick="deactivateUser(<?= $instructor['id'] ?? 0 ?>)" class="text-red-600 hover:text-red-800 font-quicksand transition">deactivate</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="p-6 text-center">
                        <p class="text-[#845d45] font-quicksand">no instructors found</p>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Students Tab -->
                <div id="studentsContent" class="max-h-96 overflow-y-auto hidden">
                    <?php if (!empty($students)): ?>
                    <table class="min-w-full divide-y divide-[#e8d7c3]">
                        <thead class="bg-[#f9f7f4] sticky top-0">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">fitness level</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">bookings</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-[#845d45] uppercase tracking-wider font-quicksand">actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-[#e8d7c3]">
                            <?php foreach ($students as $student): ?>
                            <tr class="hover:bg-[#f9f7f4] transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand">
                                    <?= htmlspecialchars(($student['first_name'] ?? '') . ' ' . ($student['last_name'] ?? '')) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand"><?= htmlspecialchars($student['email'] ?? '') ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand"><?= htmlspecialchars($student['fitness_level'] ?? 'beginner') ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#2b2a24] font-quicksand"><?= $student['total_bookings'] ?? 0 ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button onclick="editUser(<?= $student['id'] ?? 0 ?>)" class="text-[#845d45] hover:text-[#6e4635] font-quicksand transition">edit</button>
                                    <button onclick="deactivateUser(<?= $student['id'] ?? 0 ?>)" class="text-red-600 hover:text-red-800 font-quicksand transition">deactivate</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="p-6 text-center">
                        <p class="text-[#845d45] font-quicksand">no students found</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Modal functions
function openCreateInstructorModal() {
    document.getElementById('createInstructorModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeCreateInstructorModal() {
    document.getElementById('createInstructorModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    document.getElementById('createInstructorForm').reset();
    hideInstructorMessage();
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

function openManageUsersModal() {
    document.getElementById('manageUsersModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeManageUsersModal() {
    document.getElementById('manageUsersModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function showUserTab(tab) {
    // Hide all content
    document.getElementById('instructorsContent').classList.add('hidden');
    document.getElementById('studentsContent').classList.add('hidden');
    
    // Reset tab styles
    document.getElementById('instructorsTab').className = 'px-3 py-2 text-sm font-medium rounded-md text-[#845d45] hover:bg-[#e8d7c3] font-quicksand';
    document.getElementById('studentsTab').className = 'px-3 py-2 text-sm font-medium rounded-md text-[#845d45] hover:bg-[#e8d7c3] font-quicksand';
    
    // Show selected content and update tab
    if (tab === 'instructors') {
        document.getElementById('instructorsContent').classList.remove('hidden');
        document.getElementById('instructorsTab').className = 'px-3 py-2 text-sm font-medium rounded-md bg-[#845d45] text-white font-quicksand';
    } else {
        document.getElementById('studentsContent').classList.remove('hidden');
        document.getElementById('studentsTab').className = 'px-3 py-2 text-sm font-medium rounded-md bg-[#845d45] text-white font-quicksand';
    }
}

// Message functions
function showInstructorMessage(message, isError = false) {
    const messageDiv = document.getElementById('instructorMessage');
    messageDiv.textContent = message;
    messageDiv.className = `mx-6 mt-4 p-3 rounded-md font-quicksand ${isError ? 'bg-red-100 text-red-700 border border-red-300' : 'bg-green-100 text-green-700 border border-green-300'}`;
    messageDiv.classList.remove('hidden');
}

function hideInstructorMessage() {
    document.getElementById('instructorMessage').classList.add('hidden');
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

// Form submissions
document.addEventListener('DOMContentLoaded', function() {
    // Create Instructor Form
    const createInstructorForm = document.getElementById('createInstructorForm');
    if (createInstructorForm) {
        createInstructorForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            formData.append('role', 'instructor');
            
            try {
                const response = await fetch('/admin/create-instructor', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    showInstructorMessage('instructor account created successfully!', false);
                    setTimeout(() => {
                        closeCreateInstructorModal();
                        location.reload();
                    }, 2000);
                } else {
                    showInstructorMessage(result.message || 'failed to create instructor account', true);
                }
            } catch (error) {
                console.error('Error creating instructor:', error);
                showInstructorMessage('an error occurred. please try again.', true);
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
                const response = await fetch('/admin/upload-profile-image', {
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
                console.error('Error uploading image:', error);
                showUploadMessage('an error occurred. please try again.', true);
            }
        });
    }
});

// Action functions
async function cancelBooking(bookingId) {
    if (!bookingId || !confirm('are you sure you want to cancel this booking?')) {
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
            location.reload();
        } else {
            alert('failed to cancel booking: ' + (result.message || 'unknown error'));
        }
    } catch (error) {
        console.error('Error cancelling booking:', error);
        alert('an error occurred while cancelling the booking');
    }
}

async function editUser(userId) {
    // This would open an edit user modal - implement as needed
    alert('edit user functionality coming soon');
}

async function deactivateUser(userId) {
    if (!userId || !confirm('are you sure you want to deactivate this user?')) {
        return;
    }
    
    try {
        const response = await fetch('/admin/deactivate-user', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ user_id: userId })
        });
        
        const result = await response.json();
        
        if (result.success) {
            location.reload();
        } else {
            alert('failed to deactivate user: ' + (result.message || 'unknown error'));
        }
    } catch (error) {
        console.error('Error deactivating user:', error);
        alert('an error occurred while deactivating the user');
    }
}

// Close modals on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeCreateInstructorModal();
        closeUploadProfileModal();
        closeManageUsersModal();
    }
});

// Prevent modal close when clicking inside modal content
document.addEventListener('DOMContentLoaded', function() {
    // Prevent modal close when clicking modal content
    const modals = ['createInstructorModal', 'uploadProfileModal', 'manageUsersModal'];
    
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