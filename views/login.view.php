
<?php include 'partials/header.php'; ?>
<div class="flex min-h-screen flex-col justify-center bg-white px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-3xl font-bold tracking-tight text-[#2b2a24]">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="#" method="POST" class="space-y-6">
      <div>
        <label for="email" class="block text-sm font-medium text-[#2b2a24]">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required
            class="block w-full rounded-md bg-white px-3 py-2 text-[#2b2a24] border border-[#e0d8c8] placeholder:text-gray-400 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-[#845d45]">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium text-[#2b2a24]">Password</label>
          <div class="text-sm">
            <a href="#" class="font-medium text-[#845d45] hover:underline">Forgot password?</a>
          </div>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required
            class="block w-full rounded-md bg-white px-3 py-2 text-[#2b2a24] border border-[#e0d8c8] placeholder:text-gray-400 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-[#845d45]">
        </div>
      </div>

      <div>
        <button type="submit"
          class="flex w-full justify-center rounded-md bg-[#845d45] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#6e4b36] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#fed783]">
          Sign in
        </button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-600">
      Not a member?
      <a href="#" class="font-medium text-[#845d45] hover:underline">Create an account</a>
    </p>
  </div>
</div>

<?php include 'partials/footer.php'; ?>