<?php include base_path('views/partials/header.php'); ?>

<div class="min-h-screen bg-[#f2e9dc] py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 mt-20">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-[#2b2a24] font-quicksand">admin dashboard</h1>
                    <p class="mt-2 text-[#845d45] font-quicksand">manage your flow haven studios</p>
                </div>
                <a href="/admin/logout" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 font-quicksand font-medium transition">
                    logout
                </a>
            </div>
        </div>

        <!-- Welcome Card -->
        <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3] mb-8">
            <div class="px-6 py-8 text-center">
                <svg class="w-16 h-16 text-[#845d45] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h2 class="text-2xl font-bold text-[#2b2a24] font-quicksand mb-2">welcome to admin dashboard</h2>
                <p class="text-[#845d45] font-quicksand">you have successfully accessed the admin area</p>
                <p class="text-sm text-[#845d45] font-quicksand mt-2">
                    logged in at: <?= date('F j, Y g:i A', $data['login_time']) ?>
                </p>
            </div>
        </div>

        <!-- Quick Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white overflow-hidden shadow-md rounded-lg border border-[#e8d7c3]">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-[#845d45] rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">system status</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand">operational</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-md rounded-lg border border-[#e8d7c3]">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-[#845d45] rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">website</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand">online</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-md rounded-lg border border-[#e8d7c3]">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-[#845d45] rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">current time</dt>
                                <dd class="text-sm font-semibold text-[#2b2a24] font-quicksand"><?= date('g:i A') ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-md rounded-lg border border-[#e8d7c3]">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-[#845d45] rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-[#845d45] truncate font-quicksand">admin access</dt>
                                <dd class="text-lg font-semibold text-[#2b2a24] font-quicksand">granted</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3] p-6">
                <div class="text-center">
                    <svg class="w-12 h-12 text-[#845d45] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand mb-2">content management</h3>
                    <p class="text-sm text-[#845d45] font-quicksand mb-4">manage website content, pages, and information</p>
                    <button onclick="alert('Add your custom functionality here')" class="bg-[#845d45] text-white px-4 py-2 rounded-md hover:bg-[#6e4635] font-quicksand font-medium transition w-full">
                        manage content
                    </button>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3] p-6">
                <div class="text-center">
                    <svg class="w-12 h-12 text-[#845d45] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand mb-2">instructor profiles</h3>
                    <p class="text-sm text-[#845d45] font-quicksand mb-4">manage instructor information and profiles</p>
                    <button onclick="alert('Add your custom functionality here')" class="bg-[#845d45] text-white px-4 py-2 rounded-md hover:bg-[#6e4635] font-quicksand font-medium transition w-full">
                        manage instructors
                    </button>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3] p-6">
                <div class="text-center">
                    <svg class="w-12 h-12 text-[#845d45] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand mb-2">site settings</h3>
                    <p class="text-sm text-[#845d45] font-quicksand mb-4">configure website settings and preferences</p>
                    <button onclick="alert('Add your custom functionality here')" class="bg-[#845d45] text-white px-4 py-2 rounded-md hover:bg-[#6e4635] font-quicksand font-medium transition w-full">
                        site settings
                    </button>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white shadow-md rounded-lg border border-[#e8d7c3]">
            <div class="px-6 py-4 border-b border-[#e8d7c3] bg-[#f9f7f4]">
                <h3 class="text-lg font-medium text-[#2b2a24] font-quicksand">recent activity</h3>
            </div>
            <div class="p-6">
                <div class="text-center py-8">
                    <svg class="w-12 h-12 text-[#845d45] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <h4 class="text-lg font-medium text-[#2b2a24] font-quicksand mb-2">admin dashboard</h4>
                    <p class="text-[#845d45] font-quicksand">this is your custom admin dashboard</p>
                    <p class="text-sm text-[#845d45] font-quicksand mt-2">you can customize this area to add your own functionality</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Add any custom dashboard JavaScript here
document.addEventListener('DOMContentLoaded', function() {
    console.log('Admin dashboard loaded');
});
</script>

<?php include base_path('views/partials/footer.php'); ?>