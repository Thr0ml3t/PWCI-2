<?php
require 'views/partials/head.php';

require 'views/partials/page_title.php';
?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">
       <div id="pokemon-list">
        <?php if ($msg): ?>
            <div class="mb-4 p-4 bg-red-600 rounded-lg">
                <?php echo htmlspecialchars($msg); ?>
            </div>
        <?php endif; ?>
        <?php foreach ($pokemonList as $pokemon): ?>
            <div class="p-4 mb-4 bg-gray-700 rounded-lg">
                <h2 class="text-xl font-semibold mb-2"><?php echo htmlspecialchars($pokemon['name']); ?></h2>
                <img src="<?php echo htmlspecialchars($pokemon['image']); ?>" alt="<?php echo htmlspecialchars($pokemon['name']); ?>" class="mb-2" />
                <p>Height: <?php echo htmlspecialchars($pokemon['height']); ?></p>
                <p>Weight: <?php echo htmlspecialchars($pokemon['weight']); ?></p>
                <p>Types: <?php echo htmlspecialchars(implode(', ', $pokemon['types'])); ?></p>
            </div>
        <?php endforeach; ?>
       </div>
    </div>
  </main>
  

  <?php
    require 'views/partials/footer.php';
    ?>