<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="text-blue-700 underline">Go back</a>
        <p class="text-4xl"><?= htmlspecialchars($note['note']); ?></p>

        <footer class="mt-6 flex items-center justify-start gap-x-4">
            <a href="/notes/edit?id=<?= $note['id'] ?>" class="rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 cursor-pointer">Edit</a>

            <form method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="note_id" value="<?= $note['id'] ?>" />
                <button class="rounded-md bg-red-700 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-700 cursor-pointer">Delete</button>
            </form>
        </footer>
    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>