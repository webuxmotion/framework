<div class="p-3">
  <form method="POST" action="/user/signup">
    <div class="form-group">
      <label for="loginField">Login</label>
      <input
          type="text"
          name="login"
          class="form-control"
          id="loginField"
          aria-describedby="login"
          placeholder="Login"
          value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '' ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input
          type="text"
          name="name"
          class="form-control"
          id="name"
          aria-describedby="login"
          placeholder="Name"
          value="<?=isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '' ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input
          type="email"
          name="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          placeholder="Enter email"
          value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '' ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Signup</button>
      <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
  </form>
</div>
