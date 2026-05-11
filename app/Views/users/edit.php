<?php
/** @var array $user */
?>
<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit User</h4>
                </div>

                <div class="card-body">

                    <form action="/users/<?= $user['id'] ?>" method="POST">
                        <input type="hidden"
                                    name="_method"
                                    value="PUT">

                        <div class="mb-3">
                            <label class="form-label">
                                Name
                            </label>

                            <input type="text"
                                name="name"
                                value="<?= $user['name'] ?>"
                                class="form-control"
                                placeholder="Enter name"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                name="email"
                                value="<?= $user['email'] ?>"
                                class="form-control"
                                placeholder="Enter email"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Password
                            </label>

                            <input type="password"
                                name="password"
                                class="form-control"
                                placeholder="Leave blank if not changing password">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/users" class="btn btn-secondary">
                                Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>