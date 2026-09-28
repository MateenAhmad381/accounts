<h2 class="mb-4">Business Settings</h2>

<div class="card">
  <div class="card-body">
    <form method="post" class="row g-3">
      <?= csrf_field() ?>

      <div class="col-md-6">
        <label for="business_name" class="form-label">Business Name</label>
        <input
          type="text"
          id="business_name"
          name="business_name"
          class="form-control"
          value="<?= e($settings['business_name'] ?? '') ?>"
          required
        >
      </div>

      <div class="col-md-6">
        <label for="currency" class="form-label">Currency</label>
        <input
          type="text"
          id="currency"
          name="currency"
          class="form-control"
          value="<?= e($settings['currency'] ?? 'PKR') ?>"
          maxlength="10"
          required
        >
      </div>

      <div class="col-md-6">
        <label for="phone" class="form-label">Phone</label>
        <input
          type="text"
          id="phone"
          name="phone"
          class="form-control"
          value="<?= e($settings['phone'] ?? '') ?>"
        >
      </div>

      <div class="col-md-6">
        <label for="address" class="form-label">Address</label>
        <input
          type="text"
          id="address"
          name="address"
          class="form-control"
          value="<?= e($settings['address'] ?? '') ?>"
        >
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Save Settings</button>
      </div>
    </form>
  </div>
</div>
