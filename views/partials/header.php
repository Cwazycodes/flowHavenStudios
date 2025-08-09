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
        <a href="/book" class="text-base font-quicksand transition-colors duration-200 text-[#845d45] hover:text-white">book</a>
        <a href="/instructors" class="text-base font-quicksand transition-colors duration-200 <?= ($activePage ?? '') === 'instructors' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">instructors</a>
        <a href="/faq" class="text-base font-quicksand transition-colors duration-200 <?= ($activePage ?? '') === 'faq' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">faq</a>
      </div>
      
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="#" onclick="openPasswordModal()" class="text-base font-quicksand transition-colors duration-200 text-[#845d45] hover:text-white">
          login <span aria-hidden="true">&rarr;</span>
        </a>
      </div>
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
      <a href="#" onclick="openPasswordModal(); toggleMobileMenu();" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">admin</a>
    </div>
  </div>
</div>

<!-- Password Modal -->
<div id="passwordModal" class="fixed inset-0 z-[60] hidden">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop" onclick="closePasswordModal()"></div>
    
    <!-- Modal Content -->
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-[#f2e9dc] rounded-lg shadow-xl max-w-md w-full">
            <!-- Modal Header -->
            <div class="bg-[#e8d7c3] flex justify-between items-center p-6 border-b rounded-t-lg">
                <h2 class="text-2xl font-semibold text-[#2b2a24] font-quicksand">admin access</h2>
                <button onclick="closePasswordModal()" class="text-gray-400 hover:text-gray-600 p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <!-- Error/Success Messages -->
                <div id="passwordMessage" class="hidden mb-4 p-3 rounded-md"></div>

                <!-- Password Form -->
                <form id="passwordForm" class="space-y-4">
                    <div>
                        <label for="adminPassword" class="block text-sm font-medium text-gray-700 font-quicksand">enter admin password</label>
                        <input type="password" id="adminPassword" name="password" required 
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#845d45] focus:border-[#845d45] font-quicksand"
                               placeholder="Password">
                    </div>
                    <button type="submit" 
                            class="w-full bg-[#845d45] text-white py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium">
                        access dashboard
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
  .font-quicksand {
    font-family: 'Quicksand', sans-serif;
  }
  .modal-backdrop {
    backdrop-filter: blur(8px);
  }
</style>