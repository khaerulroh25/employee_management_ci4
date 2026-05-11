<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Employee App' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        body {
            background: #f4f5f9;
            font-family: sans-serif;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(
                180deg,
                #1e2229,
                #151922
            );
        }

        .sidebar-brand {
            padding: 24px 20px;
            color: white;
            font-size: 30px;
            font-weight: bold;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar-menu {
            margin-top: 10px;
        }

        .sidebar-menu a {
            display: block;
            color: #cfd3dc;
            text-decoration: none;
            padding: 14px 20px;
            transition: 0.3s;
            font-size: 16px;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.05);
            color: white;
        }

        .sidebar-menu a.active {
            background: #0d6efd;
            color: white;
        }

        .sidebar-menu i {
            margin-right: 10px;
        }

         .content {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            background: white;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .card-custom {
            border: none;
            border-radius: 14px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
    </style>
</head>

<body>