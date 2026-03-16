<?php
// Mock data for documentation/demo
$cards = [
    [
        'title' => 'Average Revenue',
        'value' => '$12,450.00',
        'change' => '+12.5%',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        'color' => 'indigo'
    ],
    [
        'title' => 'Active Users',
        'value' => '1,284',
        'change' => '+5.2%',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
        'color' => 'violet'
    ],
    [
        'title' => 'Total Sales',
        'value' => '452',
        'change' => '-2.4%',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>',
        'color' => 'sky'
    ],
    [
        'title' => 'Conversion Rate',
        'value' => '4.86%',
        'change' => '+1.1%',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>',
        'color' => 'emerald'
    ]
];

$headers = ['Order ID', 'Customer', 'Product', 'Amount', 'Status', 'Date'];
$rows = [
    ['#ORD-7392', 'Alex Thompson', 'Premium Plan', '$299.00', '<span class="px-2 py-1 rounded-lg bg-emerald-50 text-emerald-600 text-xs font-bold">Paid</span>', 'Oct 24, 2025'],
    ['#ORD-7391', 'Sarah Jenkins', 'Starter Kit', '$49.00', '<span class="px-2 py-1 rounded-lg bg-amber-50 text-amber-600 text-xs font-bold">Pending</span>', 'Oct 23, 2025'],
    ['#ORD-7390', 'Michael Chen', 'Consultation', '$150.00', '<span class="px-2 py-1 rounded-lg bg-emerald-50 text-emerald-600 text-xs font-bold">Paid</span>', 'Oct 23, 2025'],
    ['#ORD-7389', 'Emily Ross', 'Premium Plan', '$299.00', '<span class="px-2 py-1 rounded-lg bg-rose-50 text-rose-600 text-xs font-bold">Cancelled</span>', 'Oct 22, 2025'],
];

$fields = [
    ['label' => 'Full Name', 'type' => 'text', 'name' => 'name', 'placeholder' => 'Enter customer name'],
    ['label' => 'Email Address', 'type' => 'email', 'name' => 'email', 'placeholder' => 'alex@example.com'],
    ['label' => 'Service Plan', 'type' => 'select', 'name' => 'plan', 'options' => ['free' => 'Free Tier', 'starter' => 'Starter ($49)', 'pro' => 'Professional ($299)']],
    ['label' => 'Internal Notes', 'type' => 'textarea', 'name' => 'notes', 'placeholder' => 'Add some private notes about this customer...'],
];

$title = "Admin Dashboard";
$header = "Overview Dashboard";
$subtitle = "Welcome back, here's what's happening with your store today.";
?>

<div class="space-y-10">
    <!-- Render Cards -->
    <?php include __DIR__ . '/../components/cards.php'; ?>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-10">
        <!-- Render Table (takes 2 columns) -->
        <div class="xl:col-span-2">
            <?php 
                $title = "Recent Transactions"; 
                include __DIR__ . '/../components/table.php'; 
            ?>
        </div>

        <!-- Render Form -->
        <div>
            <?php 
                $title = "Quick Add Member";
                $submitText = "Create Account";
                include __DIR__ . '/../components/form.php'; 
            ?>
        </div>
    </div>
</div>
