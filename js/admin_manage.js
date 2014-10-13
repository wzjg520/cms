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
//修改管理员
function checkUpdateForm(){
    var pass=document.update.modify_pass;
    if(pass.value==''){
        return true;
    }else if(pass.value.length>20 || pass.value.length<6){
            alert('密码不得小于6位大于20位');
            pass.focus();
            return false;
    }
}
//添加管理员
function checkAddForm(){
    var form=document.add
    //用户名
    if(form.admin_user.value=='' || form.admin_user.value.length>20){
        alert('用户名不得为空，并且不得大于20位');
        form.admin_user.value='';
        form.admin_user.focus();
        return false;
    }
    //密码
    if(form.admin_pass.value=='' || form.admin_pass.value.length>20 || form.admin_pass.value.length<6){
        alert('密码不得小于6位大于20位');
        form.admin_pass.value='';
        form.admin_pass.focus();
        return false;
    }
    //密码确认
    if(form.admin_notepass.value != form.admin_pass.value){
        form.admin_notepass.value='';
        alert('密码必须和确认密码一致');
        form.admin_notepass.focus();
        return false;
    }
    return true;
}