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
                <!-- Quick Schedule -->
                <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
                    <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                        <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">quick schedule</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <button onclick="quickSchedule('tomorrow_morning')" class="w-full text-left p-3 rounded-md border border-[#e8d7c3] hover:bg-[#f9f7f4] transition font-quicksand">
                                <div class="text-sm font-medium text-[#2b2a24]">tomorrow morning</div>