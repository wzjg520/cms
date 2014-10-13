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
function checkUpdateForm(){
    var form=document.update;
    if(form.nav_name.value.length>20 || form.nav_name.value==''){
        alert('导航名称不得大于20位');
        form.nav_name.focus();
        return false;
    }
     //等级描述
    if(form.nav_info.value.length>200){
        alert('导航描述不得大于200位');
        form.nav_info.value='';
        form.nav_info.focus();
        return false;
    }
    return true;
}
//导航等级
function checkAddForm(){
    var form=document.add
    //导航名称
    if(form.nav_name.value=='' || form.nav_name.value.length>20){
        alert('导航名称不得为空，并且不得大于20位');
        form.nav_name.value='';
        form.nav_name.focus();
        return false;
    }
    //导航描述
    if(form.nav_info.value.length>200){
        alert('导航描述不得大于200位');
        form.nav_info.value='';
        form.nav_info.focus();
        return false;
    }
    return true;
}