const wrapper = document.querySelector('.wrapper');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');
const regbtnPopup = document.querySelector('.regbtn');
registerlink.addEventListener('click',()=>{
    wrapper.classList.add('active');
})
loginlink.addEventListener('click',()=>{
    wrapper.classList.remove('active');
})
btnPopup.addEventListener('click',()=>{
    wrapper.classList.add('active-popup');
})
iconClose.addEventListener('click',()=>{
    wrapper.classList.remove('active-popup');
})
regbtnPopup.addEventListener('click',()=>{
    wrapper.classList.add('active-popup');
})
//script to acctivate buttons on the student pannel
document.getElementById("regbtn").onclick=function(){
    location.href="registration.php";
}
