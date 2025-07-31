<footer class="bg-[#e8d7c3] py-0">
  <div class="mx-auto max-w-7xl px-6 pt-8 pb-8 sm:pt-12 lg:px-8 lg:pt-16">
    <div class="flex flex-col items-center space-y-6 text-center">
      <img src="/assets/images/flowHavenTransparent.png" alt="FlowHaven Studios" class="h-12" />
      <p class="text-base text-[#845d45] max-w-md font-quicksand">
        boutique reformer pilates studio in bethnal green. find your flow.
      </p>
      <div class="flex space-x-6">
        <a href="https://www.instagram.com/flowhavenstudios?igsh=Z3k2djhwazl0NXRl&utm_source=qr" target="_blank" class="text-[#845d45] hover:text-white" aria-label="Instagram">
          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5Zm8.75 2.25a.75.75 0 0 1 .75.75v1a.75.75 0 0 1-1.5 0v-1a.75.75 0 0 1 .75-.75Zm-4 1.25a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11Zm0 1.5a4 4 0 1 0 0 8a4 4 0 0 0 0-8Z" />
          </svg>
        </a>
        <a href="https://www.tiktok.com/@flowhavenstudios?_t=ZN-8yKnbkG5uYY&_r=1" target="_blank" class="text-[#845d45] hover:text-white" aria-label="TikTok">
          <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 48 48" aria-hidden="true">
            <path d="M41.4 15.1c-3.1 0-5.7-1.2-7.8-3V32c0 6.7-5.5 12.2-12.2 12.2S9.2 38.7 9.2 32s5.5-12.2 12.2-12.2c.9 0 1.7.1 2.5.3V26c-.8-.3-1.6-.5-2.5-.5-3.3 0-6 2.7-6 6s2.7 6 6 6 6-2.7 6-6V4h6c.1 2.9 2.6 5.2 5.5 5.2v5.9z"/>
          </svg>
        </a>
      </div>
      <a href="/termsandconditions" class="text-base font-quicksand transition-colors duration-200 <?= $activePage === 'tandc' ? 'text-white' : 'text-[#845d45] hover:text-white' ?>">terms and conditions</a>
    </div>
    <div class=" border-t border-white/10 pt-6 text-center">
      <p class="font-quicksand text-sm text-[#845d45]">&copy; <?= date('Y') ?> flowhaven studios. all rights reserved.</p>
    </div>
  </div>
</footer>
    <?php include 'scripts.php'; ?>
</body>
</html>