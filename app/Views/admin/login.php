<!DOCTYPE html>
<html lang="lv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pieteikšanās</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Pieteikšanās</h2>

    <form action="<?=base_url('/admin/authorize')?>" method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-600 mb-1" for="email">E-pasts</label>
        <input type="email" name="email" id="email" required
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-600 mb-1" for="password">Parole</label>
        <input type="password" name="password" id="password" required
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <button type="submit"
              class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
        Ieiet
      </button>
    </form>

     <?php if (session()->getFlashdata("error")) : ?>
      <div class="mb-4 mt-4 p-3 text-sm text-red-700 bg-red-100 border border-red-300 rounded text-center">
        <?= htmlspecialchars(session()->getFlashdata("error")) ?>
      </div>
    <?php endif; ?>

    <p class="text-sm text-gray-500 text-center mt-4">
      Vai nav konta? <a href="register.php" class="text-blue-600 hover:underline">Reģistrēties</a>
    </p>
  </div>

</body>
</html>
