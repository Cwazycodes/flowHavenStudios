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
        <a href="/" class="text-base font-quicksand transition-colors duration-200 <?= $activePage === 'home' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">home</a>
        <a href="/book" class="text-base font-quicksand transition-colors duration-200 <?= $activePage === 'book' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">book</a>
        <a href="/instructors" class="text-base font-quicksand transition-colors duration-200 <?= $activePage === 'instructors' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">instructors</a>
        <a href="/faq" class="text-base font-quicksand transition-colors duration-200 <?= $activePage === 'faq' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">faq</a>
      </div>
      <?php if (!($_SESSION['admin_logged_in'] ?? false)): ?>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="/login" class="text-base font-quicksand transition-colors duration-200 <?= $activePage === 'login' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">log in <span aria-hidden="true">&rarr;</span> </a>
        <?php else: ?>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="/admin/logout" class="text-base font-quicksand text-[#845d45] hover:text-white px-3">log out</a>
        <a href="/admin/dashboard" class="text-base font-quicksand text-[#845d45] hover:text-white <?= $activePage === 'dashboard' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">dashboard</a>
      <?php endif; ?>
      </div>
    </nav>
    
    
</header>
<!-- Mobile menu -->
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

    <?php if (!($_SESSION['admin_logged_in'] ?? false)): ?>
    <div class="mt-6 space-y-4">
      <a href="/" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">home</a>
      <a href="/about" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">about</a>
      <a href="/classes" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">classes</a>
      <a href="/pricing" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">Pricing</a>
      <a href="/contact" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">contact</a>
      <a href="/login" class="block rounded-lg px-4 py-2 text-base font-quicksand text-white hover:text-[#845d45]">log in</a>
      <?php else: ?>
        <a href="/admin/logout" class="block rounded-lg px-4 py-2 mt-4 text-base font-quicksand text-white hover:text-[#845d45]">log out</a>
        <a href="/admin/dashboard" class="block rounded-lg px-4 py-2 mt-4 text-base font-quicksand text-white hover:text-[#845d45]">dashboard</a>
      <?php endif; ?>
    </div>
  </div>
</div>

<style>
  .font-quicksand {
    font-family: 'Quicksand', sans-serif;
  }
</style>