// JavaScript Document
//ɾ����Ϣ����ʾ
function DelInfo(){
	//alert���������Ի���ֻ��һ����ť
	//confirm���������Ի�����������ť
	if(confirm("ȷ��ɾ������������")){
		return true;
	}else{
		return false;
	}
}

//
function ActionInfo(Action,Url){
var Form=document.Form
	if(Action=="Del"){
		if(confirm("ȷ��ɾ��ѡ�е�������")){
			Form.action=Url;
		}else{
			return false;
		}
	}else{
		Form.action=Url;
	}		
}

//checkboxѡ���¼�
function CheckAll(){ 
//���ñ���form��ֵΪname����select�ı� 
var form=document.Form 
//ȡ�ô����¼��İ�ť��name����ֵ 
var action=event.srcElement.name 
   for (var i=0;i<form.elements.length;i++){//�������� 
//����ǰ����form.elements[i]�����дΪe 
      var e = form.elements[i] 
//�����ǰ�����name����ֵΪiTo�� 
//ִ����һ�д��롣�޶��ű�����ı��Χ�� 
      if (e.name == "DelBox[]") 
/*��������¼�������nameΪselectall�İ�ť�ϣ��ͽ���ǰ�����checked������Ϊtrue(��ѡ��)����������Ϊ��ǰ���õ��෴ֵ(��ѡ)*/ 
         e.checked =(action=="selectall")?(form.selectall.checked):(!e.checked)  
      } 
 } 


