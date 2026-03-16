<?php
/**
 * @param string $title Table title
 * @param array $headers Array of header strings
 * @param array $rows Array of arrays (data rows)
 * @param string|null $footer Optional footer or pagination
 */
?>
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <?php if (isset($title)): ?>
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-bold text-slate-800"><?= $title ?></h3>
            <button class="text-sm text-indigo-600 font-medium hover:text-indigo-700">View All</button>
        </div>
    <?php endif; ?>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50">
                    <?php foreach ($headers as $header): ?>
                        <th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider"><?= $header ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach ($rows as $row): ?>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <?php foreach ($row as $cell): ?>
                            <td class="px-6 py-4 text-sm text-slate-600"><?= $cell ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if (isset($footer)): ?>
        <div class="px-6 py-4 bg-slate-50/30 border-t border-slate-100">
            <?= $footer ?>
        </div>
    <?php endif; ?>
</div>
