const quantityInput = document.querySelector("#valueTotal.quantity__number");
const iduser = document.querySelector('meta[name="id_user"]');
const quantityDecreaseButton = document.querySelector(".quantity__value.decrease");
const quantityIncreaseButton = document.querySelector(".quantity__value.increase");
const cart = document.querySelector('.minicart__product');
const itemCountProduct = document.querySelector('.items__count.__cart');
const itemCountProduct2 = document.querySelector('.items__count.style2.__cart');
let btnRemoves = document.querySelectorAll('.minicart__product--remove');
function toastSucces(msg){
    Toastify({
        text: `${msg}`,
        duration: 1000,
        className: "info",
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        }
    }).showToast();
}
if (!localStorage.getItem("carts")) {
    localStorage.setItem("carts", JSON.stringify([
        {
            Auth : iduser.content
        },[]
    ]));
}
var cartsProducts = JSON.parse(localStorage.getItem("carts"));
console.log(quantityDecreaseButton)
function decrease(){
    const currentQuantity = Number(quantityInput.value);

    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    }
}

function decreaseCart(id){
    const quantityInputCart = document.querySelector("#valueTotal.quantity__number.cart_"+id);
    const currentQuantity = Number(quantityInputCart.value);
    if (currentQuantity > 1) {
        quantityInputCart.value = currentQuantity - 1;
    }
    const indexProduct = cartsProducts[1].findIndex((item) => item.idProduct == id);
    cartsProducts[1][indexProduct].numberOf -=1;
    localStorage.setItem("carts", JSON.stringify(cartsProducts));
    renderProducts(cartsProducts[1])
}
// quantityDecreaseButton.addEventListener("click", () => {
//     console.log(1)
//     const currentQuantity = Number(quantityInput.value);
//     if (currentQuantity > 1) {
//         quantityInput.value = currentQuantity - 1;
//     }
// });
// console.log(quantityIncreaseButton)
//
function increaseCart(id){
    const quantityInputCart = document.querySelector("#valueTotal.quantity__number.cart_"+id);
    quantityInputCart.value = Number(quantityInputCart.value) + 1;
    const indexProduct = cartsProducts[1].findIndex((item) => item.idProduct == id);
    cartsProducts[1][indexProduct].numberOf +=1;
    localStorage.setItem("carts", JSON.stringify(cartsProducts));
    renderProducts(cartsProducts[1])
    // Tăng giá trị numberOf lên 1
    // product.numberOf += 1;
}
function increase(){
    quantityInput.value = Number(quantityInput.value) + 1;
}
// quantityIncreaseButton.addEventListener("click", () => {
//     console.log(2)
//     quantityInput.value = Number(quantityInput.value) + 1;
// });




function renderProducts(obj){
    const html = obj.map((value) => {
        return `  <div class="minicart__product--items d-flex" id="products__${value.idProduct}">
                <div class="minicart__thumb">
                    <a href="product-details.html"><img src="../${value.imageDetail}" alt="prduct-img"></a>
                </div>
                <div class="minicart__text">
                    <h3 class="minicart__subtitle h4"><a href="product-details.html">${value.nameProductDetail}</a></h3>
                    <div class="minicart__price">
                        <span class="current__price">${value.viewPriceDetail}</span>
                        <span class="old__price">${value.viewPriceOld}</span>
                    </div>
                    <div class="minicart__text--footer d-flex align-items-center">
                        <div class="quantity__box">
                            <button type="button" class="quantity__value decrease" onclick="decreaseCart(${value.idProduct})">-</button>
                            <label>
                                <input type="number" class="quantity__number cart_${value.idProduct}" value="${value.numberOf}" id="valueTotal" />
                                     <input type="hidden" id="idProductCart" value="${value.idProduct}">
                                    <input type="hidden" id="srcImageCart" value="${value.imageDetail}">
                                    <input type="hidden" id="priceCurrentCart" value="${value.price}">
                                    <input type="hidden" id="priceCurrentOldCart" value="${value.viewPriceOld}">
                                    <input type="hidden" id="cateIDCart" value="${value.categoriesId}">
                            </label>
                            <button type="button" class="quantity__value increase" onclick="increaseCart(${value.idProduct})">+</button>
                        </div>
                        <button class="minicart__product--remove" data-id="${value.idProduct}">Remove</button>
                    </div>
                </div>
            </div>`;
    }).join('');

    cart.innerHTML = html;
    itemCountProduct.innerText = obj.length;
    itemCountProduct2.innerText = obj.length;
    btnRemoves = document.querySelectorAll('.minicart__product--remove');
    let totalViewPrice = 0;

// Lặp qua từng đối tượng trong mảng và cộng tổng giá trị viewPriceDetail
    for (let i = 0; i < obj.length; i++) {
        const viewPrice = parseFloat(obj[i].viewPriceDetail.replace(/[^0-9.-]+/g,"")) * obj[i].numberOf;
        totalViewPrice += viewPrice;
    }
    totalViewPrice = totalViewPrice.toLocaleString();
    const priceText = document.querySelectorAll('.minicart__amount .minicart__amount_list span b');
    for (const priceTextElement of priceText) {
        priceTextElement.innerText = totalViewPrice + '₫';
    }
    removeProducts(btnRemoves);
}

renderProducts(cartsProducts[1])


function removeProducts(evts){
    for (const btnRemoveElement of evts) {
        btnRemoveElement.addEventListener('click',() => {
            const idItem = btnRemoveElement.getAttribute('data-id');
            const elm = document.querySelector('#products__'+idItem);
            console.log(elm);
            elm.remove();
            const index = cartsProducts[1].findIndex(item => item.idProduct === idItem);
            console.log(index);
            if (index !== -1) {
                cartsProducts[1].splice(index, 1);
            }
            localStorage.setItem("carts", JSON.stringify(cartsProducts));
            itemCountProduct.innerText = cartsProducts[1].length;
            itemCountProduct2.innerText = cartsProducts[1].length;
            renderProducts(cartsProducts[1])
        })
    }
}

removeProducts(btnRemoves);

