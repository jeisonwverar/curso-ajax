import STRIPE_KEYS from './stripe-keys.js'

//console.log(STRIPE_KEYS)

const d = document;
const $tacos = d.getElementById('tacos');
const $template = d.getElementById('taco-template').content;
const $fragment = d.createDocumentFragment();
const fetchOptions={
    headers:{
        Authorization:`Bearer ${STRIPE_KEYS.private}`,
    }
}
let products;
let prices;

Promise.all([
    fetch('https://api.stripe.com/v1/products',fetchOptions),
    fetch('https://api.stripe.com/v1/prices',fetchOptions)

])
.then(responses=>{
   return Promise.all(responses.map(res=>res.json()))
})
.then(json=>{
    console.log(json)
})
