var header=[]
header[1]={
	title : '阿斯蒂芬',
	link : 'http://www.360.cn',
	src : '/phptest/myCms/uploads/20140423/20140423150650707.jpg',
	info : '士大夫是'
}
header[2]={
	title : '发生的氛围',
	link : 'http://happytime.com',
	src : '/phptest/myCms/uploads/20140423/20140423150614634.jpg',
	info : '士大夫'
}
header[3]={
	title : '火大',
	link : 'www.taobao.com',
	src : '/phptest/myCms/uploads/20140423/20140423150534252.jpg',
	info : '士大夫'
}
header[4]={
	title : '人们的梦想',
	link : 'http://happytime.com',
	src : '/phptest/myCms/uploads/20140423/20140423150455797.jpg',
	info : '差距'
}
header[5]={
	title : '这期间很重要',
	link : 'www.taobao.com',
	src : '/phptest/myCms/uploads/20140423/20140423145417317.jpg',
	info : '年轻人心高气傲'
}
var i=Math.ceil(Math.random()*5)
var j=Math.ceil(Math.random()*5)
if(i==j & i<4){
	j++
}else if(i==5){
	j--
}
document.write('<a title="'+header[i].info+'" href="'+header[i].link+'"><img src="'+header[i].src+'" alt="'+header[i].title+'"/></a>')
