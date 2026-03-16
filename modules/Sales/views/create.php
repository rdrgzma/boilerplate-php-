<?php
/**
 * View para criação de venda
 */
?>

<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-50 bg-slate-50/30">
            <h3 class="text-xl font-bold text-slate-900">Transaction Details</h3>
            <p class="text-slate-500 text-sm mt-1">Select a client and add products to calculate the total.</p>
        </div>

        <form action="/admin/sales/store" method="POST" class="p-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Client Selection -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Customer</label>
                    <select name="client_id" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none bg-slate-50/50">
                        <option value="">Select a client...</option>
                        <?php foreach ($clients as $client): ?>
                            <option value="<?= $client->id ?>"><?= $client->name ?> (<?= $client->company_name ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Basic Amount (Static for this simplified version) -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Total Amount ($)</label>
                    <input type="number" step="0.01" name="total_amount" placeholder="0.00" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none bg-slate-50/50 font-bold text-indigo-600">
                </div>
            </div>

            <!-- Product Selection (Simplified Multi-item placeholder) -->
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <h4 class="text-sm font-bold text-slate-400 uppercase tracking-widest">Sale Items</h4>
                    <button type="button" class="text-indigo-600 text-xs font-bold hover:underline">+ Add Product</button>
                </div>
                
                <div class="overflow-x-auto rounded-2xl border border-slate-100 bg-slate-50/20">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-4 py-3 font-bold text-slate-600">Product</th>
                                <th class="px-4 py-3 font-bold text-slate-600">Quantity</th>
                                <th class="px-4 py-3 font-bold text-slate-600">Unit Price</th>
                                <th class="px-4 py-3 font-bold text-slate-600 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="items-container">
                            <!-- In a full version this would be dynamically added -->
                            <tr class="border-t border-slate-50">
                                <td class="px-4 py-4">
                                    <select name="items[0][product_id]" class="w-full px-3 py-2 rounded-lg border border-slate-200 focus:border-indigo-500 transition-all outline-none bg-white text-xs">
                                        <option value="">Choose product...</option>
                                        <?php foreach ($products as $product): ?>
                                            <option value="<?= $product->id ?>"><?= $product->name ?> - $<?= number_format($product->price, 2) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td class="px-4 py-4">
                                    <input type="number" name="items[0][quantity]" value="1" min="1" class="w-20 px-3 py-2 rounded-lg border border-slate-200 focus:border-indigo-500 transition-all outline-none bg-white text-xs">
                                </td>
                                <td class="px-4 py-4">
                                    <input type="number" step="0.01" name="items[0][price]" placeholder="0.00" class="w-24 px-3 py-2 rounded-lg border border-slate-200 focus:border-indigo-500 transition-all outline-none bg-white text-xs">
                                </td>
                                <td class="px-4 py-4 text-right font-bold text-slate-900">$0.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="pt-6 flex justify-end space-x-4">
                <a href="/admin/sales" class="px-6 py-3 rounded-xl text-sm font-bold text-slate-500 hover:bg-slate-100 transition-all">Cancel</a>
                <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-xl text-sm font-bold hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200">
                    Complete Sale
                </button>
            </div>
        </form>
    </div>
</div>
