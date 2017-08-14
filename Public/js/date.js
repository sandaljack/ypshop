   //生成日期
   function creatDate()
   {
     //生成1900年-2100年
     for(var i = 2017; i >= 1900; i--)
     {
       //创建select项
       var option = document.createElement('option');
       option.setAttribute('value',i);
       option.innerHTML = i;
       sel1.appendChild(option);
     }
     //生成1月-12月
     for(var i = 1; i <=12; i++){
       var option1 = document.createElement('option');
       option1.setAttribute('value',i);
       option1.innerHTML = i;
       sel2.appendChild(option1);
     }
     //生成1日—31日
     for(var i = 1; i <=31; i++){
       var option2 = document.createElement('option');
       option2.setAttribute('value',i);
       option2.innerHTML = i;
       sel3.appendChild(option2);
     }
   }
   creatDate();
   //保存某年某月的天数
   var days;
 
   //年份点击 绑定函数
   sel1.onclick = function()
   {
     //月份显示默认值
     sel2.options[0].selected = true;
     //天数显示默认值
     sel3.options[0].selected = true;
   }
   //月份点击 绑定函数
   sel2.onclick = function()
   {
     //天数显示默认值
     sel3.options[0].selected = true;
     //计算天数的显示范围
     //如果是2月
     if(sel2.value == 2)
     {
       //判断闰年
       if((sel1.value % 4 === 0 && sel1.value % 100 !== 0) || sel1.value % 400 === 0)
       {
         days = 29;
       }
       else
       {
         days = 28;
       }
       //判断小月
     }else if(sel2.value == 4 || sel2.value == 6 ||sel2.value == 9 ||sel2.value == 11){
       days = 30;
     }else{
       days = 31;
     }
 
     //增加或删除天数
     //如果是28天，则删除29、30、31天(即使他们不存在也不报错)
     if(days == 28){
       sel3.remove(31);
       sel3.remove(30);
       sel3.remove(29);
     }
     //如果是29天
     if(days == 29){
       sel3.remove(31);
       sel3.remove(30);
       //如果第29天不存在，则添加第29天
       if(!sel3.options[29]){
         sel3.add(new Option('29','29'),null)
       }
     }
     //如果是30天
     if(days == 30){
       sel3.remove(31);
       //如果第29天不存在，则添加第29天
       if(!sel3.options[29]){
         sel3.add(new Option('29','29'),null)
       }
       //如果第30天不存在，则添加第30天
       if(!sel3.options[30]){
         sel3.add(new Option('30','30'),null)
       }
     }
     //如果是31天
     if(days == 31){
       //如果第29天不存在，则添加第29天
       if(!sel3.options[29])
       {
         sel3.add(new Option('29','29'),null)
       }
       //如果第30天不存在，则添加第30天
       if(!sel3.options[30])
       {
         sel3.add(new Option('30','30'),null)
       }
       //如果第31天不存在，则添加第31天
       if(!sel3.options[31])
       {
         sel3.add(new Option('31','31'),null)
       }
     }
   }
 
   //结果显示 设置好日期时间后 弹窗通知
   box.onclick = function()
    {
    //当年、月、日都已经为设置值时
    // if(sel1.value !='year' && sel2.value != 'month' && sel3.value !='day')
    // {
    //   alert("日期时间已经设定好");
    // }
    }
