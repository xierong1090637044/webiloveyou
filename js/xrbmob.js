
Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");

function query1(name){
    var GameScore = Bmob.Object.extend("sanhangqs");
    var query = new Bmob.Query(GameScore);
    // 查询所有数据
    query.find({
        success: function(results) {
            for (var i = 0; i < results.length; i++) {
                var object = results[i];
                alert(object.id + ' - ' + object.get('playerName'));
            }
        }
    });
}
