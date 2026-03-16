<?php
/**
 * View para configurações
 */
?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
    <div class="lg:col-span-1">
        <h3 class="text-xl font-bold text-slate-800">Organization Settings</h3>
        <p class="text-slate-500 mt-2 text-sm">
            These settings affect all members of your organization. Change your identity and localization preferences here.
        </p>
        
        <div class="mt-8 p-6 bg-indigo-50 rounded-2xl border border-indigo-100">
            <h4 class="font-bold text-indigo-900 text-sm">Pro Tip</h4>
            <p class="text-indigo-700 text-xs mt-2 leading-relaxed">
                Updating your company domain will change the URL your customers use to access your portal.
            </p>
        </div>
    </div>

    <div class="lg:col-span-2">
        <!-- Render Form -->
        <?php 
            $title = "General Configuration";
            $submitText = "Save Organization Settings";
            $fields = $formFields;
            include __DIR__ . '/../../../app/Views/components/form.php'; 
        ?>
    </div>
</div>
