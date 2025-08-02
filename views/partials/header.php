<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow Haven Studios</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/jpeg" href="/assets/images/favicon.jpeg">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="bg-gray-900">
<header id="main-navbar" class="fixed inset-x-0 top-0 z-50 transition-colors duration-300">
    <nav aria-label="Global" class="flex items-center justify-between p-6 lg:px-8">
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5">
          <span class="sr-only">Flow Haven Studios</span>
          <img src="/assets/images/flowHavenTransparent.png" alt="" class="h-8 w-auto" />
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" onclick="toggleMobileMenu()" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
          <span class="sr-only">Open main menu</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <a href="/" class="text-base font-quicksand transition-colors duration-200 <?= ($activePage ?? '') === 'home' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">home</a>
        <a href="/book" class="text-base font-quicksand transition-colors duration-200 <?= ($activePage ?? '') === 'book' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">book</a>
        <a href="/instructors" class="text-base font-quicksand transition-colors duration-200 <?= ($activePage ?? '') === 'instructors' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">instructors</a>
        <a href="/faq" class="text-base font-quicksand transition-colors duration-200 <?= ($activePage ?? '') === 'faq' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">faq</a>
      </div>
      
      <!-- Authentication Section -->
      <?php if (!isAuthenticated()): ?>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="#" onclick="openLoginModal()" class="text-base font-quicksand transition-colors duration-200 text-[#845d45] hover:text-white">
          log in <span aria-hidden="true">&rarr;</span>
        </a>
      </div>
      <?php else: ?>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end space-x-4">
        <span class="text-base font-quicksand text-[#845d45]">
          welcome, <?= strtolower(auth()['first_name']) ?>
        </span>
        <a href="/auth/logout" class="text-base font-quicksand text-[#845d45] hover:text-white">log out</a>
        <?php if (isAdmin()): ?>
          <a href="/admin/dashboard" class="text-base font-quicksand text-[#845d45] hover:text-white <?= ($activePage ?? '') === 'dashboard' ? 'text-white' : '' ?>">dashboard</a>
        <?php elseif (isInstructor()): ?>
          <a href="/instructor/dashboard" class="text-base font-quicksand text-[#845d45] hover:text-white <?= ($activePage ?? '') === 'dashboard' ? 'text-white' : '' ?>">dashboard</a>
        <?php elseif (isStudent()): ?>
          <a href="/student/dashboard" class="text-base font-quicksand text-[#845d45] hover:text-white <?= ($activePage ?? '') === 'dashboard' ? 'text-white' : '' ?>">dashboard</a>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </nav>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="lg:hidden hidden fixed inset-0 z-50 bg-[#e8d7c3]">
  <div class="absolute right-0 top-0 h-full w-full p-6">
    <div class="flex items-center justify-between">
      <a href="/" class="-m-1.5 p-1.5">
        <span class="sr-only">FlowHaven</span>
        <img src="/assets/images/flowHavenTransparent.png" alt="FlowHaven" class="h-8 w-auto" />
      </a>
      <button type="button" onclick="toggleMobileMenu()" class="rounded-md p-2.5 text-gray-400">
        <span class="sr-only">Close menu</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-6 w-6">
          <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>

    <div class="mt-6 space-y-4">
      <a href="/" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">home</a>
      <a href="/book" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">book</a>
      <a href="/instructors" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">instructors</a>
      <a href="/faq" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">faq</a>
      
      <?php if (!isAuthenticated()): ?>
        <a href="#" onclick="openLoginModal(); toggleMobileMenu();" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">log in</a>
      <?php else: ?>
        <div class="px-4 py-2 text-base font-quicksand text-white">welcome, <?= strtolower(auth()['first_name']) ?></div>
        <a href="/auth/logout" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">log out</a>
        <?php if (isAdmin()): ?>
          <a href="/admin/dashboard" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">admin dashboard</a>
        <?php elseif (isInstructor()): ?>
          <a href="/instructor/dashboard" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">instructor dashboard</a>
        <?php elseif (isStudent()): ?>
          <a href="/student/dashboard" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">student dashboard</a>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Login/Register Modal -->
<?php if (!isAuthenticated()): ?>
<div id="authModal" class="fixed inset-0 z-[60] hidden">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop" onclick="closeAuthModal()"></div>
    
    <!-- Modal Content -->
    <div class="fixed inset-0 flex items-start justify-center p-4 overflow-y-auto">
        <div class="bg-[#f2e9dc] rounded-lg shadow-xl max-w-md w-full my-8 mx-auto min-h-fit max-h-[calc(100vh-4rem)]">
            <!-- Modal Header -->
            <div class="sticky top-0 bg-[#e8d7c3] flex justify-between items-center p-6 border-b rounded-t-lg z-10">
                <h2 id="modalTitle" class="text-2xl font-semibold text-[#2b2a24] font-quicksand">sign in</h2>
                <button onclick="closeAuthModal()" class="text-gray-400 hover:text-gray-600 p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 overflow-y-auto max-h-[calc(100vh-12rem)]">
                <!-- Error/Success Messages -->
                <div id="authMessage" class="hidden mb-4 p-3 rounded-md"></div>

                <!-- Login Form -->
                <form id="loginForm" class="space-y-4">
                    <div>
                        <label for="loginEmail" class="block text-sm font-medium text-gray-700 font-quicksand">email</label>
                        <input type="email" id="loginEmail" name="email" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                    <div>
                        <label for="loginPassword" class="block text-sm font-medium text-gray-700 font-quicksand">password</label>
                        <input type="password" id="loginPassword" name="password" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="button" onclick="showForgotPassword()" class="text-sm text-[#845d45] hover:text-[#6e4635] font-quicksand">
                            forgot password?
                        </button>
                    </div>
                    <button type="submit" 
                            class="w-full bg-[#845d45] text-white py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium">
                        sign in
                    </button>
                </form>

                <!-- Forgot Password Form -->
                <form id="forgotPasswordForm" class="space-y-4 hidden">
                    <div>
                        <label for="forgotEmail" class="block text-sm font-medium text-gray-700 font-quicksand">email address</label>
                        <input type="email" id="forgotEmail" name="email" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                        <p class="mt-2 text-sm text-gray-600 font-quicksand">
                            enter your email address and we'll send you a link to reset your password.
                        </p>
                    </div>
                    <button type="submit" 
                            class="w-full bg-[#845d45] text-white py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium">
                        send reset link
                    </button>
                    <button type="button" onclick="showLogin()" class="w-full text-[#845d45] hover:text-[#6e4635] font-quicksand text-sm">
                        back to sign in
                    </button>
                </form>

                <!-- Register Form -->
                <form id="registerForm" class="space-y-4 hidden">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="registerFirstName" class="block text-sm font-medium text-gray-700 font-quicksand">first name</label>
                            <input type="text" id="registerFirstName" name="first_name" required 
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                        </div>
                        <div>
                            <label for="registerLastName" class="block text-sm font-medium text-gray-700 font-quicksand">last name</label>
                            <input type="text" id="registerLastName" name="last_name" required 
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                        </div>
                    </div>
                    <div>
                        <label for="registerEmail" class="block text-sm font-medium text-gray-700 font-quicksand">email</label>
                        <input type="email" id="registerEmail" name="email" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                    <div>
                        <label for="registerPhone" class="block text-sm font-medium text-gray-700 font-quicksand">phone (optional)</label>
                        <input type="tel" id="registerPhone" name="phone" 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                    <div>
                        <label for="registerPassword" class="block text-sm font-medium text-gray-700 font-quicksand">password</label>
                        <input type="password" id="registerPassword" name="password" required minlength="6"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                    <div>
                        <label for="confirmPassword" class="block text-sm font-medium text-gray-700 font-quicksand">confirm password</label>
                        <input type="password" id="confirmPassword" name="confirm_password" required minlength="6"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                    </div>
                    
                    <!-- Student-specific fields -->
                    <div id="studentFields" class="space-y-4">
                        <div>
                            <label for="preferredLocation" class="block text-sm font-medium text-gray-700 font-quicksand">preferred location</label>
                            <select id="preferredLocation" name="location_id" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                                <option value="">select a location...</option>
                            </select>
                        </div>
                        <div>
                            <label for="fitnessLevel" class="block text-sm font-medium text-gray-700 font-quicksand">fitness level</label>
                            <select id="fitnessLevel" name="fitness_level" 
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                                <option value="beginner">beginner</option>
                                <option value="intermediate">intermediate</option>
                                <option value="advanced">advanced</option>
                            </select>
                        </div>
                        <div>
                            <label for="emergencyContact" class="block text-sm font-medium text-gray-700 font-quicksand">emergency contact name</label>
                            <input type="text" id="emergencyContact" name="emergency_contact_name" 
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                        </div>
                        <div>
                            <label for="emergencyPhone" class="block text-sm font-medium text-gray-700 font-quicksand">emergency contact phone</label>
                            <input type="tel" id="emergencyPhone" name="emergency_contact_phone" 
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand">
                        </div>
                        <div>
                            <label for="medicalConditions" class="block text-sm font-medium text-gray-700 font-quicksand">medical conditions/notes (optional)</label>
                            <textarea id="medicalConditions" name="medical_conditions" rows="3"
                                      class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand"></textarea>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="marketingConsent" name="marketing_consent" 
                                   class="h-4 w-4 text-[#845d45] focus:ring-[#845d45] border-gray-300 rounded">
                            <label for="marketingConsent" class="ml-2 block text-sm text-gray-700 font-quicksand">
                                i would like to receive updates and promotional emails
                            </label>
                        </div>
                    </div>

                    <button type="submit" 
                            class="w-full bg-[#845d45] text-white py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium">
                        create account
                    </button>
                </form>

                <!-- Toggle between forms -->
                <div class="mt-6 text-center">
                    <p id="toggleText" class="text-sm text-gray-600 font-quicksand">
                        don't have an account? 
                        <button onclick="toggleForm()" class="text-[#845d45] hover:text-[#6e4635] font-medium">sign up</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<style>
  .font-quicksand {
    font-family: 'Quicksand', sans-serif;
  }
  .modal-backdrop {
    backdrop-filter: blur(8px);
  }
</style>