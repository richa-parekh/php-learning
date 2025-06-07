<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="text-blue-700 underline">Go back</a>
    </div>

    <form method="POST" action="/notes" class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <label for="note" class="block mb-2 text-lg font-medium text-gray-900 text-grey-600">Your note</label>
        <textarea id="note" name="note" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"><?= $_POST['note'] ?? '' ?></textarea>
        <p class="text-red-500 text-sm mt-2"><?= $errors['note'] ?? '' ?></p>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900 cursor-pointer">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">Save</button>
        </div>
    </form>

</main>

<?php require base_path("views/partials/footer.php"); ?>