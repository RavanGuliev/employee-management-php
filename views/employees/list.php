<?php ob_start(); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h4">İşçilərin İdarə Edilməsi</h2>
    <div>
       <form id="searchForm" action="index.php" method="GET" class="d-inline-flex gap-2 me-2">
    <input type="text" 
           name="search" 
           class="form-control form-control-sm" 
           placeholder="Yazın, axtarılsın..." 
           value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
           oninput="clearTimeout(this.delay); this.delay = setTimeout(() => this.form.submit(), 500)">
    </form>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fas fa-plus"></i> Yeni İşçi
        </button>
    </div>
</div>

<div class="card shadow-sm">
    <table class="table table-hover mb-0">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Ad Soyad</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Vəzifə</th>
            <th>Maaş</th>
            <th class="text-end">Əməliyyat</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($employees)): ?>
            <?php foreach ($employees as $emp): ?>
                <tr>
                    <td>#<?= $emp['id'] ?></td>
                    <td><?= htmlspecialchars($emp['first_name'] . ' ' . $emp['last_name']) ?></td>
                    <td><?= htmlspecialchars($emp['email']) ?></td>
                    <td><?= htmlspecialchars($emp['phone'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($emp['position'] ?? '-') ?></td>
                    <td><?= number_format($emp['salary'], 2) ?> AZN</td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-outline-warning edit-btn"
                            data-id="<?= $emp['id'] ?>"
                            data-fname="<?= htmlspecialchars($emp['first_name']) ?>"
                            data-lname="<?= htmlspecialchars($emp['last_name']) ?>"
                            data-email="<?= htmlspecialchars($emp['email']) ?>"
                            data-salary="<?= $emp['salary'] ?>"
                            data-phone="<?= htmlspecialchars($emp['phone'] ?? '') ?>"
                            data-position="<?= htmlspecialchars($emp['position'] ?? '') ?>"
                            data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fas fa-edit"></i>
                        </button>

                        <a href="index.php?action=delete&id=<?= $emp['id'] ?>"
                            class="btn btn-sm btn-outline-danger"
                            onclick="return confirm('Silinsin?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center py-5 text-muted">
                    <i class="fas fa-search-minus mb-3" style="font-size: 40px; opacity: 0.5;"></i>
                    <p class="mb-0">Axtarışa uyğun heç bir işçi tapılmadı.</p>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>

<?php if (isset($total_pages) && $total_pages > 1): ?>
<div class="mt-4">
    <ul class="pagination pagination-sm justify-content-center">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= $i == $current_page ? 'active' : '' ?>">
                <a class="page-link" href="index.php?page=<?= $i ?>&search=<?= urlencode($_GET['search'] ?? '') ?>">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</div>
<?php endif; ?>

<?php include 'modals/add.php'; ?>
<?php include 'modals/edit.php'; ?>

<script>
document.addEventListener('click', function (e) {
    if (e.target.closest('.edit-btn')) {
        const btn = e.target.closest('.edit-btn');
        
        const modal = document.querySelector('#editModal');
        modal.querySelector('form').action = 'index.php?action=edit&id=' + btn.dataset.id;
        modal.querySelector('[name="first_name"]').value = btn.dataset.fname;
        modal.querySelector('[name="last_name"]').value = btn.dataset.lname;
        modal.querySelector('[name="email"]').value = btn.dataset.email;
        modal.querySelector('[name="salary"]').value = btn.dataset.salary;
        modal.querySelector('[name="phone"]').value = btn.dataset.phone;
        modal.querySelector('[name="position"]').value = btn.dataset.position;
    }
});

const searchInput = document.querySelector('input[name="search"]');
if(searchInput) {
    let timeout = null;
    searchInput.addEventListener('input', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            searchInput.closest('form').submit();
        }, 600);
    });
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>