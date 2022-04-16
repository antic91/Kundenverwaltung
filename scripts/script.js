

function clicked(id){

 axios({
    method: 'post',
    url: '../apis/postDelete.php',
    data: JSON.stringify({parameter: JSON.stringify(id)}),
 })
 .then((result) => {
     console.log(result);
    window.location.reload();
 }).catch((err) => {
    console.log(err)
 });;


}
