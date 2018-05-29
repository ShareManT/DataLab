// 获取屏幕宽度（viewport）
let htmlWidth = document.documentElement.clientWidth || document.body.clientWidth;
let htmlHeight = document.documentElement.clientHeight || document.body.clientHeight;

// 获取 html dom
let htmlElm = document.getElementsByTagName('html')[0];

// 设置 html fontsize 将 fontSize 的值限制在 64 以内
let fontSize = htmlWidth / 10  > 64 ? 64 : htmlWidth / 10;
htmlElm.style.fontSize = fontSize + 'px';
/*if(htmlWidth>640){
    htmlElm.style.fontSize="100px";
}else{
    htmlElm.style.fontSize=htmlWidth*100/640+'px';
}*/
