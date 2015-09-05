
var timer;

function play(){
	$('embed').remove(); 
	$('body').append('<embed src="http://zjdx1.sc.chinaz.com/Files/DownLoad/sound1/201508/6201.mp3" autostart="true" hidden="true" loop="false">');
}

function check(){
	var spans = $(".ui-button span:contains(购买)");
	if(spans.length > 0){
		clearInterval(timer);
		play();
	}
}

function ref(){
var link = $("#transfer-list-pagination a:first");
link[0].click();
setTimeout('check()', 1000);
}

function loadjscssfile(filename, filetype){                                                                                                             
     if (filetype=="js"){ //判断文件类型
           var fileref=document.createElement('script')//创建标签
                 fileref.setAttribute("type","text/javascript")//定义属性type的值为text/javascript
                   fileref.setAttribute("src", filename)//文件的地址
     }
     else if (filetype=="css"){ //判断文件类型
           var fileref=document.createElement("link")
                 fileref.setAttribute("rel", "stylesheet")
                   fileref.setAttribute("type", "text/css")
                     fileref.setAttribute("href", filename)
     }
     if (typeof fileref!="undefined")
           document.getElementsByTagName("head")[0].appendChild(fileref)
 }

loadjscssfile("http://code.jquery.com/jquery-latest.js","js"); 
 setTimeout(function(){
 $(document).ready(function(){
   
	 
	 timer = setInterval('ref()', 2000);
 })
 },3000);
 