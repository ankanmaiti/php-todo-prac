<?php load_view("partials/head.php") ?>
<?php load_view("partials/nav.php") ?>


<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight ">Register to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/register" method="POST">
      <div>
        <label for="name" class="block text-sm font-medium leading-6">Full Name</label>
        <div class="mt-2">
          <input id="name" name="name" type="name" autocomplete="full-name" required class="w-full border rounded border-white flex-1 bg-transparent py-1.5 pl-1 focus:ring-0 text-lg leading-6">
          <!-- error -->
          <?php if (isset($errors['name'])) :  ?>
            <p class="text-sm text-red-300" ><?= $errors['name']; ?></p>
          <?php endif; ?>
        </div>
      </div>

      <div>
        <label for="email" class="block text-sm font-medium leading-6">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="w-full border rounded border-white flex-1 bg-transparent py-1.5 pl-1 focus:ring-0 text-lg leading-6">
          <!-- error -->
          <?php if (isset($errors['email'])) :  ?>
            <p class="text-sm text-red-300" ><?= $errors['email']; ?></p>
          <?php endif; ?>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-60">Password</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
          </div>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="w-full border rounded border-white flex-1 bg-transparent py-1.5 pl-1 focus:ring-0 text-lg leading-6">
          <!-- error -->
          <?php if (isset($errors['password'])) :  ?>
            <p class="text-sm text-red-300" ><?= $errors['password']; ?></p>
          <?php endif; ?>
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm">
      Not a member?
      <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
    </p>
  </div>
</div>

<?php load_view("partials/tail.php") ?>
