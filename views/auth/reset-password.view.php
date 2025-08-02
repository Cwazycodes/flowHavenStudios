<?php
?>

<?php include base_path('views/partials/header.php'); ?>

<div class="min-h-screen bg-[#f2e9dc] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <img src="/assets/images/flowHavenTransparent.png" alt="flow haven studios" class="mx-auto h-16 w-auto">
            <h2 class="mt-6 text-3xl font-semibold text-[#2b2a24] font-quicksand">reset your password</h2>
            <p class="mt-2 text-sm text-gray-600 font-quicksand">
                enter your new password below
            </p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-8">
            <!-- Success/Error Messages -->
            <div id="resetMessage" class="hidden mb-4 p-3 rounded-md font-quicksand"></div>

            <form id="resetPasswordForm" class="space-y-6">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 font-quicksand">new password</label>
                    <input type="password" id="password" name="password" required minlength="6"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>

                <div>
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-700 font-quicksand">confirm new password</label>
                    <input type="password" id="confirmPassword" name="confirm_password" required minlength="6"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                </div>

                <div>
                    <button type="submit" 
                            class="w-full bg-[#845d45] text-white py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium">
                        update password
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="/" class="text-sm text-[#845d45] hover:text-[#6e4635] font-quicksand">
                    back to home
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function showResetMessage(message, isError = false) {
    const messageDiv = document.getElementById('resetMessage');
    messageDiv.textContent = message;
    messageDiv.className = `mb-4 p-3 rounded-md font-quicksand ${isError ? 'bg-red-100 text-red-700 border border-red-300' : 'bg-green-100 text-green-700 border border-green-300'}`;
    messageDiv.classList.remove('hidden');
}

function hideResetMessage() {
    const messageDiv = document.getElementById('resetMessage');
    messageDiv.classList.add('hidden');
}

document.getElementById('resetPasswordForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    if (password !== confirmPassword) {
        showResetMessage('passwords do not match.', true);
        return;
    }
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('/auth/reset-password', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            showResetMessage('password updated successfully! redirecting to home...', false);
            setTimeout(() => {
                window.location.href = '/';
            }, 2000);
        } else {
            showResetMessage(result.message || 'failed to update password. please try again.', true);
        }
    } catch (error) {
        showResetMessage('an error occurred. please try again.', true);
    }
});
</script>

<?php include base_path('views/partials/footer.php'); ?>