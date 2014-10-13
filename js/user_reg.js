function checkReg(){
    var form=document.reg;
    if(form.username.value=='' || form.username.value.length<2 || form.username.value.length>20){
        alert('用户名不得为空，不得小于位2位大于20位');
        form.username.value = ''; //清空
		form.username.focus(); //将焦点以至表单字段
        return false;
    }
    if(form.password.value=='' || form.password.value.length<6 || form.password.value.length>20){
        alert('密码不得为空，不得小于6位大于20位');
        form.password.value = ''; //清空
		form.password.focus(); //将焦点以至表单字段
        return false;
    }
    if(form.password.value != form.notpass.value){
        alert('密码和密码确认必须一致');
        form.notpass.value = ''; //清空
		form.notpass.focus(); //将焦点以至表单字段
        return false;
    }
    if (!/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/.test(form.email.value)) {
		alert('邮件格式不正确');
		form.email.value = ''; //清空
		form.email.focus(); //将焦点以至表单字段
		return false;
	}
    if(form.code.value=='' || form.code.value.length !=4){
        alert('验证码必须为4位，且不得为空');
        form.code.value = ''; //清空
		form.code.focus(); //将焦点以至表单字段
        return false;
    }
    return true;
}
function checkLogin(){
     var form=document.login;
    if(form.username.value=='' || form.username.value.length<2 || form.username.value.length>20){
        alert('用户名不得为空，不得小于位2位大于20位');
        form.username.value = ''; //清空
		form.username.focus(); //将焦点以至表单字段
        return false;
    }
    if(form.password.value=='' || form.password.value.length<6 || form.password.value.length>20){
        alert('密码不得为空，不得小于6位大于20位');
        form.password.value = ''; //清空
		form.password.focus(); //将焦点以至表单字段
        return false;
    }
    if(form.code.value=='' || form.code.value.length !=4){
        alert('验证码必须为4位，且不得为空');
        form.code.value = ''; //清空
		form.code.focus(); //将焦点以至表单字段
        return false;
    }
    return true;
}
function setFace(){
    var form=document.reg;
    var options=form.face.options
    var index=form.face.selectedIndex;
    form.faceimg.src='images/'+options[index].value;
}