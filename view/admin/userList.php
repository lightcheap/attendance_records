<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/admin/userList.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Upper.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/TopHeaderMenu.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/flashMessage.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <div class="loginform admin">
                <h1>利用者一覧</h1>
                <table>
                    <tr>
                        <th>ユーザーID</th>
                        <th>姓</th>
                        <th>名</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                    <?php foreach($users as $user){ ?>
                    <tr>
                        <td><?= htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user['user_last_name'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user['user_first_name'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td>
                            <form action='editUser.php' method='POST'>
                                <input type='submit' value='編集'>
                                <input type='hidden' name='edit_user' value="<?=$user['id']?>">
                            </form>
                        </td>
                        <td>
                            <form action='deleteUser.php' method='POST'>
                                <input type='submit' value='削除'>
                                <input type='hidden' name='delete_user' value="<?=$user['id']?>">
                            </form>
                        </td>
                    </tr>
                    <?php }?>
                </table>
                <a href="loginPage.php">ログインページに戻る</a>
            </div>
        </div>
    </div>

</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Lower.php'); ?>