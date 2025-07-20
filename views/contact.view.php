
<?php include 'partials/header.php'; ?>
<section class="relative isolate bg-[#fefaf1] px-6 py-24 sm:py-32 lg:px-8">
  <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
    <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-1/2 -z-10 aspect-[1155/678] w-[72.5rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#fed783] to-[#845d45] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[90rem]"></div>
  </div>
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-4xl font-bold tracking-tight text-[#2b2a24] sm:text-5xl">Contact Sales</h2>
    <p class="mt-2 text-lg text-[#845d45]">Have questions or want to collaborate with FlowHaven? Let’s talk.</p>
  </div>
  <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      <div>
        <label for="first-name" class="block text-sm font-semibold text-[#2b2a24]">First name</label>
        <input id="first-name" name="first-name" type="text" autocomplete="given-name" class="mt-2.5 block w-full rounded-md border border-[#e0d8c8] bg-white px-3.5 py-2 text-[#2b2a24] placeholder:text-[#b2a792] focus:outline-[#845d45] focus:ring-2 focus:ring-offset-2" />
      </div>
      <div>
        <label for="last-name" class="block text-sm font-semibold text-[#2b2a24]">Last name</label>
        <input id="last-name" name="last-name" type="text" autocomplete="family-name" class="mt-2.5 block w-full rounded-md border border-[#e0d8c8] bg-white px-3.5 py-2 text-[#2b2a24] placeholder:text-[#b2a792] focus:outline-[#845d45] focus:ring-2 focus:ring-offset-2" />
      </div>
      <div class="sm:col-span-2">
        <label for="email" class="block text-sm font-semibold text-[#2b2a24]">Email</label>
        <input id="email" name="email" type="email" autocomplete="email" class="mt-2.5 block w-full rounded-md border border-[#e0d8c8] bg-white px-3.5 py-2 text-[#2b2a24] placeholder:text-[#b2a792] focus:outline-[#845d45] focus:ring-2 focus:ring-offset-2" />
      </div>
      <div class="sm:col-span-2">
        <label for="phone-number" class="block text-sm font-semibold text-[#2b2a24]">Phone number</label>
        <input id="phone-number" name="phone-number" type="text" autocomplete="tel" class="mt-2.5 block w-full rounded-md border border-[#e0d8c8] bg-white px-3.5 py-2 text-[#2b2a24] placeholder:text-[#b2a792] focus:outline-[#845d45] focus:ring-2 focus:ring-offset-2" />
      </div>
      <div class="sm:col-span-2">
        <label for="message" class="block text-sm font-semibold text-[#2b2a24]">Message</label>
        <textarea id="message" name="message" rows="4" class="mt-2.5 block w-full rounded-md border border-[#e0d8c8] bg-white px-3.5 py-2 text-[#2b2a24] placeholder:text-[#b2a792] focus:outline-[#845d45] focus:ring-2 focus:ring-offset-2"></textarea>
      </div>
      <div class="flex gap-x-4 sm:col-span-2">
      <input type="checkbox" class="h-5 w-5 rounded border-[#e0d8c8] text-[#845d45] focus:ring-[#845d45]" />
        <label for="agree-to-policies" class="text-sm text-[#2b2a24]">I agree to the <a href="#" class="font-semibold text-[#845d45] hover:underline">privacy policy</a>.</label>
      </div>
    </div>
    <div class="mt-10">
      <button type="submit" class="block w-full rounded-md bg-[#845d45] px-3.5 py-2.5 text-center text-sm font-semibold text-[white] shadow-sm hover:bg-[#6c4637] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#845d45]">Let's talk</button>
    </div>
  </form>
</section>

<?php include 'partials/footer.php'; ?>