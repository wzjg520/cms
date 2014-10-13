window.onload=function(){
    var title=document.getElementById('title');
    var ol=document.getElementsByTagName('ol')[0];
    var a=ol.getElementsByTagName('a');
    for(var i=0;i<a.length;i++){
        a[i].className=null;
        if(title.innerHTML==a[i].innerHTML){
            a[i].className='selected';
        };

    }
}
function centerWindow(url, name, width, height) {
	var left = (screen.width - width) / 2;
	var top = (screen.height - height) / 2 - 50;
	window.open(url, name, 'width='+width+',height='+height+',top='+top+',left='+left);
}
//添加广告
function checkAddForm(){
    var form=document.content
    //广告图
	if (!form.type[0].checked) {
		if (form.thumb.value == '') {
			alert('图片不得为空');
			return false;
		}
	}
    //link
    if(form.link.value==''){
        alert('链接不得为空');
        form.link.focus();
        return false;
    }
	   //title
    if(form.title.value.length>20){
        alert('标题不得大于20位');
        form.title.focus();
        return false;
    }
	//info
	  if(form.info.value.length>20){
        alert('描述不得大于20位');
        form.title.focus();
        return false;
    }
    return true;
}
function adver(type){
	var thumbnail=document.getElementById('thumbnail');	
	var form=document.content;
	var img=form.pic
	var textsrc=form.thumb;
	var up=document.getElementById('up');
	if(form.adv.value==type)return;
	switch(type){
		case 1:
			thumbnail.style.display="none";
			img.src="";
			img.style.display="none";
			form.adv.value=1;
			break;
		case 2:
			thumbnail.style.display='block';
			img.src="";
			textsrc.value="";
			img.style.display="none";
			up.innerHTML="<input type=\"button\" value=\"选择\" onclick=\"centerWindow('../config/upfile.php?type=adver&size=690*80','上传',500,200)\"/>";
			form.adv.value=2;
			break;
		case 3:
			thumbnail.style.display='block';
			img.src="";			
			textsrc.value="";
			img.style.display="none";
			up.innerHTML="<input type=\"button\" value=\"选择\" onclick=\"centerWindow('../config/upfile.php?type=adver&size=270*200','上传',500,200)\"/>";
			form.adv.value=3;
			break;
		
	}
	
	
	
	
}
