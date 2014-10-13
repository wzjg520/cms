var text=[]
text[1]={
	title : '淘宝开始做云手机了',
	link : 'http://www.taobao.com'
}
text[2]={
	title : '百度开始进军文学',
	link : 'http://www.baidu.com'
}
text[3]={
	title : '腾讯开始团购系统',
	link : 'http://www.qq.com'
}
text[4]={
	title : '新浪开始进军微博大战',
	link : 'http://www.weibo.com'
}
text[5]={
	title : 'happytime工作室成立了',
	link : 'www.happytime.com'
}
var i=Math.ceil(Math.random()*5)
var j=Math.ceil(Math.random()*5)
if(i==j & i<4){
	j++
}else if(i==5){
	j--
}
document.write('<a class="adv" title="'+text[i].title+'" href="'+text[i].link+'">'+text[i].title+'</a><a class="adv" title="'+text[j].title+'" href="'+text[j].link+'">'+text[j].title+'</a>')
