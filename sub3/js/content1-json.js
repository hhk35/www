let xhr = new XMLHttpRequest();

xhr.onload=function(){
    responseObject = JSON.parse(xhr.responseText);
    
    let newContent='';
    
    
    newContent +='<tbody>';
    
    for(let i=0; i< responseObject.investment.length; i++){
        newContent += '<tr>';
        newContent += '<th scope="row">'+responseObject.investment[i].invest+'</th>';
        newContent += '<td>'+responseObject.investment[i].money+'</td>';
        newContent += '<th scope="row">'+responseObject.investment[i].invest1+'</th>';
        newContent += '<td>'+responseObject.investment[i].money1+'</td>';
        newContent += '</tr>';
    }
    newContent +='</tbody>';
    
    document.getElementById('investment').innerHTML=newContent;
};

xhr.open('GET','js/data.json',true);
xhr.send(null);