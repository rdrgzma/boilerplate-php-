<?php
/**
 * @param array $cards Array of card data: ['title', 'value', 'change', 'icon', 'color']
 */
?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <?php foreach ($cards as $card): ?>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-xl bg-<?= $card['color'] ?? 'indigo' ?>-50 text-<?= $card['color'] ?? 'indigo' ?>-600">
                    <?= $card['icon'] ?>
                </div>
                <?php if (isset($card['change'])): ?>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full <?= str_contains($card['change'], '+') ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600' ?>">
                        <?= $card['change'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500"><?= $card['title'] ?></p>
                <h3 class="text-2xl font-bold text-slate-900 mt-1"><?= $card['value'] ?></h3>
            </div>
        </div>
    <?php endforeach; ?>
</div>
