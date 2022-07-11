const stripe = Stripe("pk_test_51L41u9BvZ1aJbSFtesfY3mGS9EpeB8XzuexSxSIGVnWhAGnpWzb0SVMO2equbRWICLjMAypHmeWV0UxkTNi2buoQ00X8chRssF")
const btn = document.querySelector('#btn')
btn.addEventListener('click', ()=>{
    fetch('/pagamento.php',{
        method:"POST",
        headers:{
            'Content-Type' : 'application/json',
        },
        body: JSON.stringify({})
    }).then(res=> res.json())
    .then(payload => {
        stripe.redirectToCheckout({sessionId: payload.id})
    })
})