window.onload=function(){

    var option=document.getElementsByTagName('option');
    var lever=document.getElementById('admin_lever');
       if(lever){
            for(var i=0;i<option.length;i++){
                if(option[i].value==lever.value){
                    option[i].selected="true"
                }
            }
       }
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
//function centerWindow(width,height){
//   	var left = (screen.width - width) / 2;
//	var top = (screen.height - height) / 2 - 50;
//    window.open('../templates/upload.html','上传','width='+width+',height='+height+',left='+left+',top='+top)
//}
function centerWindow(url, name, width, height) {
	var left = (screen.width - width) / 2;
	var top = (screen.height - height) / 2 - 50;
	window.open(url, name, 'width='+width+',height='+height+',top='+top+',left='+left);
}
//添加轮播图
function checkAddForm(){
    var form=document.content
    //轮播图
    if(form.thumb.value==''){
        alert('轮播图不得为空');
        return false;
    }
    //link
    if(form.link.value==''){
        alert('链接不得为空');
        form.link.focus();
        return false;
    }
	   //link
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