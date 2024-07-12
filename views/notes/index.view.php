<?php load_view("partials/head.php") ?>
<?php load_view("partials/nav.php") ?>
<?php load_view("partials/banner.php") ?>

<header>
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-white"><?= $heading ?></h1>
    </div>
</header>

<main class="px-4 sm:px-6 lg:px-8">
  <ul class="list-disc list-inside">
    <?php foreach ($notes as $note) : ?>
      <li>
        <a class="text-blue-500 text-lg hover:underline" href="/note?id=<?= $note['id'] ?>">
          <?= htmlspecialchars($note['title']) ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</main>

<div>
  <a href="/notes/create" class="px-4 sm:px-6 lg:px-8 text-xl text-blue-400 underline" > Create Note </div>
</div>

<?php load_view("partials/tail.php") ?>
