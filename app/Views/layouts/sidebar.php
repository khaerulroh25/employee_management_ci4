<?php
$uri = service('uri');
?>

<div class="sidebar">

    <div class="sidebar-brand">
        Employee App
    </div>

    <div class="sidebar-menu">
        <a href="/dashboard"
           class="<?= $uri->getSegment(1) == 'dashboard' ? 'active' : '' ?>">
            <i class="bi bi-grid-fill"></i>
            Dashboard
        </a>

        <a href="/users"
           class="<?= $uri->getSegment(1) == 'users' ? 'active' : '' ?>">
            <i class="bi bi-people-fill"></i>
            Management Users

        </a>

        <a href="/employees"
           class="<?= $uri->getSegment(1) == 'employees' ? 'active' : '' ?>">
            <i class="bi bi-person-badge-fill"></i>
            Management Employee
        </a>

        <a href="/logout">
            <i class="bi bi-box-arrow-right"></i>
            Logout
        </a>

    </div>
</div>