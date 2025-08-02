

<?php include base_path('views/partials/header.php'); ?>

<div class="min-h-screen bg-[#f2e9dc] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <img src="/assets/images/flowHavenTransparent.png" alt="flow haven studios" class="mx-auto h-16 w-auto">
            <h2 class="mt-6 text-3xl font-semibold text-[#2b2a24] font-quicksand">invalid reset link</h2>
            <p class="mt-2 text-sm text-gray-600 font-quicksand">
                this password reset link is invalid or has expired
            </p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <div class="mb-6">
                <svg class="mx-auto h-12 w-12 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m3 6v3m0 0v3m0-3h3m-3 0H9m12-9v3m0 0v3m0-3h3m-3 0h-3m3 6v3m0 0v3m0-3h3m-3 0h-3" />
                </svg>
            </div>
            
            <h3 class="text-lg font-medium text-gray-900 font-quicksand mb-2">link expired or invalid</h3>
            <p class="text-sm text-gray-600 font-quicksand mb-6">
                password reset links expire after 1 hour for security reasons. if you need to reset your password, please request a new link.
            </p>

            <div class="space-y-3">
                <button onclick="openLoginModal()" class="w-full bg-[#845d45] text-white py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium">
                    request new reset link
                </button>
                
                <a href="/" class="block w-full text-center text-sm text-[#845d45] hover:text-[#6e4635] font-quicksand">
                    back to home
                </a>
            </div>
        </div>
    </div>
</div>

<?php include base_path('views/partials/footer.php'); ?>