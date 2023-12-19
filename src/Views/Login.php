<div class="container">
  <form action="./Login/SignIn" method="post" class="text-center py-5" id="signin-form" style="display: block; transition: all 0.3s linear">
    <img style="width: 15%" src="https://account.cellphones.com.vn/_nuxt/img/Shipper_CPS3.77d4065.png" alt="" />
    <h4 class="fw-bold">ĐĂNG NHẬP</h4>
    <div class="w-50 mx-auto">
      <div class="input-group input-group-lg mb-3">
        <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg">Username</span>
        <input name="username" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required />
      </div>
      <div class="input-group input-group-lg mb-3">
        <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg">Password</span>
        <input name="password" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required />
      </div>
      <button type="submit" class="btn btn-danger mb-3 btn-lg">
        Đăng nhập
      </button>
    </div>
    <span>Bạn chưa có tài khoản?
      <span role="button" class="text-primary" id="signup-now">Đăng ký ngay!</span></span>
  </form>
  <form action="./Login/SignUp" method="post" class="text-center py-5" style="display: none; transition: all 0.3s linear; opacity: 0" id="signup-form">
    <img style="width: 15%" src="https://account.cellphones.com.vn/_nuxt/img/Shipper_CPS3.77d4065.png" alt="" />
    <h4 class="fw-bold">ĐĂNG KÝ</h4>
    <div class="w-50 mx-auto">
      <div class="input-group input-group-lg mb-3">
        <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg">Username</span>
        <input name="username" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required />
      </div>
      <div class="input-group input-group-lg mb-3">
        <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg">Password</span>
        <input name="password" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required />
      </div>
      <div class="input-group input-group-lg mb-3">
        <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg">Re-Password</span>
        <input name="repassword" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required />
      </div>
      <button type="submit" class="btn btn-danger mb-3 btn-lg">
        Đăng ký
      </button>
    </div>
    <span>Bạn đã có tài khoản?
      <span role="button" class="text-primary" id="signin-now">Đăng nhập ngay!</span></span>
  </form>
</div>
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