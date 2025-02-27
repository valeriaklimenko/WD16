<form action="register.php" method="POST" enctype="multipart/form-data">
    <label>Login</label>
    <input name="login" type="email" placeholder="Login or email" >
    <label>Create Password</label>
    <input name="password" type="password" placeholder="Password">
    <br>
    <label><input type="radio" name="gender" value="male">male</label>
    <label><input type="radio" name="gender" value="female">female</label>
    <br>
    <label>select</label>
    <select name="select">
        <?php
        $countries =[
            [
                    'id'=> 100,
                    'name' => 'Moscow',
                    'language'=> 'ru'

                ],
            [
                'id'=> 101,
                'name' => 'Belarus',
                'language'=> 'by'

            ],
            [
                'id'=> 102,
                'name' => 'Usa',
                'language'=> 'en'

            ],
        ];
        foreach($countries as $country){
            echo '<option value="'.$country['id'].'">'.$country['name'].'</option>';
        }
        ?>
    </select>
    <br>
    <label>avatar</label>
    <input type="file" name="avatar">
    <br>
    <button>Зарегистрироваться</button>
    <br><br>
</form>

<form action="login.php" method="POST">
    <label>Login</label>
    <input name="login" type="email" placeholder="Login or email" >
    <label>Password</label>
    <input name="password" type="password" placeholder="Password">
    <br>
    <button>Авторизоваться</button>
    </form>





