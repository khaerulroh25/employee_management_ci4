<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">

    <div class="topbar d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Dashboard</h4>

        <span>
            Welcome, <?= session()->get('user_name') ?>
        </span>
    </div>

    <div class="card card-custom p-4">
        <h5>Dashboard Content</h5>

        <p>
            Welcome to the Employee Management Application.
        </p>
    </div>

</div>

<?= $this->include('layouts/footer') ?>