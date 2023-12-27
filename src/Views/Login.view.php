<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="login/signin" method="post" class="text-center py-5" id="signin-form" style="display: block; transition: all 0.3s linear">
            <img style="width: 15%" src="https://account.cellphones.com.vn/_nuxt/img/Shipper_CPS3.77d4065.png" alt="" />
            <h4 class="fw-bold">ĐĂNG NHẬP</h4>
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger w-50 mx-auto" role="alert">
                    <?= $errors ?>
                </div>
            <?php endif; ?>
            <div class="w-50 mx-auto">
                <div class="input-group input-group-lg mb-3">
                    <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg">Username</span>
                    <input type="text" name="username" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required />
                </div>
                <div class="input-group input-group-lg mb-3">
                    <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg">Password</span>
                    <input type="text" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required />
                </div>
                <button type="submit" class="btn btn-danger mb-3 btn-lg">
                    Đăng nhập
                </button>
            </div>
            <span>Bạn chưa có tài khoản?
                <span role="button" class="text-primary" id="signup-now">Đăng ký ngay!</span></span>
        </form>
        <form action="login/signup" method="post" class="text-center py-5" style="display: none; transition: all 0.3s linear; opacity: 0" id="signup-form">
            <img style="width: 15%" src="https://account.cellphones.com.vn/_nuxt/img/Shipper_CPS3.77d4065.png" alt="" />
            <h4 class="fw-bold">ĐĂNG KÝ</h4>
            <div class="w-50 mx-auto">
                <div class="input-group input-group-lg mb-3">
                    <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg">Username</span>
                    <input type="text" name="username" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required />
                </div>
                <div class="input-group input-group-lg mb-3">
                    <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg">Password</span>
                    <input type="text" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required />
                </div>
                <div class="input-group input-group-lg mb-3">
                    <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg">Re-Password</span>
                    <input type="text" name="repassword" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required />
                </div>
                <button type="submit" class="btn btn-danger mb-3 btn-lg">
                    Đăng ký
                </button>
            </div>
            <span>Bạn đã có tài khoản?
                <span role="button" class="text-primary" id="signin-now">Đăng nhập ngay!</span></span>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const signinForm = document.getElementById("signin-form");
        const signupForm = document.getElementById("signup-form");
        const signupNow = document.getElementById("signup-now");
        const signinNow = document.getElementById("signin-now");

        signupNow.addEventListener("click", () => {
            signinForm.style.opacity = 0;
            setTimeout(() => {
                signinForm.style.display = "none";
                signupForm.style.display = "block";
                signupForm.style.opacity = 1;
            }, 300);
        });
        signinNow.addEventListener("click", () => {
            signupForm.style.opacity = 0;
            setTimeout(() => {
                signupForm.style.display = "none";
                signinForm.style.display = "block";
                signinForm.style.opacity = 1;
            }, 300);
        });
    </script>
</body>

</html>