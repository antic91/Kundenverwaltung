

function clicked(id){

 axios({
    method: 'post',
    url: '../apis/postDelete.php',
    data: JSON.stringify({parameter: JSON.stringify(id)}),
 })
 .then((result) => {
     if(result.status == 200){
      window.location.reload();
     };
 }).catch((err) => {
    console.log(err)
 });;

}


function clickedEdit(id){

   axios({
      method: 'post',
      url: '../apis/selectOneCustomer.php',
      data: JSON.stringify({parameter: JSON.stringify(id)}),
   })
   .then((result) => {
       if(result.status == 200){
        window.location.replace("../files/edit.php");
       };
   }).catch((err) => {
      console.log(err)
   });;
  
  }

  


function addCustomer(){
   window.location.replace("./add-new.php");
}

function cancelLocation(){
   console.log(window.location.href)
   window.location.replace("../files/index.php");
}

function add(status){
   if(!status){
      window.location.replace("./index.php");
   }else{
      window.location.replace("./add-new.php");
   }
}