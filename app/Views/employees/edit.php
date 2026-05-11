<?php
/** @var array $employee */
?>
<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Employee</h4>
                </div>

                <div class="card-body">

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                    <form action="/employees/<?= $employee['id'] ?>"
                          method="POST" 
                          enctype="multipart/form-data">
                        
                        <input type="hidden"
                                name="_method"
                                value="PUT">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Full Name
                                </label>

                                <input type="text"
                                    name="name"
                                    value="<?= $employee['name'] ?>"
                                    class="form-control"
                                    placeholder="Enter full name"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email"
                                    name="email"
                                    value="<?= $employee['email'] ?>"
                                    class="form-control"
                                    placeholder="Enter email"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input type="text"
                                    name="phone"
                                    value="<?= $employee['phone'] ?>"
                                    class="form-control"
                                    placeholder="Enter phone number"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Position
                                </label>

                                <input type="text"
                                    name="position"
                                    value="<?= $employee['position'] ?>"
                                    class="form-control"
                                    placeholder="Enter position"
                                    required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Address
                                </label>

                                <textarea
                                    name="address"
                                    class="form-control"
                                    rows="4"
                                    placeholder="Enter address"
                                    required><?= $employee['address'] ?></textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Current Photo</label>
                                <br>
                                <img
                                    src="/uploads/employees/<?= $employee['photo'] ?>"
                                    width="120"
                                    class="rounded mb-3">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="form-label">
                                    Employee Photo
                                </label>

                                <input type="file"
                                    name="photo"
                                    class="form-control"
                                    >

                                <small class="text-muted">
                                    Format: JPG/JPEG, Max Size: 300KB
                                </small>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/employees" class="btn btn-secondary">
                                Back
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Update Employee
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>