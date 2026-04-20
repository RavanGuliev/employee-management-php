<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="index.php?action=add" method="POST">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Yeni İşçi Əlavə Et</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="first_name" placeholder="Ad" class="form-control mb-2" required>
          <input type="text" name="last_name" placeholder="Soyad" class="form-control mb-2" required>
          <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
          <input type="text" name="phone" placeholder="Telefon (məs: 051-653-02-02)" class="form-control mb-2">
          <input type="text" name="position" placeholder="Vəzifə" class="form-control mb-2">
          <input type="number" name="salary" placeholder="Maaş" class="form-control mb-2" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
          <button type="submit" class="btn btn-primary">Yadda Saxla</button>
        </div>
      </form>
    </div>
  </div>
</div>