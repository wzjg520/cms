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
function link(type){
	var form=document.add;
	var logo=document.getElementById('logo');
	if(type==1){
		logo.style.display='none';
	}else if(type==2){
		logo.style.display='block';
	}
}
function checkForm(){
	var form=document.add;
	var type=form.type
	if(form.webname.value=='' || form.webname.value.length>20){
		alert('网站名称不得为空且不得大于20位');
		form.webname.focus();
		return false;
	}
	if(form.weburl.value=='' || form.weburl.value.length>50){
		alert('网站地址不得为空且不得大于20位');
		form.weburl.focus();
		return false;
	}
	if(type[1].checked){
		if(form.logourl.value=='' || form.logourl.value.length>50){
			alert('logo地址不得为空')
			form.logourl.focus();
			return false;
		}
	}
	if(form.code.value.length !=4){
		alert('验证码必须为4位');
		form.code.focus();
		return false;
	}
	if(form.user.value=='' || form.user.value.length>10){
		alert('站长名称不得为空且不得大于10位');
		form.webname.focus();
		return false;
	}
	if(form.email.value.length >40 || form.email.value==0){
		alert('邮箱地址不得为空且不得大于40位');
		form.email.focus();
		return false;
	}
	return true;
}


