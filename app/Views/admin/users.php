<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Name</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Surname</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Address</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <?php foreach ($users as $user): ?>
                <tr>
                    <td class="px-4 py-2 text-sm"><?=$user->id?></td>
                    <td class="px-4 py-2 text-sm"><?=$user->name?></td>
                    <td class="px-4 py-2 text-sm"><?=$user->surname?></td>
                    <td class="px-4 py-2 text-sm"><?=$user->email?></td>
                    <td class="px-4 py-2 text-sm"><?=$user->address?></td>
                </tr>
                <?php endforeach; ?>
                <!-- Pievieno vairāk rindu šeit -->
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>