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
  <?= $content ?>
</main>
    

<div class="px-4 sm:px-6 lg:px-8 mt-10">
  <form method="POST">
    <input type="text" name="_method" value="DELETE" hidden >
    <input type="text" name="noteId" value="<?= $noteId ?>" hidden >
    <button type="submit" class="text-lg text-red-500 rounded pe-4 py-2">Delete</button>
    <!-- edit note -->
    <a href="/note/edit?id=<?= $noteId ?>" class="text-lg semibold text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white transition-colors duration-150 ease-linear rounded px-4 py-2">Edit</a>
  </form>
</div>

<?php load_view("partials/tail.php") ?>
