function removeFromCart(name) {
  let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
  let indexToRemove = -1;

  // find the index of the item to remove
  for (let i = 0; i < cartItems.length; i++) {
    if (cartItems[i].name === name) {
      indexToRemove = i;
      break;
    }
  }

  // remove the item at the found index
  if (indexToRemove !== -1) {
    cartItems[indexToRemove].quantity -= 1;
    if (cartItems[indexToRemove].quantity === 0) {
      cartItems.splice(indexToRemove, 1);
    }
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
    displayCart();
    alert(name + " has been removed from the cart.");
  }
}

