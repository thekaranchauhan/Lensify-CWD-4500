let editLinks = document.getElementsByClassName('checkout-edit');
const shipping = document.getElementById('lensify-checkout-shipping');
const billing = document.getElementById('lensify-checkout-billing');
let x=0;

for (let link of editLinks) {
    link.addEventListener('click', (e)=>{
        if(x==1) {
            shipping.classList.toggle('lensify-hidden');
        } else {
            billing.classList.toggle('lensify-hidden');
        }
    });
    x++;
}