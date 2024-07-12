<?php load_view("partials/head.php") ?>
<?php load_view("partials/nav.php") ?>
<?php load_view("partials/banner.php") ?>

<p class="my-4 px-4 sm:px-6 lg:px-8">
  <a href="/notes" class="text-blue-500 underline">go back...</a>
</p>

<header>
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-white"><?= $heading ?></h1>
    </div>
</header>

<main class="px-4 sm:px-6 lg:px-8">
  <form action="/note" method='POST'>
    <!-- hidden inputs -->
    <input type="text" name="_method" value="PATCH" hidden >
    <input type="text" name="id" value="<?= $note['id'] ?>" hidden >

    <div class="space-y-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

          <div class="sm:col-span-4">
            <label for="title" class="block my-2 text-xl font-medium leading-6">Title</label>
            <input type="text" name="title" id="title" class="w-full border rounded border-white flex-1 bg-transparent py-1.5 pl-1 focus:ring-0 text-lg leading-6" value="<?= $note['title'] ?>">
              <?php if (isset($errors['title'])) :  ?>
                <p class="text-sm text-red-300" >
                  <?= $errors['title']; ?>
                </p>
              <?php endif; ?>
          </div>
  
          <div class="col-span-full">
            <label for="body" class="block my-1 text-xl font-medium leading-6">Body</label>
            <textarea id="body" name="body" rows="3" class="w-full border rounded border-white flex-1 bg-transparent py-1.5 pl-1 focus:ring-0 text-lg leading-6"><?= $note['body'] ?></textarea>
            <p class="mt-3 text-sm leading-6 text-gray-200">Write a few sentences about your thought.</p>
          </div>
  
          <div class="mt-6 flex gap-x-6">
            <a href="/note?id=<?= $note['id'] ?>" class="text-lg font-semibold leading-6">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
          </div>
        </div>
    </div>
  </form>
</main>

<?php load_view("partials/tail.php") ?>
