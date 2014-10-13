var sidebar=[]
sidebar[1]={
	title : '侧栏广告',
	link : 'http://happytime.com',
	src : '/phptest/myCms/uploads/20140423/20140423143017297.jpg',
	info : '侧栏广告'
}
sidebar[2]={
	title : '我们的梦想',
	link : 'http://www.360.cn',
	src : '/phptest/myCms/uploads/20140423/20140423142930513.jpg',
	info : '我们的梦想'
}
sidebar[3]={
	title : '努力加油',
	link : 'http://happytime.com',
	src : '/phptest/myCms/uploads/20140423/20140423142852991.jpg',
	info : '努力加油'
}
sidebar[4]={
	title : '媳妇',
	link : 'http://happytime.com',
	src : '/phptest/myCms/uploads/20140423/20140423142727528.jpg',
	info : '媳妇带人'
}
sidebar[5]={
	title : '测试广告',
	link : 'www.baidu.com',
	src : '/phptest/myCms/uploads/20140423/20140423132700647.jpg',
	info : ''
}
var i=Math.ceil(Math.random()*5)
var j=Math.ceil(Math.random()*5)
if(i==j & i<4){
	j++
}else if(i==5){
	j--
}
document.write('<a title="'+sidebar[i].info+'" href="'+sidebar[i].link+'"><img src="'+sidebar[i].src+'" alt="'+sidebar[i].title+'"/></a>')
