// JavaScript Document
function meeting_chk(){
	if(addaccount.newuser.value==""){
		alert("�û�������Ϊ��");addaccount.newuser.focus();return false;
	}
	if(addaccount.newpwd.value==""){
		alert("�����벻��Ϊ��");addaccount.newpwd.focus();return false;
	}
	if(addaccount.newpwdtwice.value==""){
		alert("ȷ�����벻��Ϊ��");addaccount.newpwdtwice.focus();return false;
	}
	if(addaccount.newpwdtwice.value!=addaccount.newpwd.value){
	    alert("������������벻һ�£�");return false;
	}
	//found.submit();
}