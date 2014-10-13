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
function centerWindow(width,height){
  	var left = (screen.width - width) / 2;
	var top = (screen.height - height) / 2 - 50;
    window.open('../config/upfile.php?type=thumb','上传','width='+width+',height='+height+',left='+left+',top='+top)
}


function checkContent(){
    var form=document.content
    //标题
    if(form.title.value=='' || form.title.value.length>59){
        alert('标题不得为空，并且不得大于50位');
        form.title.value='';
        form.title.focus();
        return false;
    }
    //栏目
    if(form.nav.value==''){
        alert('请一个选择栏目');
        form.nav.focus();
        return false;
    }
    //tag
    if(form.tag.value.length>30){
        alert('标签不得大于30位');
        form.tag.value='';
        form.tag.focus();
        return false;
    }
    //关键字
    if(form.keyword.value.length>30){
        alert('关键字不得大于30位');
        form.keyword.value='';
        form.keyword.focus();
        return false;
    }
    //文章来源
    if(form.source.value.length>20){
        alert('文章来源不得大于20位');
        form.keyword.value='';
        form.keyword.focus();
        return false;
    }
     //作者
    if(form.author.value.length>10){
        alert('作者不得大于10位');
        form.author.value='';
        form.author.focus();
        return false;
    }
     //简介
    if(form.info.value.length>200){
        alert('简介不得大于200位');
        form.info.value='';
        form.info.focus();
        return false;
    }
     //文章
    if (CKEDITOR.instances.TextArea1.getData() == '') {
		alert('警告：详细内容不得为空！');
		CKEDITOR.instances.TextArea1.focus();
		return false;
	}
    //浏览量
    if(isNaN(form.count.value)){
        alert('浏览量必须是数字');
        form.count.value='';
        form.count.focus();
        return false;
    }
    //金币
    if(isNaN(form.gold.value)){
        alert('金币量是数字');
        form.gold.value='';
        form.gold.focus();
        return false;
    }

    return true;
}
