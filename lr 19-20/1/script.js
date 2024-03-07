// Загрузка данных из JSON-файла
fetch('catalog.json')
  .then(response => response.json())
  .then(data => {
    const catalog = document.getElementById('catalog');
    const cart = document.getElementById('cart');

    data.products.forEach(product => {
      // Создание элементов для каталога
      const productItem = document.createElement('div');
      productItem.innerHTML = `
        <p>${product.name}</p>
        <p>Цена: ${product.price}</p>
        <button onclick="addToCart(${product.id})">Добавить в корзину</button>
      `;
      catalog.appendChild(productItem);
    });

    // Функция для добавления товара в корзину
    window.addToCart = function(productId) {
      const selectedProduct = data.products.find(product => product.id === productId);
      // Добавьте выбранный продукт в корзину (можно использовать массив или объект)
      // Обновите интерфейс корзины
      const cartItem = document.createElement('div');
      cartItem.innerHTML = `
        <p>${selectedProduct.name}</p>
        <p>Цена: ${selectedProduct.price}</p>
      `;
      cart.appendChild(cartItem);
    };
  })
  .catch(error => {
    console.error('Ошибка при загрузке JSON-файла: ', error);
  });
