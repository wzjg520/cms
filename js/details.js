function checkCommend(){
    var form=document.commend;
    if(form.content.value=='' || form.content.value.length>255){
        alert('评论内容不得为空，并且不得大于255位');
        form.content.value = ''; //清空
		form.content.focus(); //将焦点以至表单字段
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