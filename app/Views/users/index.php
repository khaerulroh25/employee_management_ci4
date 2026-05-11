<?php
/** @var array $users */
?>
<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">User List</h4>

            <a href="/users/new" class="btn btn-light btn-sm">
                + Add User
            </a>
        </div>

        <div class="card-body">

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

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
                        <th width="20%">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (count($users) > 0): ?>
                        <?php foreach ($users as $index => $user): ?>

                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>

                                <td>
                                    <a href="/users/<?= $user['id'] ?>/edit"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="/users/<?= $user['id'] ?>"
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
                            <td colspan="4" class="text-center text-muted">
                                No user data available.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>