<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/SessionRouting.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/updateRecord.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/common/head.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/template_user_header.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <section class="recordForm">
            <h1>出勤簿内容変更</h1>
            <form action="/attendance_record/process/user/upload.php" method="POST">
                <ul>
                    <li>
                        <label>
                            日付<span>※必須</span>
                                <input type="date" id="day" name="day" autocomplete="on" value="<?=$acquire_dbdata['work_date'] ?>" required>
                        </label>
                    </li>
                    <li>
                        <label>
                            始業時間<span>※必須</span>
                                <input type="time" id="opening_hour" name="opening_hour" value="<?=$acquire_dbdata['opening_hour'] ?>" min="08:00" max="20:00" step="900" required>
                        </label>
                    </li>
                    <li>
                        <label>
                            終業時間<span>※必須</span>
                            <input type="time" id="ending_hour" name="ending_hour" value="<?=$acquire_dbdata['ending_hour'] ?>" min="08:00" max="20:00" step="900" required>
                        </label>
                    </li>
                    <li>
                        <label>
                            訓練時間<span>※必須</span>
                            <input type="time" id="training_time" name="training_time" value="<?=$acquire_dbdata['training_time'] ?>" min="00:00" max="8:00" step="900">
                        </label>
                    </li>
                    <li>
                        <label>
                            相談時間<span>※必須</span>
                            <input type="time" id="consultation_time" name="consultation_time" value="<?=$acquire_dbdata['consultation_time'] ?>" min="00:00" max="8:00" step="900">
                        </label>
                    </li>
                    <li>
                        <label>
                            休憩時間<span>※必須</span>
                            <input type="time" id="rest_time" name="rest_time" value="<?=$acquire_dbdata['rest_time'] ?>" min="00:00" max="8:00" step="900">
                        </label>
                    </li>
                    <li>
                        <label>
                            有給/無休/欠席/代休の選択
                            <input name="yasumi" list="data1" size="4" value="<?=$acquire_dbdata['yasumi'] ?>">
                            <datalist id="data1">
                                <option value="有">有給</option>
                                <option value="無">無給</option>
                                <option value="欠">欠勤</option>
                                <option value="代">代休</option>
                            </datalist>
                        </label>
                    </li>
                    <li class="inline">
                        <div>
                            <input class="button submit inmid" type="submit" value="送信">
                            <input type="hidden" name="id" value="<?=$acquire_dbdata['id'] ?>">
                        </div>
                        
                        <input class="button inmid" type="reset" value="リセット">
                    </li>
                </ul>
            </form>
            </section>
        </div>
    </div>

<?php include($_SERVER['DOCUMENT_ROOT'] .'/attendance_record/template/template_lower.html'); ?>












