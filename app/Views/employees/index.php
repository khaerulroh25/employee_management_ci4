<?php
/** @var array $employees */
?>
<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>


<div class="content">

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Employee List</h4>

            <a href="/employees/new" class="btn btn-light btn-sm">
                + Add Employe
            </a>
        </div>

        <div class="card-body">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Adress</th>
                        <th>Position</th>
                        <th>Photo</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (count($employees) > 0): ?>
                        <?php foreach ($employees as $index => $employee): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $employee['name'] ?></td>
                                <td><?= $employee['email'] ?></td>
                                <td><?= $employee['phone'] ?></td>
                                <td><?= $employee['address'] ?></td>
                                <td><?= $employee['position'] ?></td>
                                <td>
                                    <img 
                                        src="/uploads/employees/<?= $employee['photo'] ?>" 
                                        width="80"
                                        height="80"
                                        style="object-fit: cover; border-radius: 8px;"
                                    >
                                </td>

                                <td>
                                     <a href="/employees/<?= $employee['id'] ?>/edit"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="/employees/<?= $employee['id'] ?>"
                                          method="POST"
                                          class="d-inline">

                                        <input type="hidden"
                                               name="_method"
                                               value="DELETE">

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin hapus user ini?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                No employee data available.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>