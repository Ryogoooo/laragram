var canvas = document.getElementById('cv'); // 仮定: canvas要素がHTMLに存在している
var w = false;
var ctx = canvas.getContext('2d');
var left = canvas.offsetLeft;
var top = canvas.offsetTop;

var wd = document.getElementById('width'); // 仮定: 線の太さ入力欄のidが"wd"である
var wds = document.querySelectorAll('.wds'); // 仮定: 線選択枠のクラス名が"wds"である

var cl = document.getElementById('color');
var cls = document.querySelectorAll('.cls'); // 仮定: 色選択枠のクラス名が"cls"である
var c10 = document.getElementById('c10'); // 仮定: 選択した色を示す要素のidが"c10"である

var sv = document.getElementById('save'); // 仮定: 保存ボタンのidが"sv"である
var d = document; // 仮定: "d"はdocumentを指す
var c = document.getElementById('cv');

// 以下のコードはそのまま...







var wStart = function (e) {
    e.preventDefault();

    var rect = canvas.getBoundingClientRect();
    var x = (e.clientX - rect.left) * (canvas.width / rect.width);
    var y = (e.clientY - rect.top) * (canvas.height / rect.height);

    w = true;
    ctx.beginPath();
    ctx.moveTo(x, y);
}




/* マウス押下時 */
c.onmousedown = wStart;
/* タッチ開始時 */
c.ontouchstart = wStart;

var wLine = function (e) {
    if (w) {
        var rect = canvas.getBoundingClientRect();
        var x = (e.clientX - rect.left) * (canvas.width / rect.width);
        var y = (e.clientY - rect.top) * (canvas.height / rect.height);

        ctx.lineTo(x, y);
        ctx.stroke();
    }
}

/* マウス移動時 */
c.onmousemove = wLine;
/* タッチ移動時 */
c.ontouchmove = wLine;

/* 描画の終了 */
var wStop = function () {

    w = false;
}
/* マウスボタンを離した時 */
c.onmouseup = wStop;
/* タッチ終了時 */
c.ontouchend = wStop;

/* クリアボタン押下時 */
var clear = document.getElementById('clear')
clear.onclick = function () {

    ctx.clearRect(0, 0, c.width, c.height);
}

/* 選択を未選択状態に */
var clearCs = function (cs, def) {

    for (var i = 0, len = cs.length; i < len; i++) {

        cs[i].setAttribute('class', def);
    }
}

/* 線の太さ入力欄に変更があった時	 */
wd.onchange = function () {

    clearCs(wds, 'wds');
    ctx.lineWidth = this.value;
    this.setAttribute('class', 'cur');
}
/* 線選択枠のクリックイベントの登録 */
for (var i = 0, len = wds.length; i < len; i++) {

    wds[i].onclick = function () {

        /* 線の太さ入力欄の選択状態を解除 */
        wd.removeAttribute('class');

        clearCs(wds, 'wds');
        ctx.lineWidth = this.getAttribute('wd');
        this.setAttribute('class', 'wds cur');
    }
}

/* 色ウィンドウから選択された時 */
cl.onchange = function () {

    /* 選択した色を保存するボタン */
    var p10 = c10.parentNode;

    clearCs(cls, 'cls');
    ctx.strokeStyle = cl.value;
    c10.style.background = cl.value;
    p10.setAttribute('cl', cl.value);
    p10.setAttribute('class', 'cls cur');
}
/* 色選択枠のクリックイベントの登録 */
for (var i = 0, len = cls.length; i < len; i++) {

    cls[i].onclick = function () {

        clearCs(cls, 'cls');
        ctx.strokeStyle = this.getAttribute('cl');
        this.setAttribute('class', 'cls cur');
    }
}

/* 保存ボタン押下時 */
sv.onclick = function () {

    /* 画像のURL表現からデータ部を取出、Base64デコード */
    var data = atob(c.toDataURL().replace(/^[^,]*,/, '')),
        /* Bufferデータ配列に変換 */
        bf = Uint8Array.from(data.split(''), x => x.charCodeAt(0));

    var blob = new Blob([bf], { type: 'image/png' }),
        e = d.createEvent('MouseEvents'),
        a = d.createElement('a');

    /* クリックイベントを作成 */
    e.initMouseEvent('click', false, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);

    /* ダウンロードデータをリンク先に設定 */
    a.href = URL.createObjectURL(blob);
    a.download = 'paint.png';

    /* ダウンロードリンクのイベントを発火 */
    a.dispatchEvent(e);
}
