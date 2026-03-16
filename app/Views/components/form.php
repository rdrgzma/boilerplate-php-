<?php
/**
 * @param string $title Form title
 * @param array $fields Array of fields: ['label', 'type', 'name', 'placeholder', 'options']
 * @param string $submitText Text for the submit button
 */
?>
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 max-w-2xl mx-auto">
    <?php if (isset($title)): ?>
        <h3 class="text-xl font-bold text-slate-900 mb-6"><?= $title ?></h3>
    <?php endif; ?>

    <form action="#" method="POST" class="space-y-5">
        <?php foreach ($fields as $field): ?>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5"><?= $field['label'] ?></label>
                
                <?php if ($field['type'] === 'select'): ?>
                    <select name="<?= $field['name'] ?>" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none bg-slate-50/50">
                        <?php foreach ($field['options'] as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php elseif ($field['type'] === 'textarea'): ?>
                    <textarea name="<?= $field['name'] ?>" placeholder="<?= $field['placeholder'] ?? '' ?>" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none bg-slate-50/50"></textarea>
                <?php else: ?>
                    <input type="<?= $field['type'] ?>" name="<?= $field['name'] ?>" placeholder="<?= $field['placeholder'] ?? '' ?>" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none bg-slate-50/50">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <div class="pt-2">
            <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-xl hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500/30 transition-all shadow-lg shadow-indigo-200">
                <?= $submitText ?? 'Save Changes' ?>
            </button>
        </div>
    </form>
</div>
