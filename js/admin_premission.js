window.onload = function(){
    var title = document.getElementById('title');
    var ol = document.getElementsByTagName('ol')[0];
    var a = ol.getElementsByTagName('a');
    for (var i = 0; i < a.length; i++) {
        a[i].className = null;
        if (title.innerHTML == a[i].innerHTML) {
            a[i].className = 'selected';
        };
        
            }
}
//修改权限
function checkUpdateForm(){
    var form = document.update;
    if (form.name.value.length > 20 || form.name.value == '') {
        alert('权限名称不得大于20位');
        name.focus();
        return false;
    }
    //权限描述
    if (form.info.value.length > 200) {
        alert('权限描述不得大于200位');
        form.info.value = '';
        form.info.focus();
        return false;
    }
    return true;
}

//添加权限
function checkAddForm(){
    var form = document.add
    //权限名称
    if (form.name.value == '' || form.name.value.length > 20) {
        alert('权限名称不得为空，并且不得大于20位');
        form.name.value = '';
        form.name.focus();
        return false;
    }
    //权限描述
    if (form.info.value.length > 200) {
        alert('权限描述不得大于200位');
        form.info.value = '';
        form.info.focus();
        return false;
    }
    return true;
}
