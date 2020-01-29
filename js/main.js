$(function() {

    $('#kaributton').click(function(){
        // 一応確認のため
        console.log('ボタンがおされましたよ');

        $.ajax({
            type: '',   //
            url: '',        // リクエスト先のパス
            data: "",
            success: function(data){
                console.log('通信成功');

            },
            errors: function(){
                console.log('通信失敗');
                console.log('エラー：');
                console.log("XMLHttpRequest : " + XMLHttpRequest.status);
                console.log("textStatus     : " + textStatus);
                console.log("errorThrown    : " + errorThrown.message);
            }
        });
        //サブミット後、ページをリロードしないようにする
        return false;
    });

    $('#month').change(function(){
        //POSTメソッドで送るデータを定義する
        // var data = {パラメータ値　: 値}
        var data = $('#month').val();
        console.log(data);

        // 前回検索した表示物を消すために
        $('#resultdata').children().remove();

        /** 
         * Ajax通信メソッド
         * @param type  :HTTP通信の種類
         * @param url   :リクエスト送信先のurl
         * @param data  :サーバーに送信する値
         */
        $.ajax({
            type: 'POST',
            data: {
                'month': $('#month').val()
            },
            url: '/attendance_record/process/user/search_month.php',
            /**
             * Ajax通信が成功した場合に呼び出されるメソッド
             */
            success: function(data, dataType){
                //successのブロック内は、Ajax通信が成功した場合に呼び出し
                console.log("通信成功");
                //　こっちのdataはDBから取得したほうのdata
                console.log(data);

                $.each(data, function(key, value){
                    //PHPから返ってきたデータの表示
                    $('#resultdata').append("<tr><td>" 
                                    + value.work_date + "</td><td>" 
                                    + value.opening_hour + "</td><td>"
                                    + value.ending_hour + "</td><td>"
                                    + value.training_time + "</td><td>"
                                    + value.consultation_time + "</td><td>"
                                    + value.rest_time  + "</td><td>"
                                    + value.yasumi + "</td><td>"
                                    + "<form action='updateRecord.php' method='POST'>"
                                    + "<input type='submit' value='変更'>"
                                    + "<input type='hidden' name='update_record' value=" + value.id + ">"
                                    + "</form></td><td>"
                                    + "<form action='deleteRecord.php' method='POST'>"
                                    + "<input type='submit' value='削除'>"
                                    + "<input type='hidden' id='' name='delete_record' value=" +  value.id + ">"
                                    + "</form></td></tr>");
                });

            },
            /**
             * Ajax通信が失敗した場合に呼び出されるメソッド
             */
            error: function(XMLHttpRequest, textStatus, errorThrown){
                //通常はここでTextStatusやerrorThrownの値を見て
                //処理を切り分けるか、単純に失敗した際の処理を記述します。
                // this;
                // thisは他のコールバック関数同様に AJAX通信時のオプションを
                //示します。
                console.log('通信失敗');

                //エラーメッセージの表示
                alert('エラー：'
                        + "XMLHttpRequest : " + XMLHttpRequest.status
                        + "\ntextStatus     : " + textStatus
                        + "\nerrorThrown    : " + errorThrown.message);
            }
        });
        //サブミット後、ページをリロードしないようにする
        return false;
    });

});
