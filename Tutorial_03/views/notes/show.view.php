<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="text-blue-700 underline">Go back</a>
        <p class="text-4xl"><?= htmlspecialchars($note['note']); ?></p>
        <form method="POST" class="pt-5">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="note_id" value="<?= $note['id'] ?>" />
            <button class="text-red-500">Delete</button>
        </form>
    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>