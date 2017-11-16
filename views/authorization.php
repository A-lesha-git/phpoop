<div class="authorization">

    <?php
        if (isset($user)):  ?>
            <p>Здравствуйте! <?= $user->getLogin()?></p>
            <ul class="ul">
                <li><a href="/auth/logout/">Выйти</a></li>
            </ul>
    <?php else: ?>
            <span> Тестовый пользователь:<br>baganull<br>pass</span>
        <ul class="ul">
            <li><a href="/auth/login/">Авторизация</a></li>
            <li><a href="/auth/register/">Регистрация</a></li>
        </ul>
    <?php endif ?>
</div>