<form action="register.php" method="POST" enctype="multipart/form-data">
    <label>Login</label>
    <input name="login" type="email" placeholder="Login or email" >
    <label>Create Password</label>
    <input name="password" type="password" placeholder="Password">
    <br>
    <label><input type="radio" name="gender" value="male">male</label>
    <label><input type="radio" name="gender" value="female">female</label>
    <br>
    <br>
    <label>avatar</label>
    <input type="file" name="avatar">
    <br>
    <button>Зарегистрироваться</button>
    <br><br>
</form>

<form action="authorization.php" method="POST">
    <label>Login</label>
    <input name="login" type="email" placeholder="Login or email" >
    <label>Password</label>
    <input name="password" type="password" placeholder="Password">
    <br>
    <button>Авторизоваться</button>
</form>






