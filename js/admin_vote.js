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
//修改等级
function checkForm(){
    var form=document.content;
    if(form.title.value.length>20 || form.title.value==''){
        alert('标题不得大于20位且不得为空');
        form.title.focus();
        return false;
    }
     //等级描述
    if(form.info.value.length>200){
        alert('描述不得大于200位');
        form.info.value='';
        form.info.focus();
        return false;
    }
    return true;
}
