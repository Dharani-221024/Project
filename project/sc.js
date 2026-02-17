window.prompt("username:");
const f=document.getElementById("bs");
f.onclick=function(){
    let p=document.getElementById("sp").value;
    if(p==""){
        console.log("enter product");
    }
    else{
        alert("searching for "+p);
    }
};
let c=0;
function cartb(){
    c++;
    alert("product added to cart");
    document.getElementById("cartCount").textContent=c;
};

function loginUser(){
    let name=document.getElementById("username").value;
    localStorage.setItem("user",name);
    window.location.href="index.html";
    return false;
}
const account=document.getElementById("account");
function updateAcc(){
    let user=localStorage.getItem("user");
    if(user){
        document.getElementById("aname").textContent="Your Account: "+user;
        account.innerText="logout";
    }
    else{
       aname.textContent="Your account: ";
       account.textContent="login"; 
    }
}
account.onclick=function(){
    let user=localStorage.getItem("user");
    if(user){
        Y=confirm("logOUT??");
    if(Y){
        localStorage.removeItem("user");
        document.getElementById("account").textContent="LogIn";
        updateAcc();
        alert("logged out successfully");

    }
    }
    else{
        window.location.href="login.html";
    }
}
window.onload=updateAcc();

//document.querySelector("head).addEventListener(mouseover,function(){
//   alert("mouse hovering");
//})