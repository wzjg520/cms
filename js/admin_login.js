function checkLogin(){
    var form=document.adminlogin;
    if(form.admin_user.value=='' || form.admin_user.value.length<2 || form.admin_user.value.length>20){
        alert('用户名不得为空，不得小于位2位大于20位');
        return false;
    }
    if(form.admin_pass.value=='' || form.admin_pass.value.length<6 || form.admin_pass.value.length>20){
        alert('密码不得为空，不得小于6位大于20位');
        return false;
    }
    if(form.code.value=='' || form.code.value.length !=4){
        alert('验证码必须为4位，切不得为空');
        return false;
    }
    return true;
}