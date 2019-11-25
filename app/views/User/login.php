<div class="p-3">
    <form method="POST" action="/user/login">
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
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
    </form>
</div>