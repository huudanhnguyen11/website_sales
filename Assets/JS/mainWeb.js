// var cart = new Array();
// function count_Cart() {
//     document.getElementById("count_Cart").innerText = cart.length;
// }
// // function show(id) {
// //     var div = document.getElementById(id);
// //     div.onmouseover = function () {
// //         div.querySelector(".d_N").style.display = "block";
// //     }
// //     div.onmouseout = function () {
// //         div.querySelector(".d_N").style.display = "none";
// //     }
// // }
// window.onload = function () {
//     count_Cart();
//     load_Table();
//     var close_footer = document.getElementsByClassName("close-footer")[0];
//     var order = document.getElementsByClassName("order")[0];
//     close.onclick = function () {
//         modal.style.display = "none";
//       }
//     close_footer.onclick = function () {
//         modal.style.display = "none";
//     }
//     order.onclick = function () {
//         alert("Cảm ơn bạn đã thanh toán đơn hàng")
//     }
//     // JS modal box in HTML
//     // Get the modal
//     var modal = document.getElementById("myModal");
//     // Get the button that opens the modal
//     var btn = document.getElementById("myBtn");
//     // Get the <span> element that closes the modal
//     var span = document.getElementsByClassName("close")[0];
//     // When the user clicks the button, open the modal 
//     btn.onclick = function () {
//         modal.style.display = "block";
//     }
//     // When the user clicks on <span> (x), close the modal
//     modal.onblur = function () {
//         modal.style.display = "none";
//     }
//     // When the user clicks anywhere outside of the modal, close it
//     window.onclick = function (event) {
//         if (event.target == modal) {
//             modal.style.display = "none";
//         }
//     }
// }
// // function load_Table(){
// //     var div_cart = document.querySelector("#myModal .modal-content");
// //     if(div_cart.getElementsByTagName("table")[0]){
// //         div_cart.removeChild(div_cart.getElementsByTagName("table")[0]);
// //     }
// //     var table = document.createElement("table");
// //     table.border = 1;
// //     var header = document.createElement("header");
// //     header.innerHTML = "<tr><th>Product</th></tr>";
// //     var body = document.createElement("body");
// //     for (let index = 0; index < cart.length; index++) {
// //         var tr = document.createElement("tr");
// //         tr.innerHTML = "<td>" + cart[index] + "</td>";
// //         body.appendChild(tr);
// //     }
// //     table.appendChild(header);
// //     table.appendChild(body);
// //     div_cart.appendChild(table);
// // }
// function load_Table(){
// var load_cart = document.getElementsByClassName("addCart");
// for (let i = 0; i < load_cart.length; i++) {
//     var add = load_cart[i];
    
// }
// }
// function add_Cart() {
//     var img = "";
//     var title = "";
//     var price = "";
//     add.addEventListener("click",function (event){
//         var button = event.target;
//         var product = button.parentElement.parentElement;
//         var div_content = document.getElementById("carouselExampleControlsNoTouching").getElementsByClassName("p-item")[0];
//         img = div_content.childNodes[1].childNodes[1].src;
//         title = "abc";
//         price = product.getElementsByClassName("p-price")[0].innerText;
//         modal.style.display = "block";
//     })  
//     var count = cart.length;
//     cart[count] = title,price,img;
//     var cartRow = document.createElement("div")
//     cartRow.classList.add("cart-row")
//     var cartItems = document.getElementsByClassName("cart-items")[0]
//     var cart_title = cartItems.getElementsByClassName("cart-item-title")
//     for (let i = 0; i < cart_title.length; index++) {
//         if(cart_title[i].innerText == title){
//             alert("Sản phẩm đã có trong giỏ hàng")
//             return;
//         }  
//     }
//     var cartRowContents = `
//     <div class="cart-item cart-column">
//       <img class="cart-item-image" src="${img}" width="100" height="100">
//       <span class="cart-item-title">${title}</span>
//     </div>
//     <span class="cart-price cart-column">${price}</span>
//     <div class="cart-quantity cart-column">
//       <input class="cart-quantity-input" type="number" value="1">
//       <button class="btn btn-danger" type="button">Xóa</button>
//     </div>`
//     cartRow.innerHTML = cartRowContents
//     cartItems.append(cartRow)
//     cartRow.getElementsByClassName("btn-danger")[0].addEventListener("click", function(){
//         var button_remove = event.target
//         button_remove.parentElement.parentElement.remove()
//     })
//     cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', function (event) {
//         var input = event.target
//         if (isNaN(input.value) || input.value <= 0) {
//           input.value = 1;
//         }
//       })
//     count_Cart();
    
// }
