<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/loginFunction.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/common/head.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/UserTopHeader.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/flashMessage.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <section class="loginform">
                <h1>利用者ログイン</h1>
                <form action="loginPage.php" method="POST">
                    <ul>
                        <li>
                            <label class="inputlabel">
                                <input class="inputform" type="text" id="user_id" name="user_id" placeholder="ユーザーID入力">
                            </label>
                        </li>
                        <li>
                            <input class="button mid submit" type="submit" value="送信">
                        </li>
                    </ul>
                </form>
            </section>
        </div>
    </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/topPageLower.php'); ?>

