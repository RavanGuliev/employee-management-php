<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="POST">
        <div class="modal-header bg-warning">
          <h5 class="modal-title">Məlumatları Yenilə</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="first_name" class="form-control mb-2" placeholder="Ad" required>
          <input type="text" name="last_name" class="form-control mb-2" placeholder="Soyad" required>
          <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
          <input type="text" name="phone" class="form-control mb-2" placeholder="Telefon">
          <input type="text" name="position" class="form-control mb-2" placeholder="Vəzifə">
          <input type="number" name="salary" class="form-control mb-2" placeholder="Maaş" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İmtina</button>
          <button type="submit" class="btn btn-success">Dəyişiklikləri Saxla</button>
        </div>
      </form>
    </div>
  </div>
</div>