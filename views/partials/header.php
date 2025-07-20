<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="bg-gray-900">
<header id="main-navbar" class="fixed inset-x-0 top-0 z-50 transition-colors duration-300">
    <nav aria-label="Global" class="flex items-center justify-between p-6 lg:px-8">
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>

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
      <a href="/" class="text-sm font-semibold transition-colors duration-200 <?= $activePage === 'home' ? 'text-[#fed783]' : 'text-[#845d45] hover:text-[#fed783]' ?>">Home</a>
      <a href="/about" class="text-sm font-semibold transition-colors duration-200 <?= $activePage === 'about' ? 'text-[#fed783]' : 'text-[#845d45] hover:text-[#fed783]' ?>">About</a>
      <a href="/classes" class="text-sm font-semibold transition-colors duration-200 <?= $activePage === 'classes' ? 'text-[#fed783]' : 'text-[#845d45] hover:text-[#fed783]' ?>">Classes</a>
      <a href="/pricing" class="text-sm font-semibold transition-colors duration-200 <?= $activePage === 'pricing' ? 'text-[#fed783]' : 'text-[#845d45] hover:text-[#fed783]' ?>">Pricing</a>
      <a href="/contact" class="text-sm font-semibold transition-colors duration-200 <?= $activePage === 'contact' ? 'text-[#fed783]' : 'text-[#845d45] hover:text-[#fed783]' ?>">Contact</a>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="/login" class="text-sm font-semibold transition-colors duration-200 <?= $activePage === 'login' ? 'text-[#fed783]' : 'text-[#845d45] hover:text-[#fed783]' ?>">Log in</a>
      </div>
    </nav>
    
    
</header>
<!-- Mobile menu -->
<div id="mobile-menu" class="lg:hidden hidden fixed inset-0 z-50 bg-[#2b2a24]">
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
      <a href="/" class="block rounded-lg px-4 py-2 text-base font-semibold text-[#fed783] hover:text-[#845d45]">Home</a>
      <a href="/about" class="block rounded-lg px-4 py-2 text-base font-semibold text-[#fed783] hover:text-[#845d45]">About</a>
      <a href="/classes" class="block rounded-lg px-4 py-2 text-base font-semibold text-[#fed783] hover:text-[#845d45]">Classes</a>
      <a href="/pricing" class="block rounded-lg px-4 py-2 text-base font-semibold text-[#fed783] hover:text-[#845d45]">Pricing</a>
      <a href="/contact" class="block rounded-lg px-4 py-2 text-base font-semibold text-[#fed783] hover:text-[#845d45]">Contact</a>
      <a href="/login" class="block rounded-lg px-4 py-2 mt-4 text-base font-semibold text-[#fed783] hover:text-[#845d45]">Log in</a>
    </div>
  </div>
</div>