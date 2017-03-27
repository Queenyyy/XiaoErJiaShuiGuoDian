// JavaScript Document
//删除信息的提示
function DelInfo(){
	//alert——弹出对话框只有一个按钮
	//confirm——弹出对话框有两个按钮
	if(confirm("确定删除这条数据吗？")){
		return true;
	}else{
		return false;
	}
}

//
function ActionInfo(Action,Url){
var Form=document.Form
	if(Action=="Del"){
		if(confirm("确定删除选中的数据吗？")){
			Form.action=Url;
		}else{
			return false;
		}
	}else{
		Form.action=Url;
	}		
}

//checkbox选中事件
function CheckAll(){ 
//设置变量form的值为name等于select的表单 
var form=document.Form 
//取得触发事件的按钮的name属性值 
var action=event.srcElement.name 
   for (var i=0;i<form.elements.length;i++){//遍历表单项 
//将当前表单项form.elements[i]对象简写为e 
      var e = form.elements[i] 
//如果当前表单项的name属性值为iTo， 
//执行下一行代码。限定脚本处理的表单项范围。 
      if (e.name == "DelBox[]") 
/*如果单击事件发生在name为selectall的按钮上，就将当前表单项的checked属性设为true(即选中)，否则设置为当前设置的相反值(反选)*/ 
         e.checked =(action=="selectall")?(form.selectall.checked):(!e.checked)  
      } 
 } 


