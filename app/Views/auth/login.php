<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold">
                                Employee App
                            </h3>

                            <p class="text-muted">
                                Please login to your account
                            </p>
                        </div>

                        <form action="/login-process" method="POST">
                            <div class="mb-3">
                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Enter your email"
                                    required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">
                                    Password
                                </label>

                                <input type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Enter your password"
                                    required>
                            </div>

                            <button type="submit"
                                class="btn btn-warning w-100">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>