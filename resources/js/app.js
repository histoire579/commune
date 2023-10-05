const { default: axios } = require('axios');

require('./bootstrap');

const pseudo=document.getElementById('pseudo');
const message=document.getElementById('message');
const submit=document.getElementById('submitButton');
const chatDiv=document.getElementById('chat');
const nb=document.querySelector('#nbsms')

submit.addEventListener('click',()=>{
    axios.post('/tchat',{
        pseudo:pseudo.value,
        message:message.value
    });
});
alert("bonjour");

window.Echo.channel('chat')
    .listen('.chatMessqge',(e)=>{
        chatDiv.innerHTML +='<div id="saconets" class="other break-all mt-2  ml-5 rounded-bl-none float-none bg-gray-300 mr-auto rounded-2xl p-2"><strong>'+ e.pseudo +':'+' '+'</strong>'+ e.message +'</div>';
        nb.textContent ='1';
    });
