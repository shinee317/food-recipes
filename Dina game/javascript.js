const dina=document.getElementById("dina");


function jump(){
    if(dina.classList !="jump"){
       dina.classList.add("jump"); 
    }
    setTimeout(function(){
        dina.classList.remove("jump");
    },300 );
}
document.addEventListener("keydown", function(event){
    jump();

}
)
//https://youtu.be/i7nIutSLvdU?si=FWU3w_2gvyNVlzIu                               